<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    public function add(string $sentence): string
    {
        if (empty($sentence)) {
            return "0";
        }
        if (str_contains($sentence, ",\n")) {
            return "Number expected but \\n found at position " . strpos($sentence, ",\n") . ".";
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