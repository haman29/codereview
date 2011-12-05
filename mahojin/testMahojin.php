<?php
require_once('Mahojin.php');
class TestMahojin extends PHPUnit_Framework_TestCase
{
    public $mahojin1;

    public function testQuestion1()
    {
        $this->mahojin1 = new Mahojin(
            array(
                array(2, -1, -1),
                array(-1, 5, -1),
                array(-1, 3, 8),
            ),
            array(
                1, 2, 3, 4, 5, 6, 7, 8, 9,
            ),
            15
        );
        $sum = $this->mahojin1->getThreeNum();
        $this->assertEquals(15, $sum);
    }
}
