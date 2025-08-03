<?php

class TreeNode
{
    public function __construct(
        public string $data,
        public ?TreeNode $left = null,
        public ?TreeNode $right = null
    ) {}
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

// Test
echo 'root->right->left->data: ' . $root->right->left->data . "\n";
