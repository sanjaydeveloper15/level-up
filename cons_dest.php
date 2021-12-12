<?php

/**
 * 
 * 
 * 
 * 
 */

class A{
	public function __construct(){
		echo 'I am Constuctor';
	}

	public function __destruct(){
		echo '<br> I am destructor';
	}

}

$obj = new A();

?>