<title>Magic Methods in PHP</title>

<?php
/**
 * With Properties
 * Static property can be call with :: only (static way) A::$var
 * Cannot get simple property as static way :: Always can get $obj = new A(); echo $obj->propertyName;
 * */
$abc = 900;
class A{
	public $sanjay = 10;
	protected $b = 100;
	private $c = 1000;

	public static $static_var = 909;

	public function __get($property){//come inside for protected/privata and undefined property
		echo '<br>__get<br>';
		if(!property_exists($this, $property)){//class,property
			return 'Property/Variable does not exists.';
		}
		//echo 'SanjayGet.';
		return $this->$property;
	}

	public function __set($property,$value){
		echo "<br>__set<br> ";
		$this->$property = $value;
	}

	public function funcPub(){
		return 1;
	}

	protected function funcProt(){
		return 2;
	}

	private function funcPvt(){
		return 3;
	}

	function __call($funcName,$params){//define this then error gone for protectec and private
		return $this->$funcName($params);
	}

	static function __callStatic($funcName,$params){// $this is not working here because not a Object
		//return $this->$funcName($params);
		if(method_exists(__CLASS__, $funcName)){//Magic constraint __CLASS__
			$cls = __CLASS__;
			echo $cls::$funcName($params);
			echo call_user_func_array([__CLASS__,$funcName], $params);//callback predefined function
		}else{
			echo 'Method not exists';
		}
		//call_user_func_array([__CLASS__,$funcName], $params);
	}	

	private static function staticFunc(){//when call as a Static way then throw error, if call simple then can be accessable
		return 'a';
	}

	function __toString(){
		return 'You cannot echo the object';
	}

	function __isset($property){
		return $property;
	}

}
function __isset($property){
	return $property;
}
echo '<h2>Getter and Setter - Property</h2>';
//Static Way
// echo A::$sanjay .'<br>';
// A::$sanjay = 20;
// echo A::$sanjay;

//Standard Way
$obj = new A();
echo $obj->sanjay.'<br>';//not going into __get() Public
$obj->sanjay = 20;
echo $obj->sanjay.'<br>';//not going into __get() Public

echo $obj->qwerty;

//Get private and protected properties outside class (Login Is Just Write Down Getter, That's It)
echo $obj->b.'<br>';
echo $obj->c.'<br>';

$obj->b = 'Hundred <br>';
echo $obj->b.'<br>';

echo '<h2>__call() and __callStatic()</h2>';
echo 'standard functions<br>';
echo $obj->funcPub();
echo $obj->funcProt();
echo $obj->funcPvt();
echo '<br> static functions <br>';
echo A::staticFunc();

echo '<h2>toString()</h2>';
echo $obj;

function issetOrNot($var){
	if(isset($var)){
		echo $var;
	}else{
		echo 'Property not exists';
	}	
}

//Checking whether a objects field is set like so: isset($animal->height); Will invoke the __isset($name) function on that object.
echo '<h2>__isset()</h2>';
issetOrNot($abc);
issetOrNot($obj->sanjays);
issetOrNot(A::$static_var);
?>