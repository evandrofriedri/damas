<?php

function validar_movimentacao($origem, $destino, $array)
{
	if (
		posicao_existente($origem, $destino, $array) &&
		posicao_vazia($origem, $destino, $array) &&
		posicao_valida($origem, $destino, $array) &&
		movimentacao_diagonal_frente($origem, $destino, $array)
	){
		return true;
	}

	return false;
}

function posicao_existente($origem, $destino, $array)
{
	if(! isset($array[$origem[0]][$origem[1]])){
		return false;
	}
	if(! isset($array[$destino[0]][$destino[1]])){
		return false;
	}
	return true;
}

function posicao_vazia($origem, $destino, $array)
{
	if(posicao_existente($origem, $destino, $array)){
		if ($array[$origem[0]][$origem[1]] != " ") {
			return false;
		}
		if ($array[$destino[0]][$destino[1]] == " ") {
			return false;
		}
		return false;
	} else {
		return false;
	}

	return true;
}

function posicao_valida($origem, $destino, $array)
{
	$posicoes_invalidas = array(
		"00", "02", "04", "06",
		"11", "13", "15", "17",
		"20", "22", "24", "26",
		"31", "33", "35", "37",
		"40", "42", "44", "46",
		"51", "53", "55", "57",
		"60", "62", "64", "66",
		"71", "73", "75", "77"
	);

	if (
		in_array($origem, $posicoes_invalidas) ||
		in_array($destino, $posicoes_invalidas)
	){
		return false;
	}
	return true;
}

function movimentacao_diagonal_frente($origem, $destino, $array)
{
	if(! posicao_valida($origem, $destino, $array)) {
		return false;
	}

	$frente = 1;
	if ($array[$origem[0]][$origem[1]] == "P") {
		$frente = -1;
	}

	if (! ($origem[1] == $destino[1]+1 OR $origem[1] == $destino[1]-1) ) {
		return false;
	}

	if (! ($origem[0] == $destino[0]+$frente OR $origem[0] == $destino[0]-$frente) ) {
		return false;
	}	

	return true;
}

?>