<?php

declare(strict_types=1);

/**
 * The algorithm should encrypt a string by shifting each letter by an amount, k ($shift).
 * e.g. for the string "abc" and k=3 would give "def".
 * If the shift takes them over the alphabet then it should loop and start at "a"
 * e.g. "y" shifted 4 = "c"
 * Capital letters should stay capitalised, spaces and numbers should be left as they are.
 *
 * @param string $input The string to be encrypted.
 * @param int    $shift The number of positions to shift each letter.
 * @return string The encrypted string.
 */
function encryptString(string $input, int $shift): string
{
    $encryptedString = '';

    // Normalize shift to be within 0-25
    $shift = $shift % 26;

    for ($i = 0; $i < strlen($input); $i++) {
        $character = $input[$i];

        if (ctype_upper($character)) {
            $encryptedCharacter = encryptCharacter($character, true, $shift);
            $encryptedString .= $encryptedCharacter;
        }
        elseif (ctype_lower($character)) {
            $encryptedCharacter = encryptCharacter($character, false, $shift);
            $encryptedString .= $encryptedCharacter;
        }
        // Non-letter characters are appended without change.
        else {
            $encryptedString .= $character;
        }
    }

    return $encryptedString;
}

/**
 * Given an initial character
 * @param string $character
 * @param bool $isUpperCase
 * @param int $shift
 * @return string
 */
function encryptCharacter(string $character, bool $isUpperCase, int $shift): string
{
    $startingAsciiCode = $isUpperCase ? ord('A') : ord('a'); // ASCII code for 'A' = 65, 'a' = 97
    // Convert character to its alphabetical index (0-25), A is 65: 65-65 = 0, C=67 => 2, etc
    $alphabetIndex = ord($character) - $startingAsciiCode;
    // Apply the shift and wrap around alphabet with modulo 26 (the carry)
    $shiftedIndex = ($alphabetIndex + $shift) % 26;
    // Convert the shifted index back to the correct ASCII value/code
    $newCharacterCode = $startingAsciiCode + $shiftedIndex;

    // Convert ascii code back to character and return
    return chr($newCharacterCode);
}

// Example usage:
$originalText = "abc";
$shiftValue   = 4;
$encrypted    = encryptString($originalText, $shiftValue);
echo "Original: " . $originalText . "\n";
echo "Encrypted: " . $encrypted . "\n";

$originalText = "xyz";
$shiftValue   = -9;
$encrypted    = encryptString($originalText, $shiftValue);
echo "Original: " . $originalText . "\n";
echo "Encrypted: " . $encrypted . "\n";

$originalText = "Hello World, Y2K!";
$shiftValue   = 36;
$encrypted    = encryptString($originalText, $shiftValue);
echo "Original: " . $originalText . "\n";
echo "Encrypted: " . $encrypted . "\n";
