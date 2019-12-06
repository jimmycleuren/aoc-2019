<?php

$inputs = explode("\r\n", file_get_contents("input.txt"));

$totalFuel = 0;
foreach ($inputs as $mass) {
	$totalFuel += calculateFuel($mass);
}

echo $totalFuel."\n";

function calculateFuel($mass) {
	$fuel = floor($mass / 3) - 2;
	if ($fuel < 0) {
		return 0;
	}
	return $fuel + calculateFuel($fuel);
}