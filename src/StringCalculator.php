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

        if(strripos($sentence, ",") == strlen($sentence)-1 && str_contains($sentence, ","))
        {
            return "Number expected but not found.";
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