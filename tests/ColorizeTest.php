<?php

use PHLAK\Colorizer\Color;
use PHLAK\Colorizer\Colorize;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

#[CoversClass(Colorize::class)]
class ColorizeTest extends TestCase
{
    /** @var Color Instance of Colorizer\Color */
    private $color;

    public function setup(): void
    {
        $this->color = (new Colorize)->text('Taco bueno!');
    }

    #[Test]
    public function it_can_colorize_some_text(): void
    {
        $this->assertEquals(38, $this->color->red);
        $this->assertEquals(6, $this->color->green);
        $this->assertEquals(227, $this->color->blue);

        $this->assertEquals('rgb(38, 6, 227)', $this->color->rgb());
        $this->assertEquals('#2606e3', $this->color->hex());
    }

    #[Test]
    public function it_can_be_normalized_on_the_fly(): void
    {
        $normalized = $this->color->normalize(64, 224);

        $this->assertEquals(64, $normalized->red);
        $this->assertEquals(64, $normalized->green);
        $this->assertEquals(224, $normalized->blue);
    }

    #[Test]
    public function it_can_be_normalized_via_the_constructor(): void
    {
        $normalized = (new Colorize(64, 224))->text('Taco bueno!');

        $this->assertEquals(64, $normalized->red);
        $this->assertEquals(64, $normalized->green);
        $this->assertEquals(224, $normalized->blue);
    }

    #[Test]
    public function it_throws_an_exception_when_initialized_with_a_low_min_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Colorize(-1, 42);
    }

    #[Test]
    public function it_throws_an_exception_when_initialized_with_a_hight_min_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Colorize(256, 42);
    }

    #[Test]
    public function it_throws_an_exception_when_initialized_with_a_low_max_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Colorize(42, -1);
    }

    #[Test]
    public function it_throws_an_exception_when_initialized_with_a_hight_max_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Colorize(42, 256);
    }
}
