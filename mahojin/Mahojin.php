<?php
/**
 * @author Kyohei Hamada
 * @履歴 
 * 2011年 12月  3日 土曜日 20:00:00 JST start
 * 2011年 12月  3日 土曜日 20:52:54 JST stop
 * 2011年 12月  6日 火曜日 00:01:08 JST start
 * 2011年 12月  6日 火曜日 00:56:21 JST stop
 * 2011年 12月  6日 火曜日 23:00:22 JST start
 * 2011年 12月  7日 水曜日 00:06:02 JST end  question1 を解くことができた
 * 2011年 12月  9日 金曜日 22:59:52 JST start
 * 2011年 12月  9日 金曜日 23:46:38 JST end 
 *
 * @todo
 *  正しく値が入っているかチェックするテストコードを書く
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
 */
class Mahojin
{
    public $numbers;    // 最終的な完成形
    public $useNumbers; // 使うことのできる数字
    public $sum;        // 縦横斜めいずれかの合計値

    public function __construct($numbers, $useNumbers = array(), $sum = -1)
    {
        $this->numbers = $numbers;
        $this->sum     = $sum;
        foreach($numbers as $column){
            $this->useNumbers = array_diff($useNumbers, $column);
        }
    }

    public function displayNumbers()
    {
        echo "display numbers\n";
        foreach ($this->numbers as $row) {
            foreach ($row as $value) {
                printf("%d\t", $value);
            }
            echo "\n";
        }
    }

    public function getThreeNum()
    {
        return $this->sum;
    }

    public function setNumberAboutRows()
    {
        foreach ($this->numbers as $i => $row) {
            $exist = array();
            $empty = array();
            foreach ($row as $j => $val) {
                if ($val === -1) {
                    $empty[$j] = $val;
                } else {
                    $exist[$j] = $val;
                }
            }
            if (sizeof($empty) === 1) {
                $rowSum = 0;
                foreach ($exist as $v) {
                    $rowSum += $v;
                }
                // key() によって$emptyの0番目のキーを取得している
                $this->numbers[$i][key($empty)] = $this->sum - $rowSum;
            }
        }
    }

    public function transport()
    {
        foreach ($this->numbers as $i => $column) {
            foreach ($column as $j => $value) {
                $this->numbers[$j][$i] = $value;
            }
        }
    }

    public function setNumberAboutColumns()
    {
        $this->transport();
        $this->setNumberAboutRows();
        $this->transport();
    }

    public function roop()
    {
        while(true) {
            $this->displayNumbers();
            $this->setNumberAboutRows();
            $this->displayNumbers();
            $this->setNumberAboutColumns();
            $flag = false;
            foreach ($this->numbers as $k => $row) {
                if (in_array(-1, $this->numbers[$k])) $flag = true;
            }
            if ( ! $flag) exit;
        }
    }

    public function checkRowSum()
    {
    }

    // 斜め
    public function setNumberAboutOblique()
    {
    }
}
