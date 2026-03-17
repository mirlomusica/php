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

    public static function checkRegex(string $regex, string $password) : bool
    {
        $res = "";
        preg_match($regex, $password, $res);
        if ($res == []) {
            return false;
        } else {
            return true;
        }
    }

    public static function isValidDni(string $dni) : bool
    {
        return Check::checkRegex("/^[0-9]{8}[A-Z]$/",$dni);

    }

    public static function isValidEmail(string $email) : bool
    {
        if (Self::isNull($email)) return false;
        if (!str_contains($email,"@")) return false;
        return true;

    }
}
