<?php


class Check {
    public static function isValidDate(string $date): bool{
        return Check::checkRegex("/[0-9]{2}-[0-9]{2}-[0-9]{4}/",$date);
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

}
