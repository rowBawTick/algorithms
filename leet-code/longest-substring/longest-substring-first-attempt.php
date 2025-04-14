<?php

function lengthOfLongestSubstring($s): int
{
    $uniqueCharacters = [];
    $longestSubstring = '';
    $substring = '';
    // Create an array and iterate through the string
    $stringArray = str_split($s);

    // Note this doesn't work because I'm not keeping track of all the substrings after a repeating character is found
    foreach ($stringArray as $key => $character) {
        // add unique characters to a list
        if(!in_array($character, $uniqueCharacters)) {
            $uniqueCharacters[] = $character;
            $substring = $substring . $character;
        } else {
            if(strlen($substring) > strlen($longestSubstring)) {
                $longestSubstring = $substring;
            }
            $substring = $character;
            $uniqueCharacters = [$character];
        }
    }

    if (strlen($substring) > strlen($longestSubstring)) {
        $longestSubstring = $substring;
    }

    return strlen($longestSubstring);
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
