<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class BaseFunctionTest extends TestCase
{

    public function test_occurrences()
    {
        $this->assertSame(occurrences(333, FOOBAR_OCCURRENCE_MAP), ["Foo", "Foo", "Foo"]);
        $this->assertSame(occurrences(357, FOOBAR_OCCURRENCE_MAP), ["Foo", "Bar", "Qix"]);
    }

    public function test_multiples()
    {
        $this->assertSame(multiples(9, FOOBAR_MULTIPLE_MAP), ["Foo"]);
        $this->assertSame(multiples(10, FOOBAR_MULTIPLE_MAP), ["Bar"]);
        $this->assertSame(multiples(14, FOOBAR_MULTIPLE_MAP), ["Qix"]);
    }

    public function test_occurrences_with_custom_map()
    {
        $this->assertSame(occurrences(123, [
            1 => 'One',
            2 => 'Two',
            3 => 'Three'
        ]), ["One", "Two", "Three"]);
    }

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
