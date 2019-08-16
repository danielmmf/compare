<?php

$chips = array_map('str_getcsv', file('amostra.csv'));

function limpa($texto){
	return preg_replace("/[^0-9]/", "", $texto );
}

$total = count($chips);

foreach ($chips as $chip) {
	print_r(limpa($chip[0]));
}