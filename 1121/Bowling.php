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
    public $pins;        // 各フレームで倒したピン
    public $displayPins; // $pins をボーリングの表示用に変更したもの
    public $score;       // 各フレームのスコア

    /**
     * 倒したピンの本数をセット
     * TODO ランダムに値を入れる
     */
    public function __construct($pins)
    {
        $this->pins = $pins;
    }

    private function _isStrike($frame)
    {
        return $frame[0] === 10 ? true : false;
    }

    private function _isSpare($frame)
    {
        return ($frame[0] + $frame[1]) === 10 ? true : false;
    }

    public function changeDisplayOfPins()
    {
        foreach ($this->pins as $i => $frame) {
            foreach ($frame as $j => $pin) {
                $displayPins[$i][$j] = $pin;
            }
        }
        return $displayPins;
    }

    public function calcScoreForEachFrame()
    {
        foreach ($this->pins as $key => $frame) {
            if ($this->_isStrike($frame)) {
                $this->score[$key] = $frame[0] + $frame[1];
                if ($key + 1 < 10) {
                    $this->score[$key] += $this->pins[$key + 1][0] + $this->pins[$key + 1][1];
                }
            } else if ($this->_isSpare($frame)) {
                $this->score[$key] = $frame[0] + $frame[1];
                if ($key + 1 < 10) {
                    $this->score[$key] += $this->pins[$key + 1][0];
                }
            } else {
                $this->score[$key] = $frame[0] + $frame[1];
            }
        }
        return $this->score;
    }

    public function calcTotalScore()
    {
        $totalScore = 0; // スコアの累計
        foreach ($this->score as $score) {
            $totalScore += $score;
        }
        return $totalScore;
    }
}
