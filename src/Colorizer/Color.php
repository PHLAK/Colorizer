<?php

    namespace Colorizer;

    /**
     * This software is liscensed under the MIT License.
     *
     * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
     * @copyright 2014 Chris Kankiewicz
     */
    class Color {

        public $red;
        public $green;
        public $blue;


        /**
         * Color constructor, runs on object creation
         *
         * @param array $colors Array of RGB values
         */
        public function __construct($colors = array()) {

            foreach ($colors as $key => $value) {
                $this->$key = (int) $value;
            }

        }


        /**
         * Adjust color minimum and maximum values
         *
         * @param  int   $min  Minimum value in decimal (0 - 255)
         * @param  int   $max  Maximum value in decimal (0 - 255)
         * @return array       Normalized object
         */
        public function normalize($min, $max) {

            // Normalize the color values
            foreach ($this as $key => $value) {

                if ($value < $min) {

                    $this->$key = $min;

                } elseif ($value > $max) {

                    $this->$key = $max;

                }

            }

            // Return this object
            return $this;

        }


        public function toHex() {

            // Convert to hex values
            foreach ($this as $key => $color) {
                $hexArray[$key] = str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
            }

            // Return hex code array
            return '#' . $hexArray['red'] . $hexArray['green'] . $hexArray['blue'];

        }

    }
