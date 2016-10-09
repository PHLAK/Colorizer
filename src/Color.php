<?php

namespace Colorizer;

use InvalidArgumentException;
use OutOfRangeException;

/**
 * Class representation of a color.
 *
 * This software is liscensed under the MIT License.
 *
 * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
 */
class Color
{
    /** @var int Red color value */
    protected $red;

    /** @var int Green color value */
    protected $green;

    /** @var int Blue color value */
    protected $blue;

    /** @var float Alpha channel value */
    protected $alpha;

    /**
     * Color constructor, runs on object creation
     *
     * @param int   $red   Red color value (0 - 255)
     * @param int   $green Green color value (0 - 255)
     * @param int   $blue  Blue color value (0 - 255)
     * @param float $alpha Alpha value (0 - 1)
     */
    public function __construct($red, $green, $blue, $alpha = 1)
    {
        foreach ([$red, $green, $blue] as $var) {
            if (! is_int($var)) {
                throw new InvalidArgumentException('RGB values must be an integer');
            }
        }

        if (! $this->inRange([$red, $green, $blue], 0, 255)) {
            throw new OutOfRangeException('RGB values must be between 0 and 255 (inclusive)');
        }

        if (! $this->inRange($alpha, 0, 1)) {
            throw new OutOfRangeException('Alpha value must be between 0 and 1 (inclusive)');
        }

        $this->red   = $red;
        $this->green = $green;
        $this->blue  = $blue;
        $this->alpha = $alpha;
    }

    /**
     * Class magic getter method, allows retrieving of class property values
     *
     * @param  string $property Property name
     *
     * @return mixed            Property value
     */
    public function __get($property)
    {
        return $this->$property;
    }

    /**
     * Force color values to be within a specific range
     *
     * @param  int    $min Minimum normalize value as integer (0 - 255)
     * @param  int    $max Maximum normalize value as integer (0 - 255)
     *
     * @return object      Normalized color object
     */
    public function normalize($min, $max)
    {
        if (! $this->inRange($min, 0, 255) || ! $this->inRange($max, 0, 255)) {
            throw new OutOfRangeException('Normalization value must be between 0 and 255 (inclusive)');
        }

        $red   = min(max($this->red, $min), $max);
        $green = min(max($this->green, $min), $max);
        $blue  = min(max($this->blue, $min), $max);

        return new static($red, $green, $blue);
    }

    /**
     * Returns the a hex string representation of the color object
     *
     * @return string Hex string representation
     */
    public function hex()
    {
        $red   = $this->decToHex($this->red);
        $green = $this->decToHex($this->green);
        $blue  = $this->decToHex($this->blue);

        return '#' . $red . $green . $blue;
    }

    /**
     * Returns a rgb() string representation of the color object
     *
     * @return string rgb() string representation
     */
    public function rgb()
    {
        return 'rgb(' . $this->red . ', ' . $this->green . ', ' . $this->blue . ')';
    }

    /**
     * Returns a rgba() string representation of the color object
     *
     * @return string rgba() string representation
     */
    public function rgba()
    {
        return 'rgba(' . $this->red . ', ' . $this->green . ', ' . $this->blue . ', ' . $this->alpha . ')';
    }

    /**
     * Verifies weather a given value or array of values is within a specified
     * range (inclusive)
     *
     * @param  mixed $value Integer value or array of integer values to test
     * @param  int   $min   Minimum acceptable value
     * @param  int   $max   Maximum acceptable value
     *
     * @return bool         True if value is within acceptable range
     */
    protected function inRange($value, $min, $max)
    {
        switch (gettype($value)) {
            case 'integer':
                return $min <= $value && $value <= $max;
                break;

            case 'array':
                foreach ($value as $val) {
                    if ($val < $min || $val > $max) return false;
                }
                return true;
                break;

            default:
                throw new InvalidArgumentException;
                break;
        }
    }

    /**
     * Converts an integer decimal value to a padded hex value
     *
     * @param  int    $value Decimal integer value
     *
     * @return string        String hex value
     */
    protected function decToHex($value)
    {
        return str_pad(dechex($value), 2, '0', STR_PAD_LEFT);
    }
}
