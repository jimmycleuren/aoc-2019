<?php

$records = explode("\r\n", file_get_contents("input.txt"));

$tree = [];

foreach ($records as $record) {
	list($parent, $child) = explode(")", $record);
	$tree[$child] = $parent;
}

$count = 0;
foreach ($tree as $entry => $parent) {
	$current = $entry;
	while($current != "COM") {
		$current = $tree[$current];
		$count++;
	}
}

var_dump($count);