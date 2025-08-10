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

function delete(?TreeNode $node, int $data): ?TreeNode
{
    if (!$node) {
        return null;
    }

    if ($data < $node->data) {
        $node->left = delete($node->left, $data);
    } else if ($data > $node->data) {
        $node->right = delete($node->right, $data);
    } else {
        if (!$node->left) {
            $temp = $node->right;
            $node = null;
            return $temp;
        } else if (!$node->right) {
            $temp = $node->left;
            $node = null;
            return $temp;
        }

        // Node with two children, get the in-order successor
        $node->data = minValue($node->right)->data;
        $node->right = delete($node->right, $node->data);
    }

    return $node;
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
$node15->right = $node19;

$node19->left = $node18;

inOrderTraversal($root);
delete($root, 15);
echo "\n";
inOrderTraversal($root);
