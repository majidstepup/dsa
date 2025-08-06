<?php

$binaryTreeArray = ['R', 'A', 'B', 'C', 'D', 'E', 'F', null, null, null, null, null, null, 'G'];

function leftChildIndex(int $index): int
{
    return 2 * $index + 1;
}

function rightChildIndex(int $index): int
{
    return 2 * $index + 2;
}

function getData(int $index): ?string
{
    global $binaryTreeArray;
    if (0 <= $index && $index < count($binaryTreeArray)) {
        return $binaryTreeArray[$index];
    }

    return null;
}

$rightChild = rightChildIndex(0);
$leftChildOfRightChild = leftChildIndex($rightChild);
$data = getData($leftChildOfRightChild);

echo "root.right.left.data: $data";

