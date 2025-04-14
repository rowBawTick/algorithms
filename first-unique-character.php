<?php

/**
 * Find the first unique character in a string.
 * Return the position of the character or -1 if there are no unique characters
 */
function firstUniqueChar($string) {
    // Convert string to array of characters
    $characters = str_split($string);

    // Count how many times each character appears
    $counts = array_count_values($characters);

    // Loop through the original characters
    foreach ($characters as $index => $character) {
        if ($counts[$character] === 1) {
            return $index; // First unique character found
        }
    }

    // If no unique character found
    return -1;
}

echo firstUniqueChar("leetcode");       // 0
echo "\n";
echo firstUniqueChar("loveleetcode");   // 2
echo "\n";
echo firstUniqueChar("aabb");           // -1

