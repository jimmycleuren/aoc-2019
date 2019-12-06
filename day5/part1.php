<?php

$program = explode(",", file_get_contents("input.txt"));

$input = 1;

$counter = 0;

while ($program[$counter] != 99) {
	$code = $program[$counter];
	$opcode = $code % 100;
	$mode1 = ($code % 1000 - $code % 100) / 100;
	$mode2 = ($code % 10000 - $code % 1000) / 1000;
	$mode3 = ($code % 100000 - $code % 10000) / 10000;
	
	switch ($opcode) {
		case 1:
			$program[getValue($mode3, $counter + 3, $program)] = $program[getValue($mode1, $counter + 1, $program)] + $program[getValue($mode2, $counter + 2, $program)];
			$counter += 4;
			break;
		case 2:
			$program[getValue($mode3, $counter + 3, $program)] = $program[getValue($mode1, $counter + 1, $program)]  * $program[getValue($mode2, $counter + 2, $program)];
			$counter += 4;
			break;
		case 3:
			$program[$program[$counter + 1]] = $input;
			$counter += 2;
			break;
		case 4:
			var_dump($program[getValue($mode1, $counter + 1, $program)]);
			$counter += 2;
			break;
	}
}

function getValue($mode, $param, $program)
{
	if ($mode == 0) {
		return $program[$param];
	}
	if ($mode == 1) {
		return $param;
	}
}