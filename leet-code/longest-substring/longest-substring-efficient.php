<?php

// Find the length of the longest substring that doesn't have repeating characters
function lengthOfLongestSubstring($s)
{
    $longestSubstringLength = 0;
    $currentWindowStartIndex = 0;
    $longestSubstringStartIndex = 0; // If you want to record this to return the substring
    $lastSeenIndices = [];
    $stringArray = str_split($s);
    $totalStringLength = strlen($s);

    for ($i = 0; $i < $totalStringLength; $i++) {
        $character = $stringArray[$i];

        // If character has been seen before and it's last seen index is withing the current window
        // then we need to adjust the start of the window to the next character
        if(isset($lastSeenIndices[$character]) && $lastSeenIndices[$character] >= $currentWindowStartIndex) {
            $currentWindowStartIndex = $lastSeenIndices[$character] + 1;
        }

        // Creating an associative array with array['a'] => 0
        // Updating it when the character is repeated array['a'] => 4
        $lastSeenIndices[$character] = $i;
        $currentWindowLength = $i - $currentWindowStartIndex + 1;

        // Update longestSubstringLength if current window is larger
        if ($currentWindowLength > $longestSubstringLength) {
            $longestSubstringLength = $currentWindowLength;
            // If you want to know the substring record the windowStartIndex for
            $longestSubstringStartIndex = $currentWindowStartIndex;
        }
    }

    $longestSubstring = substr($s, $longestSubstringStartIndex, $longestSubstringLength);

    return ['substring' => $longestSubstring, 'length' => $longestSubstringLength];
}

$s1 = "abcabcbb";
print_r(lengthOfLongestSubstring($s1));
echo "\n" ;
$s2 = "bbbbb";
print_r(lengthOfLongestSubstring($s2));
echo "\n" ;
$s3 = "pwwkew";
print_r(lengthOfLongestSubstring($s3));
echo "\n" ;
$s4 = " ";
print_r(lengthOfLongestSubstring($s4));
echo "\n" ;
$s5 = "dvdf";
print_r(lengthOfLongestSubstring($s5));
echo "\n" ;
$s6 = "dvdfhfioa hi4ohdo s1igfa2odgf sao[dg ffd]sa";
print_r(lengthOfLongestSubstring($s6));
echo "\n" ;
