<?php

    use Colorizer\Color;

    class ColorTest extends PHPUnit_Framework_TestCase {

        protected $color;

        public function __construct() {
            $this->color = new Color(12, 162, 234);
        }

        public function testColorObject() {
            $this->assertInstanceOf('Colorizer\Color', $this->color);
        }

        public function testRedValue() {
            $this->assertEquals(12, $this->color->red());
        }

        public function testRedAliasValue() {
            $this->assertEquals($this->color->red(), $this->color->r());
        }

        public function testGreenValue() {
            $this->assertEquals(162, $this->color->green());
        }

        public function testGreenAliasValue() {
            $this->assertEquals($this->color->green(), $this->color->g());
        }

        public function testBlueValue() {
            $this->assertEquals(234, $this->color->blue());
        }

        public function testBlueAliasValue() {
            $this->assertEquals($this->color->blue(), $this->color->b());
        }

        public function testRGBValue() {
            $this->assertEquals(
                ['red' => 12, 'green' => 162, 'blue' => 234],
                $this->color->rgb()
            );
        }

        public function testNormalize() {
            $this->assertEquals(
                new Color(64, 162, 224),
                $this->color->normalize(64, 224)
            );
        }

    }
