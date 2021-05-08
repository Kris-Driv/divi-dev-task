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
        $this->assertEquals(foobar(1), (string) 1);
        $this->assertEquals(foobar(2), (string) 2);
        $this->assertEquals(foobar(4), (string) 4);
    }

    public function test_function_returns_foo_bar()
    {
        $this->assertSame(foobar(3), "Foo");
        $this->assertSame(foobar(5), "Bar");
        $this->assertSame(foobar(7), "Qix");
        $this->assertSame(foobar(14), "Qix");
        $this->assertSame(foobar(15), "FooBar");
        $this->assertSame(foobar(70), "BarQix");
        $this->assertSame(foobar(84), "FooQix");
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
