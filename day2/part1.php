<?php

$program = explode(",", file_get_contents("input.txt"));

$program[1] = 12;
$program[2] = 2;

$counter = 0;

while ($program[$counter] != 99) {
	$opcode = $program[$counter];
	
	switch ($opcode) {
		case 1:
			$program[$program[$counter + 3]] = $program[$program[$counter + 1]] + $program[$program[$counter + 2]];
			break;
		case 2:
			$program[$program[$counter + 3]] = $program[$program[$counter + 1]]  * $program[$program[$counter + 2]];
			break;
	}
	
	$counter += 4;
}

echo $program[0]."\n";