<?php

// Given an array of integers and a target sum, return the indices of the two numbers that add up to the target.

function twoSum($nums1, $target1) {
    for($i = 0; $i < count($nums1); $i++) {
        for($j = $i + 1; $j < count($nums1); $j++) {
            if($nums1[$i] + $nums1[$j] == $target1) {
                return [$i, $j];
            }
        }
    }
}

// Two Sum Test Variables
$nums1 = [2, 7, 11, 15];
$target1 = 9;  // Expected indices: [0, 1]

$nums2 = [3, 2, 4];
$target2 = 6;  // Expected indices: [1, 2]

$nums3 = [3, 3];
$target3 = 6;  // Expected indices: [0, 1]


print_r(twoSum($nums1, $target1));
print_r(twoSum($nums2, $target2));
print_r(twoSum($nums3, $target3));
