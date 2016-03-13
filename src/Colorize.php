<?php

    namespace Colorizer;

    use Colorizer\Color;
    use Exception;

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
            $this->normalize($normalizeMin, $normalizeMax);
        }

        /**
         * Converts a string to a unique hex color value
         *
         * @param  string $string Input string
         *
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
         *
         * @return string         RGB color string
         */
        public function toRGB($string) {

            // Generate the rgb color values
            return $this->stringToColor($string)->toRGB();

        }

        /**
         * Generate color value array from string
         *
         * @param  string $string Input string
         *
         * @return array          RGB color value array
         */
        private function stringToColor($string) {

            // Generate hash and truncate
            $hash = substr(hash('crc32', $string), 0, 6);

            // Generate RGB values
            $red   = hexdec(substr($hash, 0, 2));
            $green = hexdec(substr($hash, 2, 2));
            $blue  = hexdec(substr($hash, 4, 2));

            // Create new color object
            $color = new Color($red, $green, $blue);

            // Return normalized color object
            return $color->normalize($this->normalizeMin, $this->normalizeMax);

        }

        /**
         * Set minimum nomalization value
         *
         * @param int     $value Minimum normalization value (0 - 255)
         *
         * @return object        This colorize object
         */
        public function normalizeMin($value) {

            if ($value < 0 || $value > 255) {
                throw new Exception('Value out of range (0 - 255)');
            }

            $this->normalizeMin = (int) $value;

            return $this;

        }

        /**
         * Set maximum nomalization value
         *
         * @param int $value Maximum normalization value (0 - 255)
         *
         * @return object        This colorize object
         */
        public function normalizeMax($value) {

            if ($value < 0 || $value > 255) {
                throw new Exception('Value out of range (0 - 255)');
            }

            $this->normalizeMax = (int) $value;

            return $this;

        }

        /**
         * Set min and max normalization values simultaneously
         *
         * @param int     $value Minimum normalization value (0 - 255)
         * @param int     $value Maximum normalization value (0 - 255)
         *
         * @return object        This colorize object
         */
        public function normalize($min, $max) {

            $this->normalizeMin($min);
            $this->normalizeMax($max);

            return $this;

        }

    }
