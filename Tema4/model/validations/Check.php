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

    public static function checkRegex(string $regex, string $password): bool
    {
        $res = "";
        preg_match($regex, $password, $res);
        if ($res == []) {
            return false;
        } else {
            return true;
        }
    }

    public static function isValidDni(string $dni): bool
    {
        return Check::checkRegex("/^[0-9]{8}[A-Z]$/", $dni);

    }

    public static function isValidEmail(string $email): bool
    {
        return Check::checkRegex("/^[a-z,.,-,_]*@[a-z,0-9,-]{3,63}.[a-z]{2,4}$/i", $email);
    }

    public static function isValidVersion(string $version): bool
    {
        return Check::checkRegex("/^V.[0-9]{3}.[0-9]{3}.[0-9]{3}/", $version);

    }

    public static function isValidDate(string $date): bool
    {
        return Check::checkRegex("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $date);
    }

}
