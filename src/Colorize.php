<?php

namespace PHLAK\Colorizer;

use Webmozart\Assert\Assert;

class Colorize
{
    /**
     * Create a new Colorize object.
     *
     * @param $normalizeMin Minimum normalization value
     * @param $normalizeMax Maximum normalization value
     */
    public function __construct(
        private readonly int $normalizeMin = 0,
        private readonly int $normalizeMax = 255,
    ) {
        Assert::allRange([$normalizeMin, $normalizeMax], 0, 255, 'Normalization values must be between 0 and 255 (inclusive)');
    }

    /**
     * Generate a new, normalized Color object from a string.
     *
     * @param string $string Input string
     *
     * @return Color Normalized Color object
     */
    public function text($string): Color
    {
        $hash = substr(hash('crc32', $string), 0, 6);

        $red = (int) hexdec(substr($hash, 0, 2));
        $green = (int) hexdec(substr($hash, 2, 2));
        $blue = (int) hexdec(substr($hash, 4, 2));

        return (new Color($red, $green, $blue))->normalize($this->normalizeMin, $this->normalizeMax);
    }

    /**
     * Return a new static Colorize class with specified normalization values.
     *
     * @return self This colorize object
     */
    public function normalize(int $min = 0, int $max = 255): self
    {
        return new self($min, $max);
    }
}
