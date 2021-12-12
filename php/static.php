<?php 
//without class or oops concept we cannot use Static

class A{
	public static function abc(){
		echo "Hello I am static function.";
	}

	protected static function def(){
		echo "Protected static function";
	}

	private static function ijk(){
		echo 'Private static function';
	}

	static function __callStatic($funcName,$params){
		$clsName = __CLASS__ ;
		return $clsName::$funcName($params);
	}
}
A::abc();
echo '</br>--------------------------------------</br>';
A::def();
echo '</br>--------------------------------------</br>';
A::ijk();
?>