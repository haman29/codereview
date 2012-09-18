<?php
require_once('Bowling.php');
class TestBowling extends PHPUnit_Framework_TestCase
{
    public $bowling;  // Bowling オブジェクト
    public $bowling2; // Bowling オブジェクト

    public function __construct()
    {
        $pins = array(
            array(0,  0),
            array(0,  6),
            array(9,  0),
            array(10, 0),  // ストライク
            array(9,  1),  // スペア
            array(7,  2),
            array(10, 0),  // ストライク
            array(10, 0),  // ストライク（ダブル）
            array(6,  4),  // スペア
            array(5,  5,  9),
        );
        $pins2 = array(
            array(10, 0),
            array(10, 0),
            array(10, 0),
            array(10, 0),
            array(10, 0),
            array(10, 0),
            array(10, 0),
            array(10, 0),
            array(10, 0),
            array(10, 10, 10),
        );
        $this->bowling = new Bowling($pins);
        $this->bowling2 = new Bowling($pins2);
    }

    // 表示するのみ
    public function testBowling()
    {
        $this->bowling->displayFrame();

        $this->bowling->displayPins();

        $this->bowling->calcScoresForEachFrame();
        $this->bowling->displayScores();

        $this->bowling->calcTotalScore();
        $this->bowling->displayAccumulateScores();
    }

    // 表示するのみ
    public function testBowling2()
    {
        $this->bowling2->displayFrame();

        $this->bowling2->displayPins();

        $this->bowling2->calcScoresForEachFrame();
        $this->bowling2->displayScores();

        $this->bowling2->calcTotalScore();
        $this->bowling2->displayAccumulateScores();
    }

    public function testCalcTotalScore()
    {
        $this->bowling->calcScoresForEachFrame();
        $this->assertEquals(141, $this->bowling->calcTotalScore());

        $this->bowling2->calcScoresForEachFrame();
        $this->assertEquals(300, $this->bowling2->calcTotalScore());
    }
}
