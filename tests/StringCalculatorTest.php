<?php
declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use PHPUnit\Framework\TestCase;
use Deg540\PHPTestingBoilerplate\StringCalculator;

final class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function empty_string_should_return_cero()
    {
        $sc = new StringCalculator();

        $result = $sc->add("");

        $this->assertEquals("0", $result);
    }

    /**
     * @test
     */
    public function one_number_should_return_same_number()
    {
        $sc = new StringCalculator();

        $result = $sc->add("1");

        $this->assertEquals("1", $result);
    }

    /**
     * @test
     */
    public function one_number_with_decimal_should_return_same_number()
    {
        $sc = new StringCalculator();

        $result = $sc->add("1.1");

        $this->assertEquals("1.1", $result);
    }

}
