<?php

namespace Tests\Unit\ProblemSolving\Challenge2;

class Challenge2
{
    public static function diceFacesCalculator($dice1, $dice2, $dice3)
    {
        $dices = [$dice1, $dice2, $dice3];

        foreach ($dices as $dice)
            if ($dice < 1 || $dice > 6)
                throw new \Exception('Dice out of number range');

        if ($dice1 == $dice2 && $dice1 == $dice3)
            return array_sum($dices);

        return max($dices);
    }
}
