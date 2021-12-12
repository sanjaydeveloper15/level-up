<title>Other - PHP</title>

<h2>Get Number of Days Between Two Dates</h2>

<?php 
	if(!function_exists('diffBw2Dates')){
		function diffBw2Dates($date1,$date2){
			$diff = strtotime($date2) - strtotime($date1);
			echo $diff/(24*60*60). ' Days';
		}
	}	

	diffBw2Dates('2021-08-01','2021-09-01');
?>

<h2>Object Iterator</h2>
<p>PHP provides a way for objects to be defined so it is possible to iterate through a list of items, with, for example, a foreach statement. By default, all visible properties will be used for the iteration.<b>Looping of all object properties</b></p>

<?php 
class objectIteration 
{
	function __construct()
	{
		echo "Object Iteration is Calling<br>";
	}

	public $a = 'Apple';
	public $b = 'Ball';
	protected $c = 'Cat';
	private $d = 'Dog';

	function iteration(){
		foreach ($this as $key => $value) {
			echo 'key: '.$key. " & value: ". $value . "<br>";
		}	
	}
	
}

$obj = new objectIteration;
$obj->iteration();
echo "-------- Outside class iteration only PUBLIC -----------<br>";
foreach ($obj as $key => $value) {
	echo 'key: '.$key. " & value: ". $value . "<br>";
}

?>

<h3>What’s the difference between htmlentities() and htmlspecialchars()?</h3>

<?php 
	$string = "What’s the difference between <b>htmlentities()</b> and htmlspecialchars()?";
	echo htmlspecialchars($string);
	echo '<br>';
	echo htmlentities($string);
?>

<h3>Explode() and Split()</h3>

<?php 
	$string = 'hey how are you guys?';
	print_r(explode('o',$string));
	//print_r(preg_split('o', $string));

	$abc = true and false;
	var_dump($abc);
?>