<?php

class TreeNode
{
    public function __construct(
        public int $data,
        public ?TreeNode $left = null,
        public ?TreeNode $right = null,
    ) {}
}

function search(?TreeNode $node, int $target): ?TreeNode
{
    if ($node == null) {
        return null;
    }

    if ($node->data == $target) {
        return $node;
    }

    if ($target > $node->data) {
        return search($node->right, $target);
    }

    return search($node->left, $target);
}


$root = new TreeNode(13);
$node7 = new TreeNode(7);
$node15 = new TreeNode(15);
$node3 = new TreeNode(3);
$node8 = new TreeNode(8);
$node14 = new TreeNode(14);
$node19 = new TreeNode(19);
$node18 = new TreeNode(18);

$root->left = $node7;
$root->right = $node15;

$node7->left = $node3;
$node7->right = $node8;

$node15->left = $node14;
$node15->right = $node18;

$result = search($root, 8);

if ($result) {
    echo "Found the node with value: {$result->data}";
} else {
    echo 'Value not found in the BST.';
}
