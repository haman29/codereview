<?php
require_once('binaryTree.php');
class TestBinaryTree extends PHPUnit_Framework_TestCase
{
    public $bst; // binary search tree

    /**
     * 関数外への出し方がよくわからないので教えてください
     */
    public function __construct()
    {
        $this->bst = 
            new BinarySearchTree(
                13,
                new BinarySearchTree(
                    5,
                    new BinarySearchTree(2, null, null),
                    new BinarySearchTree(
                        7,
                        new BinarySearchTree(6, null, null),
                        null
                    )
                ),
                new BinarySearchTree(
                    21,
                    new BinarySearchTree(15, null, null),
                    null
                )
            );
    }
    
    public function testConstruct()
    {
        $this->assertEquals(13, $this->bst->value);
        $this->assertEquals(5,  $this->bst->left->value);
        $this->assertEquals(15, $this->bst->right->left->value);
    }

    public function testInsert()
    {
    }

    public function testDelete()
    {
    }

    public function testSearch()
    {
        $this->assertEquals(13,   $this->bst->search(13));
        $this->assertEquals(5,    $this->bst->search(5));
        $this->assertEquals(15,   $this->bst->search(15));
        $this->assertEquals(null, $this->bst->search(100)); // not exist
    }
}
