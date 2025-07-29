<?php
// DSA: Hash Table

$hashSet = [null, null, null, null, null, null, null, null, null, null];

function hashFunction(string $name): int
{
    $sumOfChars = 0;
    for ($i = 0; $i < strlen($name); $i++) {
        $sumOfChars += ord($name[$i]);
    }

    return $sumOfChars % 10;
}

function contains(string $name): int
{
    global $hashSet;
    $index = hashFunction($name);
    return $hashSet[$index] == $name;
}

// add name in hash set
$hashSet[hashFunction('Bob')] = 'Bob';
$hashSet[hashFunction('Pete')] = 'Pete';
$hashSet[hashFunction('Jones')] = 'Jones';
$hashSet[hashFunction('Lisa')] = 'Lisa';
$hashSet[hashFunction('Siri')] = 'Siri';

echo 'Is found Jones in hash set: ' . (contains('Jones') ? 'Yes' : 'No') . "\n";
