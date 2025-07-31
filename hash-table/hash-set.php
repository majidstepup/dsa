<?php

class SimpleHashSet
{
    private array $buckets;

    public function __construct(private int $size = 100)
    {
        $this->buckets = array_fill(0, $this->size, []);
    }

    public function hashFunction(string $value): int
    {
        $sumOfChars = 0;
        for ($i = 0; $i < strlen($value); $i++) {
            $sumOfChars += ord($value[$i]);
        }

        return $sumOfChars % 10;
    }

    public function add(string $value): void
    {
        $index = $this->hashFunction($value);
        if (!in_array($value, $this->buckets[$index])) {
            $this->buckets[$index][] = $value;
        }
    }

    public function remove(string $value): void
    {
        $index = $this->hashFunction($value);
        $bucket = $this->buckets[$index];
        foreach ($bucket as $key => $bucketValue) {
            if ($bucketValue == $value) {
                unset($this->buckets[$index][$key]);
                break;
            }
        }
    }

    public function contains(string $value): bool
    {
        $index = $this->hashFunction($value);
        $bucket = $this->buckets[$index];
        return in_array($value, $bucket);
    }

    public function printSet(): void
    {
        echo "Hash set contents:\n";
        foreach ($this->buckets as $index => $bucket) {
            echo "Bucket {$index}: " . implode(', ', $bucket) . "\n";
        }
    }
}


$hasSet = new SimpleHashSet(10);

$hasSet->add("Charlotte");
$hasSet->add("Thomas");
$hasSet->add("Jens");
$hasSet->add("Peter");
$hasSet->add("Lisa");
$hasSet->add("Adele");
$hasSet->add("Michaela");
$hasSet->add("Bob");

$hasSet->printSet();

echo "\n'Peter' is in the set: " . ($hasSet->contains('Peter') ? 'Yes' : 'No') . "\n";
echo "Removing 'Peter'\n";
$hasSet->remove('Peter');
echo "'Peter' is in the set: " . ($hasSet->contains('Peter') ? 'Yes' : 'No') . "\n";
echo "'Adele' has hash code: " . $hasSet->hashFunction('Adele') . "\n";
