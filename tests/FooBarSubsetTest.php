<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FooBarSubsetTest extends TestCase
{

    public function test_foobar_occurrences()
    {
        $this->assertSame(foobar_occurrences(333), "FooFooFoo");
        $this->assertSame(foobar_occurrences(357), "FooBarQix");
    }

    public function test_foobar_multiples()
    {
        $this->assertSame(foobar_multiples(9), "Foo");
        $this->assertSame(foobar_multiples(10), "Bar");
        $this->assertSame(foobar_multiples(14), "Qix");
    }

    public function test_foobar_occurrences_with_custom_map()
    {
        $this->assertSame(foobar_occurrences(123, [
            1 => 'One',
            2 => 'Two',
            3 => 'Three'
        ]), "OneTwoThree");
    }

    public function test_foobar_multiples_with_custom_map()
    {
        $map = [
            5 => 'Odd',
            2  => 'Even',
        ];

        $this->assertSame(foobar_multiples(256, $map), "Even");
        $this->assertSame(foobar_multiples(255, $map), "Odd");        
    }

}
