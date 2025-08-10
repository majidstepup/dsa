<?php

class TreeNode
{
    public function __construct(
        public int $data,
        public ?TreeNode $left = null,
        public ?TreeNode $right = null,
    ) {}
}

function inOrderTraversal(?TreeNode $node): void
{
    if (!$node) {
        return;
    }
    inOrderTraversal($node->left);
    echo "{$node->data}, ";
    inOrderTraversal($node->right);
}

function minValue(TreeNode $node): TreeNode
{
    $current = $node;
    while ($current->left) {
        $current = $current->left;
    }

    return $current;
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

inOrderTraversal($root);
echo "\nLowest value: " . minValue($root)->data . "\n";
