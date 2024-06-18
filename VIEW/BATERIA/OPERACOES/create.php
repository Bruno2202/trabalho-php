<?php
	include_once __DIR__ . '../../../../MODEL/Bateria.php'; 
	include_once __DIR__ . '../../../../BLL/Bateria.php';

	$bateria = new \MODEL\Bateria();

    $bateria->setDescricao($_POST['descricao']);
    $bateria->setModelo($_POST['modelo']);
    $bateria->setMarca($_POST['marca']);
    $bateria->setAno($_POST['ano']);
    $bateria->setNumPecas($_POST['numPecas']);
    $bateria->setCor($_POST['cor']);
    $bateria->setQtdeEstoque($_POST['qtdeEstoque']);
    $bateria->setVlrVenda($_POST['vlrVenda']);

	$bllBateria = new \BLL\Bateria(); 
	
	$result = $bllBateria->Create($bateria);

	if ($result->errorCode() === '00000') {
		header("location: ../gerenciador.php");
	}
	else echo $result->errorInfo();
?>