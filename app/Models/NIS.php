<?php

namespace App\Models;

class NIS
{
    public static function generate(): int
    {
        $firstNineDigits = rand(1000000000, 9999999999);
        $firstNineDigitsArray = str_split($firstNineDigits);
        $verifyingDigit = static::calculateDigit($firstNineDigitsArray);

        return $firstNineDigits . $verifyingDigit;
    }

    private static function calculateDigit(array $nis): int
    {
        $weights = [2, 3, 4, 5, 6, 7, 8, 9, 10];
        $sum = 0;

        for ($i = 0; $i < 9; $i++) {
            $sum += $nis[$i] * $weights[$i];
        }

        $remainder = $sum % 10;
        $verifyingDigit = 10 - $remainder;

        if ($verifyingDigit == 10) {
            $verifyingDigit = 0;
        }

        return $verifyingDigit;
    }
}
