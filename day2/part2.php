<?php

$initialProgram = explode(",", file_get_contents("input.txt"));

for ($i = 0; $i < 100; $i++) {
	for ($j = 0; $j < 100; $j++) {
		
		$program = $initialProgram;
		$program[1] = $i;
		$program[2] = $j;

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

		if($program[0] == 19690720) {
			var_dump($i, $j);
			exit();
		}
	}
}