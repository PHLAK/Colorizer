<?php

namespace Colorizer\Traits;

use InvalidArgumentException;

trait Rangeable
{
    /**
     * Verifies weather a given value or array of values is within a specified
     * range (inclusive).
     *
     * @param mixed $value Integer value or array of integer values to test
     * @param int   $min   Minimum acceptable value
     * @param int   $max   Maximum acceptable value
     *
     * @return bool True if value is within acceptable range
     */
    protected function inRange($value, $min, $max)
    {
        switch (gettype($value)) {
            case 'integer':
                return $min <= $value && $value <= $max;

            case 'array':
                foreach ($value as $val) {
                    if (! $this->inRange($val, $min, $max)) {
                        return false;
                    }
                }

                return true;

            default:
                throw new InvalidArgumentException;
        }
    }
}
