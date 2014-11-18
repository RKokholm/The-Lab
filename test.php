<?php

$test = 'hej';

$test1 = 5;


if ($test == 'hej'){
	echo 1;
} else {
	echo 2;
}

$array = array(
	1, 
	'1', 
	array(
		1, 
		2, 
		array(
			'navn'=>'hej',
			'efternavn'=> array(1, 2)
		)	
	)
);

$array[][]['efternavn'] = array(1, 2);

echo $array[2][2]['navn'];

echo $test.' '.$test1;