<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    public function add(String $number): String
    {
        if(str_contains($number,","))
        {
            $numbers = explode(",",$number);
            return $numbers[0] + $numbers[1];
        }
        else if(empty($number)){
            return "0";
        }
        return $number;
    }

}