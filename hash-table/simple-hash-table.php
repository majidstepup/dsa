<?php
// DSA: Hash Table

$hashSet = [[], [], [], [], [], [], [], [], [], []];

function hashFunction(string $value): int
{
    $sumOfChars = 0;
    for ($i = 0; $i < strlen($value); $i++) {
        $sumOfChars += ord($value[$i]);
    }

    return $sumOfChars % 10;
}

function add(string $value): void
{
    global $hashSet;
    $index = hashFunction($value);
    if (!in_array($value, $hashSet[$index])) {
        $hashSet[$index][] = $value;
    }
}

function contains(string $value): bool
{
    global $hashSet;
    $index = hashFunction($value);
    $bucket = $hashSet[$index];
    return in_array($value, $bucket);
}

// add name in hash set
add('Bob');
add('Pete');
add('Jones');
add('Lisa');
add('Siri');
add('Abdul Majid');

echo 'Contains Abdul Majid: ' . (contains('Abdul Majid') ? 'Yes' : 'No') . "\n";
