<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase {

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
        $this->assertSame(foobar(15), "FooBar");
    }

}