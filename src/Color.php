<?php

    namespace Colorizer;

    use Exception;

    /**
     * Class representation of a color.
     *
     * This software is liscensed under the MIT License.
     *
     * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
     * @copyright 2016 Chris Kankiewicz
     */
    class Color {

        /** @var int Red color value */
        protected $red;

        /** @var int Green color value */
        protected $green;

        /** @var int Blue color value */
        protected $blue;

        /** @var float Alpha channel value */
        protected $alpha;

        /**
         * Color constructor, runs on object creation
         *
         * @param int   $red   Red color value (0 - 255)
         * @param int   $green Green color value (0 - 255)
         * @param int   $blue  Blue color value (0 - 255)
         * @param float $alpha Alpha value (0 - 1)
         */
        public function __construct($red = 0, $green = 0, $blue = 0, $alpha = 1) {
            if ($this->inRange($red, 0, 255)) $this->red = $red;
            if ($this->inRange($green, 0, 255)) $this->green = $green;
            if ($this->inRange($blue, 0, 255)) $this->blue = $blue;
            $this->alpha = $alpha;
        }

        /**
         * Get the object's red value
         *
         * @return int This object's red value
         */
        public function red() {
            return $this->red;
        }

        /**
         * Alias method for $this->red()
         */
        public function r() {
            return $this->red();
        }

        /**
         * Get the object's green value
         *
         * @return int This object's green value
         */
        public function green() {
            return $this->green;
        }

        /**
         * Alias method for $this->green()
         */
        public function g() {
            return $this->green();
        }

        /**
         * Get the object's blue value
         *
         * @return int This object's blue value
         */
        public function blue() {
            return $this->blue;
        }

        /**
         * Alias method for $this->blue()
         */
        public function b() {
            return $this->blue();
        }

        /**
         * Adjust color minimum and maximum normalized values
         *
         * @param  int    $min Minimum normalize value as integer (0 - 255)
         * @param  int    $max Maximum normalize value as integer (0 - 255)
         *
         * @return object      Normalized color object
         */
        public function normalize($min, $max) {

            if (! $this->inRange($min, 0, 255) && $this->inRange($max, 0, 255)) {
                throw new \OutOfRangeException('Normalization value must be between 0 and 255 (inclusive)');
            }

            $red   = min(max($this->red, $min), $max);
            $green = min(max($this->green, $min), $max);
            $blue  = min(max($this->blue, $min), $max);

            return new static($red, $green, $blue);

        }

        /**
         * Returns the a hex string representation of the color object
         *
         * @return string Hex string representation
         */
        public function hex() {

            $red   = $this->decToHex($this->red);
            $green = $this->decToHex($this->green);
            $blue  = $this->decToHex($this->blue);

            return '#' . $red . $green . $blue;

        }

        /**
         * Returns a rgb() string representation of the color object
         *
         * @return string rgb() string representation
         */
        public function rgb() {
            return 'rgb(' . $this->red . ', ' . $this->green . ', ' . $this->blue . ')';
        }

        /**
         * Returns a rgba() string representation of the color object
         *
         * @return string rgba() string representation
         */
        public function rgba() {
            return 'rgba(' . $this->red . ', ' . $this->green . ', ' . $this->blue . ', ' . $this->alpha . ')';
        }

        /**
         * Verifies weather a given value is within $min and $max (inclusive)
         *
         * @param  int  $value Integer value to test
         * @param  int  $min   Minimum acceptable value
         * @param  int  $max   Maximum acceptable value
         *
         * @return bool        True if value is within acceptable range
         */
        protected function inRange($value, $min, $max) {
            return $min <= $value && $value <= $max;
        }

        /**
         * Converts an integer decimal value to a padded hex value
         *
         * @param  int    $value Decimal integer value
         * @return string        String hex value
         */
        protected function decToHex($value) {
            return str_pad(dechex($value), 2, '0', STR_PAD_LEFT);
        }

    }
