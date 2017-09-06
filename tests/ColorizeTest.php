<?php

use PHLAK\Colorizer\Colorize;

class ColorizeTest extends PHPUnit_Framework_TestCase
{
    /** @var Color Instance of Colorizer\Color */
    protected $color;

    public function setup()
    {
        $this->color = (new Colorize())->text('Taco bueno!');
    }

    public function test_it_can_colorize_some_text()
    {
        $this->assertEquals(38, $this->color->red);
        $this->assertEquals(6, $this->color->green);
        $this->assertEquals(227, $this->color->blue);

        $this->assertEquals('rgb(38, 6, 227)', $this->color->rgb());
        $this->assertEquals('#2606e3', $this->color->hex());
    }

    public function test_it_can_be_normalized_on_the_fly()
    {
        $normalized = $this->color->normalize(64, 224);

        $this->assertEquals(64, $normalized->red);
        $this->assertEquals(64, $normalized->green);
        $this->assertEquals(224, $normalized->blue);
    }

    public function test_it_can_be_normalized_via_the_constructor()
    {
        $normalized = (new Colorize(64, 224))->text('Taco bueno!');

        $this->assertEquals(64, $normalized->red);
        $this->assertEquals(64, $normalized->green);
        $this->assertEquals(224, $normalized->blue);
    }

    public function test_it_throws_an_exception_when_initialized_with_a_low_min_value()
    {
        $this->setExpectedException('OutOfRangeException');

        new Colorize(-1, 42);
    }

    public function test_it_throws_an_exception_when_initialized_with_a_hight_min_value()
    {
        $this->setExpectedException('OutOfRangeException');

        new Colorize(256, 42);
    }

    public function test_it_throws_an_exception_when_initialized_with_a_low_max_value()
    {
        $this->setExpectedException('OutOfRangeException');

        new Colorize(42, -1);
    }

    public function test_it_throws_an_exception_when_initialized_with_a_hight_max_value()
    {
        $this->setExpectedException('OutOfRangeException');

        new Colorize(42, 256);
    }
}
