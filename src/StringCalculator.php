<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    public function add(string $number): string
    {
        if (empty($number)) {
            return "0";
        }

        $numbers = explode(",", $number);
        $addResult = null;
        foreach ($numbers as $num) {
            $addResult = $addResult + $num;
        }
        return $addResult;
    }

}