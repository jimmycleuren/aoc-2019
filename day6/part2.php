<?php

$records = explode("\r\n", file_get_contents("input.txt"));

$tree = [];

foreach ($records as $record) {
	list($parent, $child) = explode(")", $record);
	$tree[$child] = $parent;
}

$path = [];

$current = "YOU";
while($current != "COM") {
	$path[] = $current;
	$current = $tree[$current];
}

$count = 0;
$current = "SAN";
while($current != "COM") {
	if (in_array($current, $path)) {
		$intersect = $current;
		break;
	}
	$current = $tree[$current];
	$count++;
}

$current = "YOU";
while($current != $intersect) {
	$current = $tree[$current];
	$count++;
}

var_dump($count - 2);