<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{

    public function test_function_call_with_invalid_arguments()
    {
        $this->expectException(InvalidArgumentException::class);

        foobar(-1);
    }

    public function test_function_returns_integer_input_as_string()
    {
        $this->assertSame(foobar(1), (string) 1);
        $this->assertSame(foobar(2), (string) 2);
        $this->assertSame(foobar(4), (string) 4);
        $this->assertSame(foobar(8), (string) 8);
        $this->assertSame(foobar(11), (string) 11);
    }

    public function test_function_returns_foo_bar()
    {
        $this->assertSame(foobar(3, false), "Foo");
        $this->assertSame(foobar(5, false), "Bar");
        $this->assertSame(foobar(7, false), "Qix");
        $this->assertSame(foobar(14, false), "Qix");
        $this->assertSame(foobar(15, false), "FooBar");
        $this->assertSame(foobar(70, false), "BarQix");
        $this->assertSame(foobar(84, false), "FooQix");
    }

    public function test_function_returns_with_appending()
    {
        $this->assertSame(foobar(3, true), "FooFoo");
        $this->assertSame(foobar(5, true), "BarBar");
        $this->assertSame(foobar(7, true), "QixQix");
        $this->assertSame(foobar(14, true), "Qix");
        $this->assertSame(foobar(15, true), "FooBarBar");
        $this->assertSame(foobar(70, true), "BarQixQix");
        $this->assertSame(foobar(84, true), "FooQix");
    }


    // public function test_debug_print()
    // {
    //     $this->_print_output_in_range_100();
    // }

    public function _print_output_in_range_100()
    {
        for ($i = 0; $i < 100; $i += 1) {
            print(sprintf('%d. %s%s', $i, foobar($i), PHP_EOL));
        }
    }

}
