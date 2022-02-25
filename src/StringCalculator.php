<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    public function add(string $sentence): string
    {
        if (empty($sentence)) {
            return "0";
        }
        $sentence = str_replace("\n", ",", $sentence);
        $numbers = explode(",", $sentence);
        $addResult = null;
        foreach ($numbers as $num) {
            $addResult = $addResult + $num;
        }
        return $addResult;
    }

}