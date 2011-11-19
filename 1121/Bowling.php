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
    public $pins;             // 各フレームで倒したピン
    public $scores;           // 各フレームのスコア
    public $accumulateScores; // 各フレームの累積スコア

    // ボツ
    public $displayPins; // $pins をボーリングの表示用に変更したもの

    /**
     * 倒したピンの本数をセット
     * TODO ランダムに値を入れる
     */
    public function __construct($pins)
    {
        $this->pins = $pins;
    }

    public function displayPins()
    {
        echo '|';
        foreach ($this->pins as $frame) {
            foreach ($frame as $i => $pin) {
                echo $pin;
                if ($i === 0) echo ',';
            }
            echo '|';
        }
        echo "\n";
    }

    public function displayscores()
    {
        echo '|';
        foreach ($this->scores as $score) {
            echo $score;
            echo '|';
        }
        echo "\n";
    }

    public function displayAccumulateScores()
    {
        echo '|';
        foreach ($this->accumulateScores as $score) {
            echo $score;
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
            if ($this->_isStrike($frame)) {
                $this->scores[$key] = $frame[0];
                if ($key + 1 < 10) {
                    $this->scores[$key] += $this->pins[$key + 1][0] + $this->pins[$key + 1][1];
                    if ($key + 2 < 10) {
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



    // ボツ(表示用に記号を追加するなどしたかった)
    public function getDisplayOfPins()
    {
        foreach ($this->pins as $i => $frame) {
            foreach ($frame as $j => $pin) {
                $this->displayPins[$i][$j] = $pin;
            }
        }
        return $this->displayPins;
    }
}
