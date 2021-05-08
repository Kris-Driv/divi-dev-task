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
    if($number < 0) {
        throw new \InvalidArgumentException('given number must be positive integer');
    }

    $result = "";

    if($number % 3 === 0) {
        $result .= "Foo";
    }
    if($number % 5 === 0) {
        $result .= "Bar";
    }

    return empty($result) ? (string) $number : $result;
}
