<?php
declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use PHPUnit\Framework\TestCase;
use Deg540\PHPTestingBoilerplate\StringCalculator;

final class StringCalculatorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->sc = new StringCalculator();
    }


    /**
     * @test
     */
    public function empty_string_should_return_cero()
    {
        $result = $this->sc->add("");

        $this->assertEquals("0", $result);
    }

    /**
     * @test
     */
    public function one_number_should_return_same_number()
    {
        $result = $this->sc->add("1");

        $this->assertEquals("1", $result);
    }

    /**
     * @test
     */
    public function one_number_with_decimal_should_return_same_number()
    {
        $result = $this->sc->add("1.1");

        $this->assertEquals("1.1", $result);
    }

    /**
     * @test
     */
    public function add_two_numbers_separated_by_comma()
    {
        $result = $this->sc->add("1.1,2.2");

        $this->assertEquals("3.3", $result);
    }

    /**
     * @test
     */
    public function add_with_more_than_two_arguments()
    {
        $result = $this->sc->add("1.1,2.2,1.1");

        $this->assertEquals("4.4", $result);
    }

    /**
     * @test
     */
    public function add_two_numbers_separtes_by_newline_separator()
    {
        $result = $this->sc->add("1\n2.3");

        $this->assertEquals("3.3", $result);
    }


    /**
     * @test
     */
    public function slash_n_after_comma_should_return_error_position()
    {
        $result = $this->sc->add("175.2,\n35");

        $this->assertEquals("Number expected but \\n found at position 5.\n", $result);
    }

    /**
     * @test
     */
    public function separator_at_the_end_should_return_error_message()
    {
        $result = $this->sc->add("1,3,");

        $this->assertEquals("Number expected but not found at position 3.\n", $result);
    }


    /**
     * @test
     */
    public function custom_sepataror_introduced()
    {
        $result = $this->sc->add("//;\n1;2");

        $this->assertEquals("3", $result);
    }

    /**
     * @test
     */
    public function custom_sepataror_with_multiple_numbers()
    {
        $result = $this->sc->add("//|\n1|2|3");

        $this->assertEquals("6", $result);
    }

    /**
     * @test
     */
    public function add_with_negative_values_should_return_error()
    {
        $result = $this->sc->add("-1,2");

        $this->assertEquals("Negative not allowed : -1", $result);
    }

    /**
     * @test
     */
    public function add_with_multiple_negative_values_should_return_error()
    {
        $result = $this->sc->add("-1,-2,3");

        $this->assertEquals("Negative not allowed : -1,-2", $result);
    }

    /**
     * @test
     */
    public function sentence_with_multiple_errors_should_return_all_errors()
    {
        $result = $this->sc->add("-1,,2,3,");

        $this->assertEquals("Number expected but not found at position 2.\nNumber expected but not found at position 7.\nNegative not allowed : -1", $result);
    }
}
