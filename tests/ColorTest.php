<?php

use PHLAK\Colorizer\Color;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    /** @var Color Instance of Colorizer\Color */
    protected $color;

    public function setUp(): void
    {
        $this->color = new Color(12, 162, 234, 0.5);
    }

    public function test_it_has_a_red_value()
    {
        $this->assertEquals(12, $this->color->red);
    }

    public function test_it_has_a_green_value()
    {
        $this->assertEquals(162, $this->color->green);
    }

    public function test_it_has_a_blue_value()
    {
        $this->assertEquals(234, $this->color->blue);
    }

    public function test_it_has_an_alpha_value()
    {
        $this->assertEquals(0.5, $this->color->alpha);
    }

    public function test_it_has_a_hex_value()
    {
        $this->assertEquals('#0ca2ea', $this->color->hex());
    }

    public function test_it_has_an_rgb_value()
    {
        $this->assertEquals('rgb(12, 162, 234)', $this->color->rgb());
    }

    public function test_it_has_an_rgba_value()
    {
        $this->assertEquals('rgba(12, 162, 234, 0.5)', $this->color->rgba());
    }

    public function test_it_can_be_normalized()
    {
        $normalize = $this->color->normalize(64, 224);

        $this->assertEquals(new Color(64, 162, 224), $normalize);
    }

    public function test_it_throws_an_exception_when_initialized_with_an_incorrect_rgb_value()
    {
        $this->expectException('OutOfRangeException');

        new Color(12, 1337, 234);
    }

    public function test_it_throws_an_exception_when_initialized_with_an_incorrect_rgb_type()
    {
        $this->expectException('InvalidArgumentException');

        new Color('potato', 162, 234);
    }

    public function test_it_throws_an_exception_when_initialized_with_an_incorrect_alpha_value()
    {
        $this->expectException('OutOfRangeException');

        new Color(12, 162, 234, 2);
    }

    public function test_it_throws_an_exception_when_normalized_with_a_low_min_value()
    {
        $this->expectException('OutOfRangeException');

        $this->color->normalize(-1, 42);
    }

    public function test_it_throws_an_exception_when_normalized_with_a_high_min_value()
    {
        $this->expectException('OutOfRangeException');

        $this->color->normalize(256, 42);
    }

    public function test_it_throws_an_exception_when_normalized_with_a_low_max_value()
    {
        $this->expectException('OutOfRangeException');

        $this->color->normalize(42, -1);
    }

    public function test_it_throws_an_exception_when_normalized_with_a_high_max_value()
    {
        $this->expectException('OutOfRangeException');

        $this->color->normalize(42, 256);
    }
}
