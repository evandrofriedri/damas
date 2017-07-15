<?php




	$tabuleiro = '[[" ","B"," ","B"," ","B"," ","B"],["B"," ","B"," ","B"," ","B"," "],[" ","B"," ","B"," ","B"," ","B"],[" "," "," "," "," "," "," "," "],[" "," "," "," "," "," "," "," "],["P"," ","P"," ","P"," ","P"," "],[" ","P"," ","P"," ","P"," ","P"],["P"," ","P"," ","P"," ","P"," "]]';
	$tabuleiro = json_decode($tabuleiro, true);

	include 'validar_movimentacao.php';

	$test_posicao_valida_1 = posicao_valida('00', '01', $tabuleiro);
	if ($test_posicao_valida_1 != false) {
		echo "Erro no teste! 00 e 01 deveriam dar FALSE";
	}

	$test_posicao_valida_2 = posicao_valida('01', '12', $tabuleiro);
	if ($test_posicao_valida_2 != true) {
		echo "Erro no teste! 01 e 12 deveriam dar TRUE";
	}	

	$test_movimentacao_diagnonal_1 = movimentacao_diagonal_frente('00', '01', $tabuleiro);
	if($test_movimentacao_diagnonal_1 != false){
		echo "Erro no teste! 00 e 01 deveriam dar FALSE";
	}

	$test_movimentacao_diagnonal_2 = movimentacao_diagonal_frente('01', '12', $tabuleiro);
	if($test_movimentacao_diagnonal_2 != true){
		echo "Erro no teste! 01 e 12 deveriam dar TRUE";
	}

?>