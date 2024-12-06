<?php

namespace PHLAK\Colorizer;

use Webmozart\Assert\Assert;

readonly class Color
{
    /**
     * Create a new Color object.

     *
     * @param $red Red color value (0 - 255)
     * @param $green Green color value (0 - 255)
     * @param $blue Blue color value (0 - 255)
     * @param $alpha Alpha value (0 - 1)
     */
    public function __construct(
        public readonly int $red,
        public readonly int $green,
        public readonly int $blue,
        public readonly float $alpha = 1
    ) {
        Assert::allRange([$red, $green, $blue], 0, 255, 'RGB values must be between 0 and 255 (inclusive)');
        Assert::range($alpha, 0, 1, 'Alpha value must be between 0 and 1 (inclusive)');
    }

    /**
     * Force color values to be within a specific range.
     *
     * @param $min Minimum normalize value as integer (0 - 255)
     * @param $max Maximum normalize value as integer (0 - 255)
     *
     * @return self Normalized color object
     */
    public function normalize(int $min, int $max): self
    {
        Assert::allRange([$min, $max], 0, 255, 'Normalization value must be between 0 and 255 (inclusive)');

        $red = min(max($this->red, $min), $max);
        $green = min(max($this->green, $min), $max);
        $blue = min(max($this->blue, $min), $max);

        return new self($red, $green, $blue);
    }

    /**
     * Returns the a hex string representation of the color object.
     *
     * @return string Hex string representation
     */
    public function hex(): string
    {
        return sprintf('#%s%s%s', $this->decToHex($this->red), $this->decToHex($this->green), $this->decToHex($this->blue));
    }

    /**
     * Returns a rgb() string representation of the color object.
     *
     * @return string rgb() string representation
     */
    public function rgb(): string
    {
        return sprintf('rgb(%d, %d, %d)', $this->red, $this->green, $this->blue);
    }

    /**
     * Returns a rgba() string representation of the color object.
     *
     * @return string rgba() string representation
     */
    public function rgba(): string
    {
        return sprintf('rgba(%d, %d, %d, %g)', $this->red, $this->green, $this->blue, $this->alpha);
    }

    /**
     * Converts an integer decimal value to a padded hex value.
     *
     * @param $value Decimal integer value
     *
     * @return string String hex value
     */
    private function decToHex(int $value): string
    {
        return str_pad(dechex($value), 2, '0', STR_PAD_LEFT);
    }
}
