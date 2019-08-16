<?php

$completo = array_map('str_getcsv', file('BASE-ALLCOM-2019.csv'));
file_put_contents('chips_encontrados.csv', "");
file_put_contents('numero_encontrados.csv', "");
//print_r($completo);

$chips = array_map('str_getcsv', file('SOMENTE CHIPS AGOSTO.csv'));
//print_r($chips);
$total = count($chips);
echo "Total de Chips ".$total."\n";
echo "==========================\n";
$x = 0;
foreach ($chips as $chip) {
	print_r($chip[0]."\n");
	$atual = "";
	if(strlen($chip[0]) > 15){
		foreach ($completo as $linha) {
			if($chip[0] == str_replace("'", "",$linha[9])){
				print_r($linha[9]."-");
				//echo "*";
				$encontrado[str_replace("'", "",$linha[9])][]=str_replace("'", "",$linha[9]);
				$chips_encontrados[] = str_replace("'", "",$linha[9]);
				$atual = str_replace("'", "",$linha[9]);
				
				file_put_contents('chips_encontrados.csv', str_replace("'", "",$linha[9]).";\n" , FILE_APPEND);
			}
		}
	}else{
		foreach ($completo as $linha) {
			//echo $linha[2];
			if(str_replace("-", "",str_replace(")", "",str_replace("(", "",str_replace(" ", "",$chip[0])))) == str_replace('55', '',str_replace("'", "",$linha[2]))){
				print_r($linha[2]."-");
				$encontrado[str_replace('55', '',str_replace("'", "",$linha[2]))][]=str_replace('55', '',str_replace("'", "",$linha[2]));
				$numeros_encontrados[] = str_replace("'", "",$linha[2]);
				$atual = str_replace("'", "",$linha[2]);
				
				//echo "*";
				file_put_contents('numero_encontrados.csv', str_replace("'", "",$linha[2]).";\n" , FILE_APPEND);
			}
		}
	}
	if($atual ==""){
		$n_encontrados[str_replace(" ", "",$chip[0])] = str_replace(" ", "",$chip[0]);
	}
	print_r("===============\n");
	//echo $x . "\n";
}

echo "foram encontrados ".count($encontrado); 
echo " no total \n nao foram encontrados ".count($n_encontrados); 
echo " \nforam encontrados ".count($chips_encontrados); 
echo "por email \nforam encontrados ".count($numeros_encontrados)." por numero"; 

