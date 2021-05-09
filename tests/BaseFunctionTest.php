<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers base.php
 */
class BaseFunctionTest extends TestCase
{

    /**
     * @covers occurences
     */
    public function test_multiples_throw_exception()
    {
        $this->expectException(InvalidArgumentException::class);

        multiples(-1, []);
    }

    /**
     * @covers occurences
     */
    public function test_occurrences_throw_exception()
    {
        $this->expectException(InvalidArgumentException::class);

        occurrences(-1, []);
    }

    /**
     * @covers sum_of_digits
     */
    public function test_sum_of_digits()
    {
        $this->assertSame(sum_of_digits(123), 6);
        $this->assertSame(sum_of_digits(1010), 2);
        $this->assertSame(sum_of_digits(61), 7);
        $this->assertSame(sum_of_digits(-61), 7);
    }

    /**
     * @covers occurrences
     */
    public function test_occurrences()
    {
        $this->assertSame(occurrences(333, FOOBAR_OCCURRENCE_MAP), ["Foo", "Foo", "Foo"]);
        $this->assertSame(occurrences(357, FOOBAR_OCCURRENCE_MAP), ["Foo", "Bar", "Qix"]);
    }

    /**
     * @covers multiples
     */
    public function test_multiples()
    {
        $this->assertSame(multiples(9, FOOBAR_MULTIPLE_MAP), ["Foo"]);
        $this->assertSame(multiples(10, FOOBAR_MULTIPLE_MAP), ["Bar"]);
        $this->assertSame(multiples(14, FOOBAR_MULTIPLE_MAP), ["Qix"]);
    }

    /**
     * @covers ocurrences
     */
    public function test_occurrences_with_custom_map()
    {
        $this->assertSame(occurrences(123, [
            1 => 'One',
            2 => 'Two',
            3 => 'Three'
        ]), ["One", "Two", "Three"]);
    }

    /**
     * @covers multiples
     */
    public function test_foobar_multiples_with_custom_map()
    {
        $map = [
            5 => 'Odd',
            2  => 'Even',
        ];

        $this->assertSame(multiples(256, $map), ["Even"]);
        $this->assertSame(multiples(255, $map), ["Odd"]);        
    }

}
