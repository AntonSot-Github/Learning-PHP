<?php

class Shop 
{
    public const TAX_RATE = 0.2;
    public static $rate = 23;

    public static function calculateTotalPrice($price):int | float 
    {
        return $price + $price * self::TAX_RATE;
    }
}

echo Shop::calculateTotalPrice(300);
echo Shop::TAX_RATE;
echo Shop::$rate;