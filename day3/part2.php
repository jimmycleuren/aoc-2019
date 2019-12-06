<?php

list($input1, $input2) = explode("\r\n", file_get_contents("input.txt"));

$cable1 = explode(",", $input1);
$cable2 = explode(",", $input2);

//$cable1 = ['R8','U5','L5','D3'];
//$cable2 = ['U7','R6','D4','L4'];

$grid = [];
$intersections = [];

$distances1 = [];
$distances2 = [];

drawCable($grid, $intersections, $distances1, $cable1, 1);
drawCable($grid, $intersections, $distances2, $cable2, 2);

/*
for ($i = 20; $i >= 0; $i--) {
	for ($j = 0; $j < 20; $j++) {
		echo ($grid[$i][$j] ?? ".")." ";
	}
	echo "\n";
}
*/

$min = 10000000000000000000000;
foreach ($intersections as $intersection) {
	$temp = $distances1[$intersection[0]."-".$intersection[1]] + $distances2[$intersection[0]."-".$intersection[1]];
	if ($temp < $min && $temp > 0) {
		$min = $temp;
	}
}


var_dump($min);


function drawCable(&$grid, &$intersections, &$distances, $inputs, $value)
{
	$x = 0;
	$y = 0;
	$distance = 0;
	
	foreach ($inputs as $input) {
		$direction = $input[0];
		$val = substr($input, 1);
		switch ($direction) {
			case "U":
			    for($i = 0; $i <= $val; $i++) {
					if (!isset($grid[$x + $i])) $grid[$x + $i] = [];
					if(isset($grid[$x + $i][$y]) && $grid[$x + $i][$y] != $value) {
						$intersections[] = [$x + $i, $y];
					}
					$grid[$x + $i][$y] = $value;
					if (!isset($distances[($x + $i)."-".$y])) {
						$distances[($x + $i)."-".$y] = $distance + $i;
					}
				}
				$x += $val;
				$distance += $val;
				break;
			case "D":
			    for($i = 0; $i <= $val; $i++) {
					if (!isset($grid[$x - $i])) $grid[$x - $i] = [];
					if(isset($grid[$x - $i][$y]) && $grid[$x - $i][$y] != $value) {
						$intersections[] = [$x - $i, $y];
					}
					$grid[$x - $i][$y] = $value;
					if (!isset($distances[($x - $i)."-".$y])) {
						$distances[($x - $i)."-".$y] = $distance + $i;
					}
				}
				$x -= $val;
				$distance += $val;
				break;
			case "L":
			    for($i = 0; $i <= $val; $i++) {
					if (!isset($grid[$x])) $grid[$x] = [];
					if(isset($grid[$x][$y - $i]) && $grid[$x][$y - $i] != $value) {
						$intersections[] = [$x, $y - $i];
					}
					$grid[$x][$y - $i] = $value;
					if (!isset($distances[$x."-".($y - $i)])) {
						$distances[$x."-".($y - $i)] = $distance + $i;
					}
				}
				$y -= $val;
				$distance += $val;
				break;
			case "R":
			    for($i = 0; $i <= $val; $i++) {
					if (!isset($grid[$x])) $grid[$x] = [];
					if(isset($grid[$x][$y + $i]) && $grid[$x][$y + $i] != $value) {
						$intersections[] = [$x, $y + $i];
					}
					$grid[$x][$y + $i] = $value;
					if (!isset($distances[$x."-".($y + $i)])) {
						$distances[$x."-".($y + $i)] = $distance + $i;
					}
				}
				$y += $val;
				$distance += $val;
				break;
		}
	}
}