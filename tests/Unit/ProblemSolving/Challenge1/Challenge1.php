<?php

namespace Tests\Unit\ProblemSolving\Challenge1;

class Challenge1
{
    public static function numberFractionsCalculator($numbers)
    {
        $qtyPositives = [];
        $qtyNegative = [];
        $qtyZeros = [];

        foreach ($numbers as $number) {
            if ($number > 0)
                $qtyPositives[] = $number;
            else if ($number < 0)
                $qtyNegative[] = $number;
            else
                $qtyZeros[] = $number;
        }

        $qtyTotalNumbers = count($numbers);

        $calcPercentage = function ($qty, $total) {
            return number_format((count($qty) * 100 / $total) / 100, 6);
        };

        return [
            'positives' => $calcPercentage($qtyPositives, $qtyTotalNumbers),
            'negative' => $calcPercentage($qtyNegative, $qtyTotalNumbers),
            'zeros' => $calcPercentage($qtyZeros, $qtyTotalNumbers),
        ];
    }
}
