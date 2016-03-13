<?php

    class ColorizeTest extends PHPUnit_Framework_TestCase {

        public function testColorizeToRGB() {

            // Initialize Colorizer
            $colorize = new Colorizer\Colorize();

            // Test the output
            $this->assertEquals(
                new Colorizer\Color(array('red' => 165, 'green' => 196, 'blue' => 254)),
                $rgbColor = $colorize->toRGB('foo')
            );

        }


        public function testColorizeToHex() {

            // Initialize Colorizer
            $colorize = new Colorizer\Colorize();

            // Test the output
            $this->assertEquals('#a5c4fe', $colorize->toHex('foo'));

        }


        public function testNormalize() {

            // Initialize Colorizer
            $colorize = new Colorizer\Colorize(64, 224);

            // Test the output
            $this->assertEquals(
                new Colorizer\Color(array('red' => 64, 'green' => 64, 'blue' => 224)),
                $colorize->toRGB('Taco bueno!')
            );

        }

    }
