<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers services.php
 */
class InfQixFooTest extends TestCase
{

    /**
     * @covers infqixfoo
     */
    public function test_function_call_with_invalid_arguments()
    {
        $this->expectException(InvalidArgumentException::class);

        infqixfoo(-1);
    }

    /**
     * @covers infqixfoo
     */
    public function test_function_returns_integer_input_as_string()
    {
        $this->assertSame(infqixfoo(1), (string) 1);
        $this->assertSame(infqixfoo(2), (string) 2);
        $this->assertSame(infqixfoo(4), (string) 4);
        $this->assertSame(infqixfoo(10), (string) 10);
        $this->assertSame(infqixfoo(11), (string) 11);
    }

    /**
     * @covers infqixfoo
     */
    public function test_function_returns_inf_qix_foo_multiples_only()
    {
        $this->assertSame(infqixfoo(3, false), 'Foo');
        $this->assertSame(infqixfoo(8, false), 'InfInf');
        $this->assertSame(infqixfoo(21, false), 'Qix; Foo');
        $this->assertSame(infqixfoo(35, false), 'QixInf');
    }

    /**
     * @covers infqixfoo
     */
    public function test_function_returns_with_occurence_appending()
    {
        $this->assertSame(infqixfoo(3, true), 'Foo; Foo');
        $this->assertSame(infqixfoo(8, true), 'Inf; InfInf');
        $this->assertSame(infqixfoo(21, true), 'Qix; Foo');
        $this->assertSame(infqixfoo(24, true), 'Inf; Foo');
        $this->assertSame(infqixfoo(35, true), 'Qix; FooInf');
        $this->assertSame(infqixfoo(40, true), 'Inf');
        $this->assertSame(infqixfoo(48, true), 'Inf; Foo; Inf');
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
