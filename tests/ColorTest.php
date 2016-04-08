<?php

    class ColorTest extends PHPUnit_Framework_TestCase {

        protected $color;

        /** @test */
        public function setUp() {
            $this->color = new Colorizer\Color(12, 162, 234);
        }

        /** @test */
        public function it_has_a_red_value() {
            $this->assertEquals(12, $this->color->red());
            $this->assertEquals(12, $this->color->r());
        }

        /** @test */
        public function it_has_a_green_value() {
            $this->assertEquals(162, $this->color->green());
            $this->assertEquals(162, $this->color->g());
        }

        /** @test */
        public function it_has_a_blue_value() {
            $this->assertEquals(234, $this->color->blue());
            $this->assertEquals(234, $this->color->b());
        }

        /** @test */
        public function test_it_has_an_rgb_value() {
            $this->assertEquals('rgb(12, 162, 234)', $this->color->rgb());
        }

        /** @test */
        public function test_it_can_be_normalized() {
            $normalize = $this->color->normalize(64, 224);
            $this->assertEquals(new Colorizer\Color(64, 162, 224), $normalize);
        }

    }
