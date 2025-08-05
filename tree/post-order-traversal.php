<?php

class TreeNode
{
    public function __construct(
        public string $data,
        public ?TreeNode $left = null,
        public ?TreeNode $right = null
    ) {}
}

function postOrderTraversal(?TreeNode $node): void
{
    if (!$node) return;

    postOrderTraversal($node->left);
    postOrderTraversal($node->right);
    echo $node->data . ', ';
}

$root = new TreeNode('R');
$nodeA = new TreeNode('A');
$nodeB = new TreeNode('B');
$nodeC = new TreeNode('C');
$nodeD = new TreeNode('D');
$nodeE = new TreeNode('E');
$nodeF = new TreeNode('F');
$nodeG = new TreeNode('G');

$root->left = $nodeA;
$root->right = $nodeB;

$nodeA->left = $nodeC;
$nodeA->right = $nodeD;

$nodeB->left = $nodeE;
$nodeB->right = $nodeF;

$nodeF->left = $nodeG;

// Pre-order Traversal
postOrderTraversal($root);
