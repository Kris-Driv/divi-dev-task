<?php
declare(strict_types=1);

if(function_exists('foobar')) {
    return;
}

/**
 * Transforms given input to "Foo" if passed parameter is multiple of 3
 * and appends "Bar" to return value if that parameter is also multiple of 5
 * otherwise returns same input casted to string.
 * 
 * If passed value is negative an exception will be thrown
 * 
 * @throws InvalidArgumentException
 * @param int $number unsigned integer
 */
function foobar(int $number): string
{
    return (string) $number;
}
