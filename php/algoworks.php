<title>Algoworks in PHP</title>

<h2>Create a function to get Factorial of number?<br><small>Like getFactorial(3) = 3*2*1</small></h2>

<?php
	function getFactorial($num){
		$result = 1;
		$string = '';
		for ($i=1; $i <= $num ; $i++) { 
			$result *= $i;
			$string .= ($i > 1) ? ' * '.$i : $i ;
		}
		echo $string.'<br>';
		return $result;
	}

	var_dump(getFactorial(5));
?>

<h2>Write a function to show fibonacci series?<br><small>(0,1,1,2,3,5,8,...)</small></h2>

<?php
	function makeFibonacciSeries($tillNumber){
		$result_arr = [0,1];
		for ($i=1; $i <= $tillNumber-2; $i++) {
			$last_ele = $result_arr[(count($result_arr)-1)];
			$second_last_ele = $result_arr[(count($result_arr)-2)];
			$push_val =  $last_ele + $second_last_ele; 
			// if($tillNumber < $push_val){
			// 	break;
			// }
			array_push($result_arr,$push_val);//array_pop($result_arr)+1
		}
		$result = implode($result_arr,',');
		return $result;
	}

	var_dump(makeFibonacciSeries(12));
?>

<h2>Linear Search</h2>

<?php
	function doLinearSearch($v, Array $vs)
	{//is value available or not in array
		foreach ($vs as $val) {
			if ($v === $val) return true;
		}
		return false;
	}

	var_dump(doLinearSearch(33,[10,14,19,23,29,33,43]));
?>

<h2>Binary Search</h2>

<?php
	function doBinarySearch($v, Array $vs)
	{
		if (count($vs) === 0) return false;
		$left = 0;
		$right = count($vs) - 1;
		
		while (($left + 1) < $right) {
			$mid = $left + ($right - $left) / 2;
			if ($v < $vs[$mid]) {
				$right = $mid;
			} else {
				$left = $mid;
			}
		}
		return $vs[$left] === $v;
	}

	var_dump(doBinarySearch(33,[10,14,19,23,29,33,43]));
?>
