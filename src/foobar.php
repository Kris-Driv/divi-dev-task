<?php

declare(strict_types=1);

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

if(!defined('INFQIXFOO_OCCURRENCE_MAP')) {
    define('INFQIXFOO_OCCURRENCE_MAP', INFQIXFOO_MULTIPLE_MAP);
}

if (!function_exists('foobar')) {

    /**
     * Concatenates return values of foobar_multiples() and foobar_occurrences() calls
     * otherwise returns same input casted to string.
     * 
     * If passed value is negative an exception will be thrown
     * 
     * @see foobar_multiples()
     * @see foobar_occurrences()
     * 
     * @throws InvalidArgumentException
     * @param int $number unsigned integer
     */
    function foobar(int $number, bool $appendOccurrences = true): string
    {
        $result = foobar_multiples($number, FOOBAR_MULTIPLE_MAP) . ($appendOccurrences ? foobar_occurrences($number, FOOBAR_OCCURRENCE_MAP) : '');

        return empty($result) ? (string) $number : $result;
    }
}

if (!function_exists("infqixfoo")) {
    /**
     * Concatenates return values of foobar_multiples() and foobar_occurrences() calls
     * otherwise returns same input casted to string.
     * 
     * If passed value is negative an exception will be thrown
     * 
     * @see foobar_multiples()
     * @see foobar_occurrences()
     * 
     * @throws InvalidArgumentException
     * @param int $number unsigned integer
     */
    function infqixfoo(int $number, bool $appendOccurrences = true): string
    {
        $result = foobar_multiples($number, INFQIXFOO_MULTIPLE_MAP) . ($appendOccurrences ? foobar_occurrences($number, INFQIXFOO_OCCURRENCE_MAP) : '');

        return empty($result) ? (string) $number : $result;
    }
}

if (!function_exists('foobar_multiples')) {

    /**
     * Searches for multiples in map keys and appends appropriate value to return if such multiple is found
     * if no map is given then the default FOOBAR_MULTIPLE_MAP is used
     * 
     * @see FOOBAR_MULTIPLE_MAP
     * @throws InvalidArgumentException
     */
    function foobar_multiples(int $number, ?array $multipleMap = null): string
    {
        if($number < 0) {
            throw new InvalidArgumentException('given number must be positive');
        }

        if (is_null($multipleMap)) {
            $multipleMap = FOOBAR_MULTIPLE_MAP;
        }

        $result = "";

        foreach($multipleMap as $multiplier => $mappedValue) {
            $result .= $number % $multiplier === 0 ? $mappedValue : '';
        }

        return $result;
    }
}

if (!function_exists('foobar_occurrences')) {

    /**
     * Translates digit occurences in number to their appropriate values from given map
     * if no map is given then the default FOOBAR_OCCURENCE_MAP is used
     * 
     * @see FOOBAR_OCCURENCE_MAP
     * @throws InvalidArgumentException
     */
    function foobar_occurrences(int $number, ?array $occurrenceMap = null): string
    {
        if($number < 0) {
            throw new InvalidArgumentException('given number must be positive');
        }

        if (is_null($occurrenceMap)) {
            $occurrenceMap = FOOBAR_OCCURRENCE_MAP;
        }

        $result = "";
        $number = (string) $number;
        $len = strlen($number);

        for($i = 0; $i < $len; $i++) {
            $result .= $occurrenceMap[(int) $number[$i]] ?? '';
        }

        return $result;
    }
}