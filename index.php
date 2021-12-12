<h1>Level Up</h1>

<?php
	 class A{
		public function pubFunc(){
			echo 1;
		}
	}


	//$obj = new A();
	A::pubFunc();
	//$obj->staticFunc();
	//A::prvtFuncs();


	class X{
		public function p(){
			return 1;
		}

		protected function y(){
			return 2;
		}

		private function z(){
			return 3;
		}
	}

	//$xObj = new X();
	//echo $xObj->x();
	X::p();
	X::y();


?>