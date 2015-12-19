<?php
class factorial
{
	private $result = 1;// you can initialize directly outside
	private $number;
	function __construct($number)
	{
		$this->number = $number;
		for($i=2; $i<=$number; $i++)
		{
			$this->result *= $i;
		}
	}
	public function showResult()
	{
		echo "Factorial of {$this->number} is {$this->result}. ";
	}
}
$fact = new Factorial(5);
$fact->showResult();
?>