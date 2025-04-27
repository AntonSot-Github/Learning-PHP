<?php

class Currency
{
    public const USD = 84.00;
    public const EUR = 90.00;
    public const RUB = 1;

    
    public static function convert($amount, $from, $to)
    {
        if($from == self::EUR && $to == "RUB"){
            return $amount * self::EUR;
        } elseif ($from == "USD" && $to == "RUB") {
            return $amount * self::USD;
        } elseif ($from == "RUB" && $to == "EUR"){
            return $amount / self::EUR;
        } elseif ($from == "RUB" && $to == "USD"){
            return $amount / self::USD;
        } elseif ($from == "EUR" && $to == "USD"){
            //переводим в рубли и делим на курс RUB к USD
            return $amount * self::EUR / self::USD;
        } elseif ($from == "USD" && $to == "EUR"){
            //переводим в рубли и делим на курс увро к рублю
            return $amount * self::USD / self::EUR;
        } else {
            echo "Invalid currency \n";
        }
    }
}

echo Currency::USD . PHP_EOL;
echo Currency::convert(10, Currency::EUR, "RUB") . PHP_EOL;
echo Currency::convert(10, "USD", "RUB") . PHP_EOL;
echo Currency::convert(1000, "RUB", "EUR") . PHP_EOL;
echo Currency::convert(2000, "RUB", "USD") . PHP_EOL;
echo Currency::convert(1000, "EUR", "USD") . PHP_EOL;
echo Currency::convert(2000, "USD", "EUR") . PHP_EOL;

//Пример решения от GPT

// public static function convert($amount, $from, $to)
// {
//     $rates = [
//         'USD' => self::USD,
//         'EUR' => self::EUR,
//         'RUB' => self::RUB
//     ];

//     if (!isset($rates[$from]) || !isset($rates[$to])) {
//         echo "Invalid currency\n";
//         return null;
//     }

//     // Переводим сначала в рубли
//     $amountInRub = ($from === 'RUB') ? $amount : $amount * $rates[$from];

//     // Переводим из рублей в целевую валюту
//     $convertedAmount = ($to === 'RUB') ? $amountInRub : $amountInRub / $rates[$to];

//     return $convertedAmount;
// }
