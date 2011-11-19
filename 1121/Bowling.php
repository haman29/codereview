<?php
/**
 * 新卒コードレビュー
 * 課題：ボーリングのスコアを計算する
 * 現状：10フレーム目を考慮してないところまで完成
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

    public function getDisplayOfPins()
    {
        foreach ($this->pins as $i => $frame) {
            foreach ($frame as $j => $pin) {
                $this->displayPins[$i][$j] = $pin;
            }
        }
        return $this->displayPins;
    }

    // TODO 8,9フレーム目かどうかの条件をメソッド化する
    public function calcScoreForEachFrame()
    {
        foreach ($this->pins as $key => $frame) {
            if ($this->_isStrike($frame)) {
                $this->score[$key] = $frame[0];
                if ($key + 1 < 10) {
                    $this->score[$key] += $this->pins[$key + 1][0] + $this->pins[$key + 1][1];
                    if ($key + 2 < 10) {
                        if ($this->_isStrike($this->pins[$key + 1])) {
                            $this->score[$key] += $this->pins[$key + 2][0];
                        }
                    }
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
        var_dump($this->score);
        foreach ($this->score as $score) {
            $totalScore += $score;
        }
        return $totalScore;
    }
}
