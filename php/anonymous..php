<?php

	$abc = 1;
	$anonymous = function() use($abc) {
		echo 'Hello Anonymous Function. '. $abc;
	};

	$anonymous();


?>