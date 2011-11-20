<?php
/**
 * 新卒コードレビュー
 * 課題：ボーリングのスコアを計算する
 *
 * @autor Kyohei Hamada
 * @date 2011年 11月 21日
 */

/**
 * class Bowling
 */
class Bowling
{
    public $pins;             // 各フレームで倒したピン
    public $scores;           // 各フレームのスコア
    public $accumulateScores; // 各フレームの累積スコア

    // TODO ランダムに値を入れる
    public function __construct($pins)
    {
        $this->pins = $pins;
    }

    public function displayFrame()
    {
        echo '　フレーム|';
        for($i = 1; $i <= 10; $i++) {
            printf(" %2d  ", $i);
            echo '|';
        }
        echo "\n";
    }

    public function displayPins()
    {
        echo '倒したピン|';
        foreach ($this->pins as $i => $frame) {
            foreach ($frame as $j => $pin) {
                printf("%2d", $pin);
                if ($j === 0) echo ',';
                if ($i === 9 && $j === 1) echo ','; // 10フレーム目
            }
            echo '|';
        }
        echo "\n";
    }

    public function displayScores()
    {
        echo '　　スコア|';
        foreach ($this->scores as $score) {
            printf(" %3d ", $score);
            echo '|';
        }
        echo "\n";
    }

    public function displayAccumulateScores()
    {
        echo '累積スコア|';
        foreach ($this->accumulateScores as $score) {
            printf(" %3d ", $score);
            echo '|';
        }
        echo "\n";
    }

    private function _isStrike($frame)
    {
        return $frame[0] === 10 ? true : false;
    }

    private function _isSpare($frame)
    {
        return ($frame[0] + $frame[1]) === 10 ? true : false;
    }

    // TODO 8,9フレーム目かどうかの条件をメソッド化する
    public function calcScoresForEachFrame()
    {
        foreach ($this->pins as $key => $frame) {
            if ($key + 1 === 10) { // 10フレーム目
                $this->scores[$key] = $frame[0] + $frame[1] + $frame[2];
            } else if ($this->_isStrike($frame)) {
                $this->scores[$key] = $frame[0];
                if ($key + 1 < 10) { // 9フレーム目以下
                    $this->scores[$key] += $this->pins[$key + 1][0] + $this->pins[$key + 1][1];
                    if ($key + 2 < 10) { // 8フレーム目以下
                        if ($this->_isStrike($this->pins[$key + 1])) {
                            $this->scores[$key] += $this->pins[$key + 2][0];
                        }
                    }
                }
            } else if ($this->_isSpare($frame)) {
                $this->scores[$key] = $frame[0] + $frame[1];
                if ($key + 1 < 10) {
                    $this->scores[$key] += $this->pins[$key + 1][0];
                }
            } else {
                $this->scores[$key] = $frame[0] + $frame[1];
            }
        }
    }

    public function calcAccumulateScoreForEachFrame()
    {
        foreach ($this->scores as $i => $score) {
            $this->accumulateScores[$i] = ($i === 0) ? $score : $this->accumulateScores[$i - 1] + $score;
        }
    }

    public function calcTotalScore()
    {
        $totalScore = 0; // スコアの累計
        foreach ($this->scores as $score) {
            $totalScore += $score;
        }
        return $totalScore;
    }
}
