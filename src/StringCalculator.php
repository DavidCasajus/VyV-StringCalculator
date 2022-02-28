<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    private string $delimiter = ",";

    public function add(string $sentence): string
    {
        $negatives = array();
        if (empty($sentence)) {
            return "0";
        }

        if (str_starts_with($sentence, "//")) {
            $sentence = substr($sentence, 2);
            $this->delimiter = substr($sentence, 0, stripos($sentence, "\n"));
            $sentence = substr($sentence, stripos($sentence, "\n") + 1);
        }
        if (str_contains($sentence, $this->delimiter . "\n")) {
            return "Number expected but \\n found at position " . strpos($sentence, ",\n") . ".";
        }

        if (strripos($sentence, $this->delimiter) == strlen($sentence) - 1 && str_contains($sentence, $this->delimiter)) {
            return "Number expected but not found.";
        }


        $sentence = str_replace("\n", $this->delimiter, $sentence);
        $numbers = explode($this->delimiter, $sentence);
        $addResult = null;
        foreach ($numbers as $num) {
            if ($num < 0) {
                $negatives[] = $num;
            } else {
                $addResult = $addResult + $num;
            }
        }

        echo sizeof($negatives);
        if (sizeof($negatives) > 0) {
            $error = "";
            for ($i = 0; $i < sizeof($negatives); $i++)
            {
                if($i == sizeof($negatives)-1)
                {
                    $error = $error . $negatives[$i];
                }
                else
                {
                    $error =$error. $negatives[$i].",";
                }
            }
            return "Negative not allowed : ". $error;
        }
        return $addResult;
    }

}