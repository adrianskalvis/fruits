<?php

class Validator
{
    public static function string($value, $min, $max): bool
    {
        if (!is_string($value)) return false;
        $value = trim($value);
        $len = mb_strlen($value);
        return $len >= $min && $len <= $max;
    }

    public static function number($value): bool
    {
        return is_numeric($value);
    }
}