<?php

    namespace Colorizer;

    use Colorizer\Color;

    /**
     * Generate persistantly unique colors from a string.
     *
     * This software is liscensed under the MIT License.
     *
     * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
     * @copyright 2016 Chris Kankiewicz
     */
    class Colorize {

        // Reserve some variables
        protected $normalizeMin;
        protected $normalizeMax;


        /**
         * Colorize constructor, runs on object creation
         *
         * @param integer $normalizeMin Minimum normalized decimal value
         * @param integer $normalizeMax Maximum normalized decimal value
         */
        public function __construct($normalizeMin = 0, $normalizeMax = 255) {

            // Set default min value
            $this->setNormalizeMin($normalizeMin);

            // Set default max value
            $this->setNormalizeMax($normalizeMax);

        }


        /**
         * Converts a string to a unique hex color value
         *
         * @param  string $string Input string
         * @return string         Hex color string
         */
        public function toHex($string) {

            // Generate the color object
            $color = $this->stringToColor($string);

            // Return hex color code
            return $color->toHex();

        }


        /**
         * Converts a string to a unique RGB color value
         *
         * @param  string $string Input string
         * @return object         Object containing RGB values
         */
        public function toRGB($string) {

            // Generate the color object
            $color = $this->stringToColor($string);

            // Normalize the color array
            return $color;

        }


        /**
         * Generate color value array from string
         *
         * @param  string $string Input string
         * @return array          RGB color value array
         */
        private function stringToColor($string) {

            // Generate hash and truncate
            $hash = substr(hash('crc32', $string), 0, 6);

            // Generate RGB value array
            $rgbArray = array(
                'red'   => hexdec(substr($hash, 0, 2)),
                'green' => hexdec(substr($hash, 2, 2)),
                'blue'  => hexdec(substr($hash, 4, 2))
            );

            // Create new color object
            $color = new Color($rgbArray);

            // Return normalized color object
            return $color->normalize($this->normalizeMin, $this->normalizeMax);

        }


        /**
         * Set minimum nomalization value
         *
         * @param int $value Minimum normalization value (0 - 255)
         */
        public function setNormalizeMin($value) {

            $this->normalizeMin = (int) $value;

        }


        /**
         * Set maximum nomalization value
         *
         * @param int $value Maximum normalization value (0 - 255)
         */
        public function setNormalizeMax($value) {

            $this->normalizeMax = (int) $value;

        }

    }
