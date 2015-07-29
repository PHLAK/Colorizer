<?php

    class ColorTest extends PHPUnit_Framework_TestCase {

        public function testColor() {

            // Initialize Color
            $color = new Colorizer\Color(['red' => 123, 'green' => 45, 'blue' => 67]);

            // Test the output
            $this->assertInstanceOf('Colorizer\Color', $color);

        }


        public function testNormalize() {

            // Initialize Colorizer
            $color = new Colorizer\Color(['red' => 12, 'green' => 162, 'blue' => 234]);

            // Normalize the colors
            $color->normalize(64, 224);

            // Test the output
            $this->assertEquals(
                new Colorizer\Color(['red' => 64, 'green' => 162, 'blue' => 224]),
                $color
            );

        }

    }
