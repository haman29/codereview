<?php
require_once('Bowling.php');
class TestBowling extends PHPUnit_Framework_TestCase
{
    public $pins;
    public $bowling;

    public function __construct()
    {
        $this->pins = array(
            array(0,0),
            array(0,6),
            array(9,0),
            array(10,0),  // ストライク
            array(9,1),   // スペア
            array(7,2),
            array(10,0),
            array(10,0),
            array(10,0),
            array(9,0),
        );
        $this->bowling = new Bowling($this->pins);
    }

    public function testGetDisplayOfPins()
    {
        $this->assertEquals($this->pins, $this->bowling->getDisplayOfPins());
    }

    public function testCalcTotalScore()
    {
        $this->bowling->calcScoreForEachFrame();
        $this->assertEquals(148, $this->bowling->calcTotalScore());
    }
}
