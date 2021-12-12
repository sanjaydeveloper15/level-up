<?php 
	$start_time = microtime(true);
?>

<title>Let's Do It - Coding Challenges</title>

<h1>Let's Do It - Coding Challenges</h1>
<hr>

<h2>$first_arr = [5,8,3,1,9,0,-3];</h2>
<?php 
	$first_arr = [5,8,3,1,9,0,-3];
	$string = 'This is some text with some more text and even more text.so whats up guys!';
?>
<?php try{ ?>
<h2>Write a Program for finding the biggest number in an array without using any array functions ?</h2>
<?php 
	function getBigNumber(array $arr){
		$biggest_number = $arr[0];
		foreach($arr as $item){
			if($biggest_number < $item){
				$biggest_number = $item;
			}
		}
		echo $biggest_number;
	}
	getBigNumber($first_arr);
?>

<h2>Write a Program for finding the smallest number in an array ?</h2>
<?php 
	function getSmallNumber(array $arr){
		$small_number = $arr[0];
		foreach($arr as $item){
			if($small_number > $item){
				$small_number = $item;
			}
		}
		echo $small_number;
	}
	getSmallNumber($first_arr);
?>

<h2>Write a program to find the second highest number in an array?</h2>
<?php 
	function getSecondBiggestNumber(array $arr){
		$result = 0;
		$biggest_number_index = 0;
		$second_biggest_number = 0;
		$i = 0;
		foreach($arr as $item){
			if($second_biggest_number < $item){
				$biggest_number_index = $i;
			}
			$i++;
		}
		unset($arr[$biggest_number_index]);
		foreach($arr as $item){
			if($second_biggest_number < $item){
				$second_biggest_number = $item;
			}
			$i++;
		}
		echo $second_biggest_number;
		
	}
	getSecondBiggestNumber($first_arr);
?>

<h2>Sort Array Ascending Program ?</h2>
<?php
	function sortArrAsc(array $arr){
		$result_arr = [];
		for ($i=0; $i < count($arr); $i++) { 
			for ($j=($i+1); $j < count($arr); $j++) { 
				if($arr[$i] > $arr[$j]){
					//$arr[$j+1] = $arr[$j];
					$min = $arr[$j];
					$arr[$j] = $arr[$i];//switch
					$arr[$i] = $min;
				}
				//echo '<pre>';print_r($arr);echo '</pre>';
			}
		}
		var_dump($arr);
	}
	sortArrAsc($first_arr);
?>


<h2>Sort Array Descending Program ?</h2>
<?php
	function sortArrDes(array $arr){
		$result_arr = [];
		for ($i=0; $i < count($arr); $i++) { 
			for ($j=($i+1); $j < count($arr); $j++) { 
				if($arr[$i] < $arr[$j]){
					$min = $arr[$j];
					$arr[$j] = $arr[$i];//switch
					$arr[$i] = $min;
				}
				//echo '<pre>';print_r($arr);echo '</pre>';
			}
		}
		var_dump($arr);
	}
	sortArrDes($first_arr);
?>

<h2>Count Function Program ?</h2>
<?php 
	function customArrCount(array $arr){
		$result = 0;
		foreach($arr as $item){
			$result++;
		}
		echo $result;
	}
	customArrCount($first_arr);
?>

<h2>Array Filter Program - Index Array ?</h2>
<?php 
	function indexArrayFilter(array $arr){
		$result_arr = [];
		$i = 0;
		foreach($arr as $item){
			if($item!=''){
				$result_arr[count($result_arr)] = $item;
				$i++;
			}
		}
		var_dump($result_arr);
	}
	indexArrayFilter([1,2,'','qwerty',9,'',9388]);
?>

<h2>Array Filter Program - Associative Array ?</h2>
<?php 
	function assocArrayFilter(array $arr){
		$result_arr = [];
		foreach($arr as $key => $value){
			if($value!=''){
				$result_arr[$key] = $value;
			}
		}
		print_r($result_arr);
	}
	assocArrayFilter(
		[
			'a' => 'apple', 'b' => 'ball', 'c' => '', 'd' => '', 'e' => 'elephant'
		]
	);
?>

<h2>Remove 3rd Element From An Array ?</h2>
<?php 
	function removeElementFromArr(array $arr,$removeEleNum){
		$result_arr = [];
		for ($i=0; $i < count($arr); $i++) { 
			if($i!=($removeEleNum-1)){
				$result_arr[count($result_arr)] = $arr[$i];
			}
		}
		print_r($result_arr);
	}
	removeElementFromArr($first_arr,3);
?>

<h2>Insert new element at 3rd position program ?</h2>
<?php 
	function insertElementInArr(array $arr,int $position, int $value){
		$result_arr = [];
		for ($i=0; $i < count($arr); $i++) { 
			if($i==($position-1)){
				$result_arr[count($result_arr)] = $value;
			}
			$result_arr[count($result_arr)] = $arr[$i];
		}
		print_r($result_arr);
	}
	insertElementInArr($first_arr,4,11);
?>

<h2>Create a function to get the Factorial of number?(4*3*2*1)</h2>
<?php 
	function getFactorial(int $number){
		$result = 1;
		for ($i=1; $i <= $number; $i++) { 
			$result *= $i;
		}
		echo $result;
	}
	getFactorial(4);
?>

<h2>Write a function to show fibonacci series?</h2>
<?php 
	function genFibonacciSeries(int $tillSequence){
		$result_arr = [0,1];
		for ($i=0; $i < $tillSequence-2; $i++) { 
			$result_arr[count($result_arr)] = $result_arr[$i] + $result_arr[$i+1];
		}
		print_r($result_arr);
	}
	genFibonacciSeries(15);
?>

<h2>Write a Linear Search program ? (basically in_array)</h2>
<?php 
	function customrInArray(array $arr, $v){
		$return = false;
		foreach($arr as $item){
			if($item === $v){
				$return = true;
				break;
			}
		}
		echo $return;
	}
	customrInArray($first_arr,-3);
?>

<h2>Write a Binary Search program ? (basically in_array advance for faster response)</h2>
<?php 
	function doBinarySearch($v,array $arr){
		$left = 0;
		$right = count($arr);
		
	}
	echo doBinarySearch(10,[-3,-1,0,4,8,10,11,15,24,512]);
?>

<h2>Get total vowel count from string ?</h2>
<?php 
	function getVowelsCount(string $str){
		$result = 0;
		$str_arr = str_split($str,1);
		foreach($str_arr as $letter){
			if($letter == 'a' || $letter == 'e' || $letter == 'i' || $letter == 'o' || $letter == 'u'){
				$result++;
			}
		}
		return $result;
	}
	echo getVowelsCount($string);
?>

<h2>String reverse function ?</h2>
<?php 
	function strReverse(string $str){
		$result_str = '';
		$str_arr = str_split($str,1);
		$total_count = count($str_arr)-1;
		for ($i=$total_count; $i > -1; $i--) { 
			$result_str .= $str_arr[$i];
		}
		return $result_str;
	}
	echo strReverse($string);
?>

<h2>How to get the last character of a string in php?</h2>
<?php 
	function getLastChar(string $str){
		$result_str = '';
		$str_arr = str_split($str,1);
		$total_count = count($str_arr)-1;
		return $str_arr[$total_count];
	}
	echo getLastChar($string);
?>

<h2>Program to print -1 * ?</h2>
<?php
	function printStars(int $tillNumber){
		$result = '';
		for ($i=0; $i < $tillNumber; $i++) { 
			for ($j=$tillNumber-1; $j >= $i; $j--) { 
				$result .= '*';
			}
			$result .= '<br>';
		}
		
		return $result;
	}
	echo printStars(7);
?>

<h2>Program to print +1 * ?</h2>
<?php
	function printStarsInc(int $tillNumber){
		$result = '';
		for ($i=0; $i < $tillNumber; $i++) { 
			for ($j=1; $j <= $i+1; $j++) { 
				$result .= '*';
			}
			$result .= '<br>';
		}
		
		return $result;
	}
	echo printStarsInc(7);
?>

<h2>Program for numbers in increasing order?</h2>
<?php 
	function numInInc($tillNumber){
		$result = '';
		for ($i=0; $i <= $tillNumber; $i++) { 
			for ($j=1; $j < $i+1; $j++) { 
				$result .= $j.' ';
			}
			$result .= '<br>';
		}
		return $result;
	}
	echo numInInc(10);
?>

<h2>Program for numbers in decreasing order?</h2>
<?php 
	function numInDec($tillNumber){
		$result = '';
		for ($i=0; $i <= $tillNumber; $i++) { 
			for ($j=1; $j < $tillNumber-$i+1; $j++) { 
				$result .= $j.' ';
			}
			$result .= '<br>';
		}
		return $result;
	}
	echo numInDec(10);
?>

<h2>Chess Program ?</h2>
<?php 
	function makeChess($xColor='white',$yColor='black'){
		$result = '<div style="border:1px solid #000;width:80px;">';
		for ($i=1; $i < 9; $i++) { 
			for ($j=2; $j < 10; $j++) {
				$getType = Gettype($j/2);
				$getTypeMain = Gettype($i/2);
				if($getTypeMain=='double'){//odd
					$color = ($getType=='integer') ? $xColor : $yColor;
				}
				if($getTypeMain=='integer'){//integer
					$color = ($getType=='double') ? $xColor : $yColor;
				}
				 
				$result .= "<span><div style='background:".$color.";width:10px;height:10px;display:inline-block;'></div></span>";
			}
			$result .= '<br>';
		}
		$result .= '</div>';
		return $result;
	}
	echo makeChess('purple','white');
?>

<?php }catch(Exception $e){
	echo $e->getMessage();
} ?>

<h2>ArmStrong Number Program? (ab = a cube + b cube)</h2>
<?php 
	function isArmStrongNum(int $n){
		$arr = str_split((string)$n,1);
		$total = 0;
		foreach ($arr as $item) {
			$total += $item*$item*$item;
		}
		return ($total==$n) ? true : false;
	}
	echo isArmStrongNum(407);

?>

<h2>Check Number is Prime or Not program ? (those who has exact 2 factors only)</h2>
<?php 
	function isPrime(int $num){
		$factor_count = 0;
		for ($i=1; $i <= $num; $i++) { 
			if($factor_count > 2){
				break;
				return false;
			}
			$check = $num/$i;
			$type = gettype($check);
			if($type=='integer'){
				$factor_count += 1;
			}
		}
		return ($factor_count == 2) ? 1 : 0;
	}
	echo isPrime(23);
?>

<h2>Perfect Number Program ?</h2>
<?php 
	function isPerfect(int $num){
		$total_sum = 0;
		for ($i=1; $i < $num; $i++) { 
			$is_factor = $num/$i;
			$type = gettype($is_factor);
			if($type=='integer'){
				$total_sum += $i;
			}
		}
		return ($total_sum == $num) ? 1 : 0;
	}
	echo isPerfect(28);
?>

<h2>Leap Year Program ?</h2>
<?php 
	function isLeap(int $year){
		$first_check = $year/4;
		if(gettype($first_check)=='integer'){
			return 1;
		}
		$second_check = $year/400;
		if(gettype($second_check)=='integer'){
			return 1;
		}
		return 0;
	}
	echo isLeap(2024);
?>

<?php 
	$end_time = microtime(true);
?>