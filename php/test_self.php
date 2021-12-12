<ul>
	<li>Cannot redeclare static methods</li>
	<li>Cannot redeclare same method inside same class</li>
	<li>Can call methods with $obj = new Abc(); $obj->methodName(); OR Abc::methodName();</li>
	<li>Abc::unknownMethod() cannot called in __call() magic method.</li>
</ul>
<?php 
	$abc = 10;
	$anoy = function() use ($abc){
		return 'Hello Method '.$abc;
	};
	echo $anoy();
	exit();
?>
<?php
	class Abc{
		
		public $propPub = 10;
		protected $propProt = 20;
		private $propPvt = 30;
		
		public function __construct(string $key){
			if($key!=__CLASS__){
				echo 'Not a valid key';
				exit();
			}
		}
		
		public function __get($propertyName){
			if(!property_exists(__CLASS__,$propertyName)){
				echo 'this property '.$propertyName.' is not available in class '.__CLASS__;
				exit();
			}
			return $propertyName;
		}
		
		public function __call($methodName,$paramInArr){
			//print_r($paramInArr);die;
			if(!method_exists(__CLASS__,$methodName)){
				echo $methodName.' method not exists in class '.__CLASS__;
				exit();
			}
			return $this->$methodName($paramInArr);
		}
		
		public static function __callStatic($methodName,$paramInArr){
			if(!method_exists(__CLASS__,$methodName)){
				echo $methodName.' method not exists in class '.__CLASS__;
				exit();
			}
			return self::$methodName($paramInArr);
		}
		
		public function ForPublic(){
			return "I am for all public";
		}
		
		
		public static function StaticPublic(){
			return "I am static public method";
		} 
		
		protected function ForProt(){
			return "I am protected method";
		}
		
		protected static function StaticProt(){
			return "I am protected static method";
		}
		
		private function ForPvt(){
			return "I am private method";
		}
		
		private static function StaticPvt(){
			return "I am private static method";
		}
	}
	var_dump(get_class_vars("Abc"));
	//$obj = new Abc('Abc');
	//echo $obj->propPvt;
	//echo $obj->ForPvt();
	//echo Abc::StaticPvt();
	
	abstract class Def{
		public function __construct(string $key){
			if($key!=__CLASS__){
				echo 'Not a valid key of abstract class';
				exit();
			}
		}
		
		protected abstract function hello();
		
		public function commonForChilds(){
			return 'Common Data For Childs';
		}
	}
	
	class Ghi extends Def{
		public function hello(){
			return 'hello world';
		}
	}
	
	$obj = new Ghi('Def');
	//echo $obj->hello();
	echo $obj->commonForChilds();
?>

<?php
	exit();
	$a = 'GlamPass';
	$anon = function() use($a){
		return "Hello ".$a;
	};
	echo $anon();
?>
<?php 
	
?>
<hr>
<?php 
	$index_arr = [5,6,0,9,-5,16,1];
	
	if(!function_exists('sortAsc')){
		function sortAsc(Array $arr){
			for($i=0;$i<count($arr);$i++){
				for($j=$i+1;$j<count($arr);$j++){
					if($arr[$i] > $arr[$j]){
						$temp = $arr[$i];
						$arr[$i] = $arr[$j];
						$arr[$j] = $temp;
					}
				}
				//print_r($arr);die;
			}
			return $arr;
		}
	}
	
	echo '<pre>';
	print_r(sortAsc($index_arr));
	echo '</pre>';
	
	if(!function_exists('getFactorial')){
		function getFactorial(int $num){
			$result = 1;
			for($i=$num;$i>0;$i--){
				$result *= $i;
			}
			return $result;
		}
	}
	
	echo getFactorial(5);
	
	if(!function_exists('generateFibonacci')){
		function generateFibonacci(int $tillSequenceNum){
			$arr = [0,1];
			for($i=0;$i<$tillSequenceNum-2;$i++){
				$arr[count($arr)] = $arr[count($arr)-1] + $arr[count($arr)-2];
			}
			return $arr;
		}
	}
	
	echo '<pre>';
	print_r(generateFibonacci(12));
	echo '</pre>';
	
	if(!function_exists('genDiamond')){
		function genDiamond(int $tillNum){
			if(gettype($tillNum/2)=='integer'){
				return 'Number '.$tillNum.' is not valid';
			}
			$result = '<div style="max-width:240px;height:auto;border:1px solid #333;border-radius:10px;padding-top:20px;">';
			for($i=0;$i<$tillNum;$i++){
				if(gettype($i/2)=='integer'){
					$result .= '<center>';
					for($j=0;$j<$i+1;$j++){
							$result .= '* ';
					}
					$result .= '</center>';
					$result .= '<br>';
				}
			}
			for($i=$tillNum-2;$i>-1;$i--){
				if(gettype($i/2)=='integer'){
					$result .= '<center>';
					for($j=0;$j<$i+1;$j++){
							$result .= ' * ';
					}
					$result .= '</center>';
					$result .= '<br>';
				}
			}
			$result .= '</div>';
			return $result;
		}
	}
	
	echo genDiamond(9);
	
	if(!function_exists('betweenPrimeNumber')){
		function betweenPrimeNumber(int $from, int $to){
			if($from > $to){
				return 'Frist number should be smaller then second number';
			}
			$result_arr = [];
			for($i=$from-1;$i<$to;$i++){
				if(isPrime($i)){
					$result_arr[count($result_arr)] = $i;
				}
			}
			return $result_arr;
		}
		
		function isPrime(int $num){
			$factors_count = 0;
			for($i=1;$i<=$num;$i++){
				$is_factor = $num/$i;
				if(gettype($is_factor)=='integer'){
					$factors_count += 1;
				}
			}
			
			return ($factors_count==2) ? true : false;
		}
	}
	
	echo '<pre>'; print_r(betweenPrimeNumber(100,200)); echo '</pre>';
?>
<h4>Find if pair exist in array whose sum is k</h4>
<?php 
	function pairExists(array $arr, int $k){
		for($i=0;$i<count($arr);$i++){
			for($j=$i+1;$j<count($arr);$j++){
				if($k == ($arr[$i]+$arr[$j])){
					return 1;
				}
			}
		}
		return 0;
	}
	$for_pair_arr = [3,10,9,5,2];
	$k = 14;
	echo pairExists($for_pair_arr,$k);
?>

<h4>Check string is plaindrome or not</h4>
<?php 
	function isPlaindrome(string $str){
		$str_arr = str_split($str,1);
		$count = count($str_arr);
		$is_true = 1;
		for($i=0; $i < $count/2; $i++){
			if($str_arr[$i]!=$str_arr[($count-1)-$i]){
				$is_true = 0;
				break;
			}
		}
		return $is_true;
	}
	echo isPlaindrome(strtolower('Kayak'));
?>

