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
        echo $result;
        $this->assertEquals($result, "0");
    }

}
