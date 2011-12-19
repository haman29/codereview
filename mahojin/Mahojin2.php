<?php
/*
 * @author kyohei hamada
 * @see    http://www.itmn.biz/
 * @see    http://d.hatena.ne.jp/net-k/20090124/1232787907
 * @履歴
 * 2011年 12月 18日 日曜日 18:37:06 JST start
 * 2011年 12月 18日 日曜日 21:36:44 JST end
 * 2011年 12月 19日 月曜日 22:00:45 JST start
 * 2011年 12月 19日 月曜日 23:43:45 JST end
 */
class Mahojin2
{
	public function isCorrect($numbers)
	{
		// 行の合計チェック
		$sumRowArray = array(0, 0, 0);
		$k = 0;
		for ($i = 0; $i < sizeof($numbers); $i = $i + 3) {
			for ($j = $i; $j < $i + 3; $j++) {
				$sumRowArray[$k] += $numbers[$j];
			}
			$k++;
		}
		$sum = $sumRowArray[0];
		if ( ! ($sum === $sumRowArray[1] && $sum === $sumRowArray[2])) {
			return false;
		}

		// 列の合計チェック
		$sumColumnArray = array(0, 0, 0);
		for ($i = 0; $i < 3; $i++) {
			for ($j = $i; $j < sizeof($numbers); $j = $j + 3) {
				$sumColumnArray[$i] += $numbers[$j];
			}
		}
		if ( ! ($sum === $sumColumnArray[0] && $sum === $sumColumnArray[1] && $sum === $sumColumnArray[2])) {
			return false;
		}

		// 斜めの合計チェック
		$sumObliqueArray = array(0, 0);
		$sumObliqueArray[0] = $numbers[0] + $numbers[4] + $numbers[8];
		$sumObliqueArray[1] = $numbers[2] + $numbers[4] + $numbers[6];
		if ( ! ($sum === $sumObliqueArray[0] && $sum === $sumObliqueArray[1])) {
			return false;
		}
		return true;
	}

	public function display($numbers) {
		for ($i = 0; $i < sizeof($numbers); $i++) {
			echo "$numbers[$i] ";
			if (($i + 1) % 3 === 0) echo "\n";
		}
		echo "\n";
	}

	public function swap($numbers, $i, $j)
	{
		$tmp = $numbers[$i];
		$numbers[$i] = $numbers[$j];
		$numbers[$j] = $tmp;
	}

	public function permutation($numbers, $depth, $maxDepth)
	{
		if ($maxDepth <= $depth) {
			if ($this->isCorrect($numbers)) $this->display($numbers);
			return;
		}
		$i = $depth;
		while ($i <= $maxDepth) {
			$this->swap(&$numbers, $depth, $i);
			$this->permutation($numbers, $depth + 1, $maxDepth);
			$this->swap(&$numbers, $depth, $i);
			$i++;
		}
	}

	public function permutation2($original, $result)
	{
		if (sizeof($original) === 0) {
			if ($this->isCorrect($result)) $this->display($result);
			return;
		}
		foreach ($original as $key => $number) {
			$clone = $original;
			unset($clone[$key]);
			$corrent = $result;
			$corrent[] = $number;
			$this->permutation2($clone, $corrent);
		}
	}
}

// execute
$mahojin = new Mahojin2();

// こんなイメージ
//[1, 2, 3]
//[4, 5, 6]
//[7, 8, 9]
$numbers1 = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
echo "question 1\n";
//$mahojin->permutation($numbers1, 0, sizeof($numbers1) - 1);
$mahojin->permutation2($numbers1, array());

$numbers9 = array(1, 2, 3, 11, 12, 13, 21, 22, 23);
echo "question 9\n";
$mahojin->permutation2($numbers9, array());

$numbers10 = array(5, 17, 29, 47, 59, 71, 89, 101, 113);
echo "question 10\n";
$mahojin->permutation2($numbers10, array());
