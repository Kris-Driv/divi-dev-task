<?php

declare(strict_types=1);

if (!defined('RESPONSE_GLUE')) {
    define('RESPONSE_GLUE', '; ');
}

if (!defined('FOOBAR_MULTIPLE_MAP')) {
    define('FOOBAR_MULTIPLE_MAP', [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix'
    ]);
}

if (!defined('FOOBAR_OCCURRENCE_MAP')) {
    define('FOOBAR_OCCURRENCE_MAP', FOOBAR_MULTIPLE_MAP);
}

if (!defined('INFQIXFOO_MULTIPLE_MAP')) {
    define('INFQIXFOO_MULTIPLE_MAP', [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo'
    ]);
}

if (!defined('INFQIXFOO_OCCURRENCE_MAP')) {
    define('INFQIXFOO_OCCURRENCE_MAP', INFQIXFOO_MULTIPLE_MAP);
}

if (!function_exists('foobar')) {

    /**
     * Concatenates return values of multiples() and occurrences() calls
     * otherwise returns same input casted to string.
     * 
     * If passed value is negative an exception will be thrown
     * 
     * @see multiples()
     * @see occurrences()
     * 
     * @throws InvalidArgumentException
     * @param int $number unsigned integer
     */
    function foobar(int $number, bool $appendOccurrences = true): string
    {
        $result = implode(
            RESPONSE_GLUE,
            array_merge(
                multiples($number, FOOBAR_MULTIPLE_MAP),
                ($appendOccurrences ? occurrences($number, FOOBAR_OCCURRENCE_MAP) : [])
            )
        );

        return empty($result) ? (string) $number : $result;
    }
}

if (!function_exists("infqixfoo")) {
    /**
     * Concatenates return values of multiples() and occurrences() calls
     * otherwise returns same input casted to string. And if sum of digits is multiple of 8
     * the resulting string will be appended with 'Inf'
     * 
     * If passed value is negative an exception will be thrown
     * 
     * @see multiples()
     * @see occurrences()
     * 
     * @throws InvalidArgumentException
     * @param int $number unsigned integer
     */
    function infqixfoo(int $number, bool $appendOccurrences = true): string
    {
        $result = implode(
            RESPONSE_GLUE,
            array_merge(
                multiples($number, INFQIXFOO_MULTIPLE_MAP),
                ($appendOccurrences ? occurrences($number, INFQIXFOO_OCCURRENCE_MAP) : [])
            )
        );
        if (sum_of_digits($number) % 8 === 0) {
            $result .= "Inf";
        }

        return empty($result) ? (string) $number : $result;
    }
}
