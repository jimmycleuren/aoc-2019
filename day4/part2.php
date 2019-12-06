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
	$double = 1;
	$doubleOk = false;
	for ($i = 0; $i < strlen($string); $i++) {
		if($string[$i] < $prev) {
			return false;
		}
		if($string[$i] == $prev) {
			$double++;
		} else {
			if ($double == 2) {
				$doubleOk = true;
			}
			$double = 1;
		}
		
		$prev = $string[$i];
	}
	
	
	
	return $double == 2 || $doubleOk;
}