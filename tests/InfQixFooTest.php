<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class InfQixFooTest extends TestCase
{

    public function test_function_call_with_invalid_arguments()
    {
        $this->expectException(InvalidArgumentException::class);

        infqixfoo(-1);
    }

    public function test_function_returns_integer_input_as_string()
    {
        $this->assertSame(infqixfoo(1), (string) 1);
        $this->assertSame(infqixfoo(2), (string) 2);
        $this->assertSame(infqixfoo(4), (string) 4);
        $this->assertSame(infqixfoo(10), (string) 10);
        $this->assertSame(infqixfoo(11), (string) 11);
    }

    public function test_function_returns_inf_qix_foo_multiples()
    {
        $this->assertSame(infqixfoo(3, false), 'Foo');
        $this->assertSame(infqixfoo(8, false), 'Inf');
        $this->assertSame(infqixfoo(21, false), 'QixFoo');
        $this->assertSame(infqixfoo(35, false), 'Qix');
    }

    public function test_function_returns_with_appending()
    {
        $this->assertSame(infqixfoo(3, true), 'FooFoo');
        $this->assertSame(infqixfoo(8, true), 'InfInf');
        $this->assertSame(infqixfoo(21, true), 'QixFoo');
        $this->assertSame(infqixfoo(24, true), 'InfFoo');
        $this->assertSame(infqixfoo(35, true), 'QixFoo');
        $this->assertSame(infqixfoo(40, true), 'Inf');
        $this->assertSame(infqixfoo(48, true), 'InfFooInf');
    }


    // public function test_debug_print()
    // {
    //     $this->_print_output_in_range_100();
    // }

    public function _print_output_in_range_100()
    {
        for ($i = 0; $i < 100; $i += 1) {
            print(sprintf('%d. %s%s', $i, infqixfoo($i), PHP_EOL));
        }
    }

}
