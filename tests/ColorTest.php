<?php

    use Colorizer\Color;

    class ColorTest extends PHPUnit_Framework_TestCase {

        protected $color;

        public function setUp() {
            $this->color = new Color(12, 162, 234);
        }

        public function testColorObject() {
            $this->assertInstanceOf('Colorizer\Color', $this->color);
        }

        public function testRedValue() {
            $this->assertEquals(12, $this->color->red());
            $this->assertEquals(12, $this->color->r());
        }

        public function testGreenValue() {
            $this->assertEquals(162, $this->color->green());
            $this->assertEquals(162, $this->color->g());
        }

        public function testBlueValue() {
            $this->assertEquals(234, $this->color->blue());
            $this->assertEquals(234, $this->color->b());
        }

        public function testRGBValue() {
            $this->assertEquals('rgb(12, 162, 234)', $this->color->rgb());
        }

        public function testNormalize() {
            $this->assertEquals(
                new Color(64, 162, 224),
                $this->color->normalize(64, 224)
            );
        }

    }
