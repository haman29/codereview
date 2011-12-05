<?php
/**
 * @author Kyohei Hamada
 * @履歴 
 * 2011年 12月  3日 土曜日 20:00:00 JST start
 * 2011年 12月  3日 土曜日 20:52:54 JST stop
 * 2011年 12月  6日 火曜日 00:01:08 JST start
 * 2011年 12月  6日 火曜日 00:56:21 JST end
 *
 * @rule
 * 1. 魔方陣とは縦・横・斜め等の足し算をした結果、合計が一緒になるようなもの
 *
 * @feature
 * 1. 真ん中のマスに入る数値は、(縦横斜めの合計値 / ３)
 * 2. 右に行くにつれ「x」づつ増える
 *    下に行くにつれ「y」づつ増える
 *    という性質を持つ９つの数字を使う
 *
 * @see http://iis.edu.tama.ac.jp/~takato/prg/prg01.htm
 * ・一番最初の１は最上段の中央から始める。
 * ・次の数字は右上におく。最上段に達したときは、最下段の右におく。
 * ・右上にすでに数字があるときはいまいる場所の下におく。 
 */
class Mahojin
{
    public $numbers;    // 最終的な完成形
    public $useNumbers; // 使うことのできる数字
    public $sum;        // 縦横斜めいずれかの合計値
    /**
     * 
     */
    public function __construct($numbers, $useNumbers = array(), $sum = -1)
    {
        $this->numbers = $numbers;
        $this->sum     = $sum;
        foreach($numbers as $column){
            $this->useNumbers = array_diff($useNumbers, $column);
        }
    }

    /**
     *  ３つの数字を足しあわした数を返す
     */
    public function getThreeNum()
    {
        return $this->sum;
    }

    // todo スマートに集合の関数使う
    public function resultColumn()
    {
        foreach ($this->numbers as $i => $column) {
            $exist = array();
            $empty = array();
            foreach ($column as $j => $val) {
                if ($val === -1) {
                    $empty[$j] = $val;
                } else {
                    $exist[$j] = $val;
                }
            }
            if (sizeof($empty) === 1)
        }
    }

    public function resultRow()
    {
    }
    public function resultSlope()
    {
    }
}
