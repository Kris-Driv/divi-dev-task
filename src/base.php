<?php
declare(strict_types=1);

if (!function_exists('multiples')) {

/**
 * Searches for multiples in map keys and appends appropriate value to return if such multiple is found
 * if no map is given then the default FOOBAR_MULTIPLE_MAP is used
 * 
 * @see FOOBAR_MULTIPLE_MAP
 * @throws InvalidArgumentException
 */
function multiples(int $number, array $multipleMap): array
{
    if($number < 0) {
        throw new InvalidArgumentException('given number must be positive');
    }

    $result = [];

    foreach($multipleMap as $multiplier => $mappedValue) {
        if($number % $multiplier === 0) {
            $result[] = $mappedValue;
        }
    }

    return $result;
}
}

if (!function_exists('occurrences')) {

/**
 * Translates digit occurences in number to their appropriate values from given map
 * if no map is given then the default FOOBAR_OCCURENCE_MAP is used
 * 
 * @see FOOBAR_OCCURENCE_MAP
 * @throws InvalidArgumentException
 */
function occurrences(int $number, array $occurrenceMap): array
{
    if($number < 0) {
        throw new InvalidArgumentException('given number must be positive');
    }

    $result = [];
    $number = (string) $number;
    $len = strlen($number);

    for($i = 0; $i < $len; $i++) {
        if(isset($occurrenceMap[(int) $number[$i]])) {
            $result[] = $occurrenceMap[(int) $number[$i]];
        }
    }

    return $result;
}
}