<?php

class Mahojin2 ()
{
	public $nubmers; // 最初に与えられて数列
	public $result;  // 答えの数列

	public function __construct($numbers)
	{
		$this->numbers = $numbers;
	}

	public function result()
	{
	}
}

$mahojin = new Mahojin2(
	array(1, 2, 3),
	array(4, 5, 6),
	array(7, 8, 9)
);
