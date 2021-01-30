<?php
/**
 * @param $median
 * @param $noOfEggs
 * @param $noOfFloors
 * @return int
 */
function getCoefficientValue($median, $noOfEggs, $noOfFloors)
{
    $sum = 0;
    $term = 1;
    for ($index = 1; $index <= $noOfEggs && $sum < $noOfFloors; ++$index) {
        $term *= $median - $index + 1;
        $term /= $index;
        $sum += $term;
    }
    return $sum;
}

/**
 * @param int $minimum
 * @param int $maximum
 * @param $numberOfEggs
 * @param $numberOfFloors
 * @return float[]|int[]
 */
function compareValues(int $minimum, int $maximum, $numberOfEggs, $numberOfFloors): array
{
    $median = ($minimum + $maximum) / 2;
    if (getCoefficientValue($median, $numberOfEggs, $numberOfFloors) < $numberOfFloors) {
        $minimum = $median + 1;
    } else {
        $maximum = $median;
    }
    return array($minimum, $maximum);
}

/**
 * @param $numberOfEggs
 * @param $numberOfFloors
 * @return float|int
 */
function minimumAttempts($numberOfEggs, $numberOfFloors)
{
    $minimum = 1;
    $maximum = $numberOfFloors;
    while ($minimum < $maximum) {
        list($minimum, $maximum) = compareValues($minimum, $maximum, $numberOfEggs, $numberOfFloors);
    }
    return $minimum;
}

/**
 * @param int $index
 * @return int|string
 */
function checkModulus(int $index)
{
    return ($index % 3 == 0) && ($index % 5 == 0) ? 'fizzbuzz' : (($index % 3 == 0) ? 'fizz' :
        (($index % 5 == 0) ? 'buzz' : $index));
}
