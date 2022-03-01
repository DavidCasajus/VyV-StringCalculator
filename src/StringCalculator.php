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

        //set the delimiter
        if (str_starts_with($sentence, "//")) {
            $sentence = substr($sentence, 2);
            $this->delimiter = substr($sentence, 0, stripos($sentence, "\n"));
            $sentence = substr($sentence, stripos($sentence, "\n") + 1);
        }

        //check sentence format errors
        $errorMessage = $this->checkErrors($sentence);

        //remove the newline delimters and separate the numbers
        $sentence = str_replace("\n", $this->delimiter, $sentence);
        $numbers = explode($this->delimiter, $sentence);

        //remove "" values
        while (($key = array_search('', $numbers)) !== false) {
            unset($numbers[$key]);
        }

        //check negative values
        $addResult = null;
        foreach ($numbers as $num) {
            if ($num < 0) {
                $negatives[] = $num;
            } else {
                $addResult = $addResult + $num;
            }
        }

        $errorMessage = $errorMessage . $this->getNegativeValuesMessage($negatives);

        if ($errorMessage != "") {
            return $errorMessage;
        }

        return $addResult;
    }

    private function checkErrors($sentence): string
    {
        $errorMessage = "";
        if (str_contains($sentence, $this->delimiter . "\n")) {
            $errorMessage = $errorMessage . "Number expected but \\n found at position " . strpos($sentence, ",\n") . ".\n";
        }

        if (str_contains($sentence, $this->delimiter . $this->delimiter)) {
            $errorMessage = $errorMessage . "Number expected but not found at position " . stripos($sentence, $this->delimiter . $this->delimiter) . ".\n";
        }

        if ((strripos($sentence, $this->delimiter) == strlen($sentence) - 1 && str_contains($sentence, $this->delimiter))) {
            $errorMessage = $errorMessage . "Number expected but not found at position " . strripos($sentence, $this->delimiter) . ".\n";
        }
        return $errorMessage;
    }

    private function getNegativeValuesMessage($negatives): string
    {
        $errorMessage = "";
        if (sizeof($negatives)) {
            $error = "";
            for ($i = 0; $i < sizeof($negatives); $i++) {
                if ($i == sizeof($negatives) - 1) {
                    $error = $error . $negatives[$i];
                } else {
                    $error = $error . $negatives[$i] . ",";
                }
            }
            $errorMessage .= "Negative not allowed : " . $error;
        }
        return $errorMessage;
    }
}