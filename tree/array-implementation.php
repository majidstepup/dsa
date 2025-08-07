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

function preOrder(int $index): string
{
    global $binaryTreeArray;

    $result = '';
    if (!($index >= count($binaryTreeArray) || !$binaryTreeArray[$index])) {
        $result .= $binaryTreeArray[$index] . ', ';
        $result .= preOrder(leftChildIndex($index));
        $result .= preOrder(rightChildIndex($index));
    }

    return $result;
}

function inOrder(int $index): string
{
    global $binaryTreeArray;

    $result = '';
    if (!($index >= count($binaryTreeArray) || !$binaryTreeArray[$index])) {
        $result .= inOrder(leftChildIndex($index));
        $result .= $binaryTreeArray[$index] . ', ';
        $result .= inOrder(rightChildIndex($index));
    }

    return $result;
}

function postOrder(int $index): string
{
    global $binaryTreeArray;

    $result = '';
    if (!($index >= count($binaryTreeArray) || !$binaryTreeArray[$index])) {
        $result .= postOrder(leftChildIndex($index));
        $result .= postOrder(rightChildIndex($index));
        $result .= $binaryTreeArray[$index] . ', ';
    }

    return $result;
}

$rightChild = rightChildIndex(0);
$leftChildOfRightChild = leftChildIndex($rightChild);
$data = getData($leftChildOfRightChild);

echo "root.right.left.data: $data\n";
echo 'Pre-order Traversal: ' . rtrim(preOrder(0), ', ') . "\n";
echo 'In-order Traversal: ' . rtrim(inOrder(0), ', ') . "\n";
echo 'Post-order Traversal: ' . rtrim(postOrder(0), ', ') . "\n";
