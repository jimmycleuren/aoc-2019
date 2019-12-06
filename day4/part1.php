<?php

$total = 0;

for ($i = 138307; $i <= 654504; $i++) {
	if (isValid($i)) {
		$total++;
	}
}

var_dump($total);

function isValid($number) {
	$string = "" . $number;
	
	$prev = 0;
	$double = false;
	for ($i = 0; $i < strlen($string); $i++) {
		if($string[$i] < $prev) {
			return false;
		}
		if($string[$i] == $prev) {
			$double = true;
		}
		
		$prev = $string[$i];
	}
	
	return $double;
}