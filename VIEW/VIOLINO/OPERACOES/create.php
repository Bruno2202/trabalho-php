<?php
	include_once __DIR__ . '../../../../MODEL/Violino.php'; 
	include_once __DIR__ . '../../../../BLL/Violino.php';

	$violino = new \MODEL\Violino();

    $violino->setDescricao($_POST['descricao']);
    $violino->setModelo($_POST['modelo']);
    $violino->setMarca($_POST['marca']);
    $violino->setAno($_POST['ano']);
    $violino->setCor($_POST['cor']);
    $violino->setQtdeEstoque($_POST['qtdeEstoque']);
    $violino->setVlrVenda($_POST['vlrVenda']);

	$imagemTipo = $_FILES['imagem']['type'];
	$imagemConteudo = file_get_contents($_FILES['imagem']['tmp_name']);

	$violino->setImagem($imagemConteudo);
	$violino->setTipoImagem($imagemTipo);

	$bllViolino = new \BLL\Violino(); 
	$result = $bllViolino->Create($violino);

	if ($result->errorCode() === '00000') {
		header("location: ../gerenciador.php");
	}
	else echo $result->errorInfo();
?>