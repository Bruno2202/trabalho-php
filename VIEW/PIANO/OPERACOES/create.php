<?php
	include_once __DIR__ . '../../../../MODEL/Piano.php'; 
	include_once __DIR__ . '../../../../BLL/Piano.php';

	$piano = new \MODEL\Piano();

    $piano->setDescricao($_POST['descricao']);
    $piano->setModelo($_POST['modelo']);
    $piano->setMarca($_POST['marca']);
    $piano->setAno($_POST['ano']);
    $piano->setNumTeclas($_POST['numTeclas']);
    $piano->setCor($_POST['cor']);
    $piano->setQtdeEstoque($_POST['qtdeEstoque']);
    $piano->setVlrVenda($_POST['vlrVenda']);

	$bllPiano = new \BLL\Piano(); 
	
	$result = $bllPiano->Create($piano);

	if ($result->errorCode() === '00000') {
		header("location: ../gerenciador.php");
	}
	else echo $result->errorInfo();
?>