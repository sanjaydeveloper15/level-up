<title>Arrays Algoworks in PHP</title>

<h3>Sort Array Ascending Program</h3>
<?php
$arr = array(4,1,9,2,8,0,24);
$k = 0;
for ($i=0; $i < count($arr); $i++) { 
	$min = ''; $k = '';
	for ($j=($i+1); $j < count($arr); $j++) { 
		if($arr[$i] > $arr[$j]){
			//$arr[$j+1] = $arr[$j];
			$min = $arr[$j];
			$arr[$j] = $arr[$i];
			$arr[$i] = $min;
		}
	}
	if(!empty($min) && !empty($k)){
		// $arr[$k] = $arr[$i]; 
		// $arr[$i] = $min;
	}
	// print_r($arr);
	// if($i>1){die;}
}

print_r($arr);
?>
<h3>Sort Array Descending Program</h3>
<?php
$arr = array(4,1,9,2,8,0,24);
$k = 0;
for ($i=0; $i < count($arr); $i++) { 
	$min = ''; $k = '';
	for ($j=($i+1); $j < count($arr); $j++) { 
		if($arr[$i] < $arr[$j]){
			$min = $arr[$j];
			$arr[$j] = $arr[$i];
			$arr[$i] = $min;
		}
	}
}


print_r($arr);
?>

<h3>Count Function Program</h3>
<?php 
$arr = array(1,2,3,4,5);
$i = 0;
foreach ($arr as $value) {
 	$i++;
} 
echo 'Count is: '.$i;
?>

<h3>Array Filter Program - Index Array</h3>
<?php
$arr = array('1','3','','7');
$filter_arr = array();
for ($i=0; $i < count($arr); $i++) { 
 	if($arr[$i]!=''){
 		$filter_arr[count($filter_arr)] = $arr[$i];
 	}
} 

print_r($filter_arr);
?>

<h3>Array Filter Program - Associative Array</h3>
<?php
$arr = array('a' => '1', 'b' => '2', 'c' => '', 'd' => '4');
//print_r($arr);
$filter_arr = array();
foreach ($arr as $key => $value) {
	if($value!=''){
		$filter_arr[$key] = $value;
	}
}
print_r($filter_arr);
?>

<h3>Remove 3rd Element From An Array</h3>
<?php
$arr = array(1,2,4,6,7,9);
print_r($arr);
unset($arr[2]);
echo 'To ';
print_r($arr);
?>

<h3>Insert new element at 3rd position program</h3>
<?php
$arr = array(1,2,3,4,5);
print_r($arr);
$new_arr = array();
for ($i=0; $i < count($arr)+1; $i++) { 
	if($i<2){
		$new_arr[$i] = $arr[$i];
	}else if($i==2){
		$new_arr[$i] = 0;
	}else{
		$new_arr[$i] = $arr[$i-1];
	}
}
echo 'To ';print_r($new_arr);
?>
<h3>Array Sort Asc - Test</h3>
<?php
$arr = array(3,1,2,0,9,-3); 
for ($i=0; $i < count($arr)-1; $i++) { 
	for ($j=$i+1; $j < count($arr); $j++) { 
		$temp = '';
		if($arr[$i] > $arr[$j]){
			$temp = $arr[$j];
			$arr[$j] = $arr[$i];
			$arr[$i] = $temp;
		}
	}
	//print_r($arr);
}
print_r($arr);
?>