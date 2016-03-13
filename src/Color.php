<?php

    namespace Colorizer;

    use \Exception;

    /**
     * This software is liscensed under the MIT License.
     *
     * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
     * @copyright 2016 Chris Kankiewicz
     */
    class Color {

        protected $red;
        protected $green;
        protected $blue;

        /**
         * Color constructor, runs on object creation
         *
         * @param int $red   Red color value
         * @param int $green Green color value
         * @param int $blue  Blue color value
         */
        public function __construct($red = 0, $green = 0, $blue = 0) {
            $this->rgb(['red' => $red, 'green' => $green, 'blue' => $blue]);
        }

        /**
         * Set or retrieve the object's red value
         *
         * @param  int|empty  $value The desired red color value (0 - 255)
         *
         * @return int|object        If parameter is set, returns this object.
         *                           If parameter is not set, returns this
         *                           object's red value.
         */
        public function red($value = null) {

            if (isset($value) && $this->withinRange($value)) {
                $this->red = $value;
                return $this;
            }

            return $this->red;

        }

        /**
         * Alias method for $this->red()
         */
        public function r($value = null) {
            return $this->red($value);
        }

        /**
         * Set or retrieve the object's green value
         *
         * @param  int|empty  $value The desired green color value (0 - 255)
         *
         * @return int|object        If parameter is set, returns this object.
         *                           If parameter is not set, returns this
         *                           object's green value.
         */
        public function green($value = null) {

            if (isset($value) && $this->withinRange($value)) {
                $this->green = $value;
                return $this;
            }

            return $this->green;

        }

        /**
         * Alias method for $this->green()
         */
        public function g($value = null) {
            return $this->green($value);
        }

        /**
         * Set or retrieve the object's blue value
         *
         * @param  int|empty  $value The desired blue color value (0 - 255)
         *
         * @return int|object        If parameter is set, returns this object.
         *                           If parameter is not set, returns this
         *                           object's blue value.
         */
        public function blue($value = null) {

            if (isset($value) && $this->withinRange($value)) {
                $this->blue = $value;
                return $this;
            }

            return $this->blue;

        }

        /**
         * Alias method for $this->blue()
         */
        public function b($value = null) {
            return $this->blue($value);
        }

        /**
         * Set the object's red, green and blue values simultaneously by passing
         * an associative array of color values
         *
         * @param  array|empty  $rgb An associative array of rgb color => values
         *                           ['red' => 32, 'green' => 64, 'blue' => '128']
         *
         * @return array|object      This color object
         */
        public function rgb($rgb = null) {

            if (!empty($rgb)) {

                if (gettype($rgb) != 'array') {
                    throw new Exception('Parameter not of acceptable type (array)');
                }

                $this->red($rgb['red']);
                $this->green($rgb['green']);
                $this->blue($rgb['blue']);

                return $this;

            }

            return [
                'red'   => $this->red,
                'green' => $this->green,
                'blue'  => $this->blue
            ];

        }

        /**
         * Adjust color minimum and maximum normalized values
         *
         * @param  int   $min Minimum normalize value as integer (0 - 255)
         * @param  int   $max Maximum normalize value as integer (0 - 255)
         *
         * @return array      Normalized object
         */
        public function normalize($min, $max) {

            foreach ($this as $key => $value) {

                if ($value < $min) {
                    $this->$key = $min;
                } elseif ($value > $max) {
                    $this->$key = $max;
                }

            }

            return $this;

        }


        /**
         * Returns the a hex string representation of the color object
         *
         * @return  string  Hex string representation
         */
        public function toHex() {

            // Convert to hex values
            foreach ($this as $key => $color) {
                $hexArray[$key] = str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
            }

            return '#' . $hexArray['red'] . $hexArray['green'] . $hexArray['blue'];

        }

        /**
         * Returns the an rgb() string representation of the color object
         *
         * @return  string  rgb() string representation
         */
        public function toRGB() {
            return 'rgb(' . $this->red . ', ' . $this->green . ', ' . $this->blue . ')';
        }

        /**
         * Verifies weather a given value is an acceptable color value (0 - 255)
         *
         * @param  int  $value  Integer value to test
         *
         * @return bool         True if value is within acceptable range
         */
        public function withinRange($value) {

            if (gettype($value) != 'integer') {
                throw new Exception('Parameter not of acceptable type (int)');
            }

            return 0 <= $value && $value <= 255;

        }

    }
