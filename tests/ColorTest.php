<?php

use PHLAK\Colorizer\Color;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

#[CoversClass(Color::class)]
class ColorTest extends TestCase
{
    /** @var Color Instance of Colorizer\Color */
    protected $color;

    public function setUp(): void
    {
        $this->color = new Color(12, 162, 234, 0.5);
    }

    #[Test]
    public function it_has_a_red_value(): void
    {
        $this->assertEquals(12, $this->color->red);
    }

    #[Test]
    public function it_has_a_green_value(): void
    {
        $this->assertEquals(162, $this->color->green);
    }

    #[Test]
    public function it_has_a_blue_value(): void
    {
        $this->assertEquals(234, $this->color->blue);
    }

    #[Test]
    public function it_has_an_alpha_value(): void
    {
        $this->assertEquals(0.5, $this->color->alpha);
    }

    #[Test]
    public function it_has_a_hex_value(): void
    {
        $this->assertEquals('#0ca2ea', $this->color->hex());
    }

    #[Test]
    public function it_has_an_rgb_value(): void
    {
        $this->assertEquals('rgb(12, 162, 234)', $this->color->rgb());
    }

    #[Test]
    public function it_has_an_rgba_value(): void
    {
        $this->assertEquals('rgba(12, 162, 234, 0.5)', $this->color->rgba());
    }

    #[Test]
    public function it_can_be_normalized(): void
    {
        $normalize = $this->color->normalize(64, 224);

        $this->assertEquals(new Color(64, 162, 224), $normalize);
    }

    #[Test]
    public function it_throws_an_exception_when_initialized_with_an_incorrect_rgb_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Color(12, 1337, 234);
    }

    #[Test]
    public function it_throws_an_exception_when_initialized_with_an_incorrect_alpha_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Color(12, 162, 234, 2);
    }

    #[Test]
    public function it_throws_an_exception_when_normalized_with_a_low_min_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->color->normalize(-1, 42);
    }

    #[Test]
    public function it_throws_an_exception_when_normalized_with_a_high_min_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->color->normalize(256, 42);
    }

    #[Test]
    public function it_throws_an_exception_when_normalized_with_a_low_max_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->color->normalize(42, -1);
    }

    #[Test]
    public function it_throws_an_exception_when_normalized_with_a_high_max_value(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->color->normalize(42, 256);
    }
}
