<?php

$chips = array_map('str_getcsv', file('SOMENTE CHIPS AGOSTO.csv'));
$completo = array_map('str_getcsv', file('BASE-ALLCOM-2019.csv'));

function limpa($texto){
	return preg_replace("/[^0-9]/", "", $texto );
}

$total = count($chips);
$imei = array();
$numero = array();
$im = 0;
$nu = 0;

foreach ($chips as $chip) {
	$chip_limpo = limpa($chip[0]);
	if(strlen($chip_limpo) > 12){
		foreach ($completo as $numero) {
			if($chip_limpo == limpa($numero[9])){
				//echo "encontrado ".$chip_limpo ,limpa($numero[9]);
				$imei[] = $chip_limpo;
				$im++;
			}
		}
	}else{
		foreach ($completo as $numero) {
			if($chip_limpo == str_replace("55", "",limpa($numero[2]))){
				//echo "encontrado ".$chip_limpo ,limpa($numero[2]);
				$numero[] = $chip_limpo;
				$nu++;
			}
		}
	}
}

//echo "imei ".count($imei);
echo "imei ".$im;
echo "\n";
//echo "numero".count($numero);
echo "numero ".$nu;