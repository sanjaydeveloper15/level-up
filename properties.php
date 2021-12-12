<?php
/**
 * With Properties
 * Static property can be call with :: only (static way) A::$var
 * Cannot get simple property as static way :: Always can get $obj = new A(); echo $obj->propertyName;
 * */
class A{
	public $sanjay = 10;
	protected $b = 100;
	private $c = 1000;

	public function __get($property){//come inside for protected/privata and undefined property
		echo '<br>__get<br>';
		if(!property_exists($this, $property)){//class,property
			return 'Property/Variable does not exists.';
		}
		echo 'SanjayGet.';
		return $this->$property;
	}

	public function __set($property,$value){
		echo '<br>SanjaySet.';
		$this->$property = $value;
	}

}

//Static Way
// echo A::$sanjay .'<br>';
// A::$sanjay = 20;
// echo A::$sanjay;

//Standard Way
$obj = new A();
echo $obj->sanjay.'<br>';//not going into __get() Public
$obj->sanjay = 20;
echo $obj->sanjay.'<br>';//not going into __get() Public

echo $obj->afsd;

//Get private and protected properties outside class (Login Is Just Write Down Getter, That's It)
echo $obj->b.'<br>';
echo $obj->c.'<br>';

$obj->b = 'Hundred <br>';
echo $obj->b.'<br>';

?>