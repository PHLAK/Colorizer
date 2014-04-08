<?php

    namespace PHLAK;

    /**
     * Generate persistantly unique colors from a string.
     *
     * This software is liscensed under the MIT License.
     *
     * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
     * @copyright 2014 Chris Kankiewicz
     */
    class Colorizer {

        // Class version
        const VERSION = '0.1.1';

        // Reserve some variables
        protected $normalizeMin;
        protected $normalizeMax;


        /**
         * Class constructor
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

            // Generate the color array
            $colorArray = $this->getColorValues($string);

            // Normalize the color array
            $colorArray = $this->normalize($colorArray, $this->normalizeMin, $this->normalizeMax);

            // Convert to hex color codes
            foreach ($colorArray as $key => $color) {
                $hexArray[$key] = str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
            }

            // Concat hex codes
            $hex =  $hexArray['r'] . $hexArray['g'] . $hexArray['b'];

            // Return hex color code
            return $hex;

        }


        /**
         * Converts a string to a unique RGB color value
         *
         * @param  string $string Input string
         * @return array          Array of RGB values
         */
        public function toRGB($string) {

            // Generate the color array
            $colorArray = $this->getColorValues($string);

            // Normalize the color array
            $colorArray = $this->normalize($colorArray, $this->normalizeMin, $this->normalizeMax);

            // Return normalized hex color code
            return $this->normalize($hash);

        }


        /**
         * Generate color value array from string
         *
         * @param  string $string Input string
         * @return array          RGB color value array
         */
        private function getColorValues($string) {

            // Generate hash and truncate
            $hash = substr(hash('md5', $string), 0, 6);

            // Generate RGB value array
            $rgbArray = array(
                'r' => hexdec(substr($hash, 0, 2)),
                'g' => hexdec(substr($hash, 2, 2)),
                'b' => hexdec(substr($hash, 4, 2))
            );

            // Return the array
            return $rgbArray;

        }


        /**
         * Adjust color minimum and maximum values
         *
         * @param  array $hash RGB array generated from getColorValues()
         * @param  int   $min  Minimum value in decimal (0 - 255)
         * @param  int   $max  Maximum value in decimal (0 - 255)
         * @return array       Normalize arry
         */
        private function normalize($rgbArray, $min, $max) {

            // Normalize the color values
            foreach ($rgbArray as $key => $int) {

                if ($int < $min) {

                    $rgbArray[$key] = $min;

                } elseif ($int > $max) {

                    $rgbArray[$key] = $max;

                }

            }

            // Return the array
            return $rgbArray;

        }


        /**
         * Set minimum nomalization value
         *
         * @param int $value Minimum normalization value (0 - 255)
         */
        public function setNormalizeMin($value) {

            $this->normalizeMin = $value;

        }


        /**
         * Set maximum nomalization value
         *
         * @param int $value Maximum normalization value (0 - 255)
         */
        public function setNormalizeMax($value) {

            $this->normalizeMax = $value;

        }

    }
