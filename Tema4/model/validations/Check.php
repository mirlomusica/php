<?php

class Check
{
    public static function isNull($value): bool
    {
        if ($value === null) {
            return true;
        } else {
            return false;
        }
    }

    public static function isShort(string $value, int $min): bool
    {
        if (strlen($value) <= $min) {
            return true;
        } else {
            return false;
        }

    }

    public static function isZero(float $value): bool
    {
        if ($value == 0) {
            return true;
        } else {
            return false;
        }

    }

    public static function isNegative(float $value): bool
    {
        if ($value < 0) {
            return true;
        } else {
            return false;
        }

    }

    public static function isPositive(float $value): bool
    {
        if ($value >= 0) {
            return true;
        } else {
            return false;
        }

    }

    public static function betweenValues(float $value, float $min, float $max): bool
    {
        if ($value >= $min && $value <= $max) {
            return true;
        } else {
            return false;
        }

    }
}
