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

        /** @var int Minimum normalization value */
        protected $normalizeMin;

        /** @var int Maximum normalization value */
        protected $normalizeMax;


        /**
         * Colorize constructor, runs on object creation
         *
         * @param int $normalizeMin Minimum normalized decimal value
         * @param int $normalizeMax Maximum normalized decimal value
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
            return $color->hex();

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
            return $this->stringToColor($string)->rgb();

        }

        /**
         * Generate color value array from string
         *
         * @param  string $string Input string
         *
         * @return object         Color object
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
         * Set min and max normalization values simultaneously
         *
         * @param int     $value Minimum normalization value (0 - 255)
         * @param int     $value Maximum normalization value (0 - 255)
         *
         * @return object        This colorize object
         */
        public function normalize($min = 0, $max = 255) {

            $this->normalizeMin = $min;
            $this->normalizeMax = $max;

            return $this;

        }

    }
