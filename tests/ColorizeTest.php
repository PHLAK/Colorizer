<?php

    use Colorizer\Colorize;

    class ColorizeTest extends PHPUnit_Framework_TestCase {

        public function testColorizeToRGB() {

            // Initialize Colorizer
            $colorize = new Colorize();

            // Test the output
            $this->assertEquals(
                'rgb(165, 196, 254)',
                $rgbColor = $colorize->toRGB('foo')
            );

        }

        public function testColorizeToHex() {

            // Initialize Colorizer
            $colorize = new Colorize();

            // Test the output
            $this->assertEquals('#a5c4fe', $colorize->toHex('foo'));

        }

        public function testNormalize() {

            // Initialize Colorizer
            $colorize = new Colorize(64, 224);

            // Test the output
            $this->assertEquals(
                'rgb(64, 64, 224)',
                $colorize->toRGB('Taco bueno!')
            );

        }

    }
