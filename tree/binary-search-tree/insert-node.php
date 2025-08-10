<?php

class TreeNode
{
    public function __construct(
        public int $data,
        public ?TreeNode $left = null,
        public ?TreeNode $right = null,
    ) {}
}

function insert(?TreeNode $node, int $data): TreeNode
{
    if (!$node) {
        $node = new TreeNode($data);
    } else if ($node->data > $data) {
        $node->left = insert($node->left, $data);
    } else if ($node->data < $data) {
        $node->right = insert($node->right, $data);
    }

    return $node;
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

insert($root, 10);

inOrderTraversal($root);
