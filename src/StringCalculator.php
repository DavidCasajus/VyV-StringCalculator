<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    public function add(String $number): String
    {
        if(empty($number)){
            return "0";
        }
        return $number;
    }

}