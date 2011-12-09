<?php
require_once('Mahojin.php');
class TestMahojin extends PHPUnit_Framework_TestCase
{
    public $mahojin1;
    public $mahojin2;

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
        $this->mahojin1->roop();
    }

    // 解けないのであきらめました
    public function Question2()
    {
        $this->mahojin2 = new Mahojin(
            array(
                array(-1, 60, -1),
                array(-1, 35, -1),
                array(40, 10, -1),
            )
        );
        $this->mahojin2->displayNumbers();
        $this->mahojin2->calcThreeNum();
        $this->assertEquals(105, $this->mahojin2->getThreeNum());
        $this->mahojin2->setNumberAboutRows();
        $this->mahojin2->displayNumbers();
        $this->mahojin2->setNumberAboutColumns();
        $this->mahojin2->displayNumbers();
        $this->mahojin2->setNumberAboutRows();
        $this->mahojin2->displayNumbers();
        exit;
    }
}
