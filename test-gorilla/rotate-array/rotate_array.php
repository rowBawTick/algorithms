<?php

function rotateArray($n, $k, $array) {
    $arrayLength = count($array);
    for ($j = 0; $j < $k; $j++) {
        $newArray = [];
        $newArray[0] = $array[$n-1];
        for ($i = 0; $i < $arrayLength -1; $i++) {
            $newArray[$i + 1] = $array[$i];
        }

        return $newArray;
    }

    return $array;
}

function arrayShift(int $n, int $k, array $array): array {
    $n = count($array);
    for ($j = 0; $j < $k; $j++) {
        // Remove the last element and add it to the beginning
        $lastElement = array_pop($array);
        // Add element to beginning of array
        array_unshift($array, $lastElement);
    }
    return $array;
}

print_r(rotateArray(5, 1, [1,2,3,4,5]));
echo "\n";
print_r(rotateArray(5, 2, [1,2,3,4,5]));
echo "\n";
print_r(rotateArray(4, 3, [7,8,9,10]));
echo "\n";

print_r(arrayShift(5, 1, [1,2,3,4,5]));
echo "\n";
print_r(arrayShift(5, 2, [1,2,3,4,5]));
echo "\n";
print_r(arrayShift(4, 3, [7,8,9,10]));




