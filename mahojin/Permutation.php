<?php
class Permutation
{
	public function __construct()
	{
	}

	public function swap($numbers, $i, $j)
	{
		$tmp = $numbers[$i];
		$numbers[$i] = $numbers[$j];
		$numbers[$j] = $tmp;
	}

	public function permutate($numbers, $depth, $maxDepth)
	{
		if ($maxDepth <= $depth) {
			foreach($numbers as $number) {
				echo "$number ";
			}
			echo "\n";
			return;
		}
		$i = $depth;
		while ($i <= $maxDepth) {
			$this->swap(&$numbers, $depth, $i);
			$this->permutate($numbers, $depth + 1, $maxDepth);
			$this->swap(&$numbers, $depth, $i);
			$i++;
		}
	}
}

//$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
//$permutation = new Permutation();
//var_dump($numbers);
//$permutation->permutate($numbers, 0, sizeof($numbers) - 1);
