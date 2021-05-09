<?php

declare(strict_types=1);

const RESPONSE_GLUE = '; ';

const FOOBAR_MULTIPLE_MAP = [
    3 => 'Foo',
    5 => 'Bar',
    7 => 'Qix'
];

const FOOBAR_OCCURRENCE_MAP = FOOBAR_MULTIPLE_MAP;

const INFQIXFOO_MULTIPLE_MAP = [
    8 => 'Inf',
    7 => 'Qix',
    3 => 'Foo'
];

const INFQIXFOO_OCCURRENCE_MAP = INFQIXFOO_MULTIPLE_MAP;

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
