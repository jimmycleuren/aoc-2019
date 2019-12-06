<?php

$inputs = explode("\r\n", file_get_contents("input.txt"));

$total = 0;
foreach ($inputs as $mass) {
	$fuel = floor($mass / 3) - 2;
	$total += $fuel;
}

echo $total."\n";