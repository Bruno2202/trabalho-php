<?php

	include_once __DIR__ . '../../../../MODEL/Guitarra.php'; 
	include_once __DIR__ . '../../../../BLL/Guitarra.php';

	$guit = new \MODEL\Guitarra();

	
    $guit->setDescricao($_POST['descricao']);
    $guit->setModelo($_POST['modelo']);
    $guit->setMarca($_POST['marca']);
    $guit->setAno($_POST['ano']);
    $guit->setNumCordas($_POST['numCordas']);
    $guit->setCor($_POST['cor']);
    $guit->setQtdeEstoque($_POST['qtdeEstoque']);
    $guit->setVlrVenda($_POST['vlrVenda']);

	// Processamento da imagem
	$imagemTipo = $_FILES['imagem']['type'];
	$imagemConteudo = file_get_contents($_FILES['imagem']['tmp_name']);

	$guit->setImagem($imagemConteudo);
	$guit->setTipoImagem($imagemTipo);

	$bllGuit = new \BLL\Guitarra(); 

	$result = $bllGuit->Create($guit);

	if ($result->errorCode() === '00000') {
		header("location: ../gerenciador.php");
	}
	
	else echo $result->errorInfo();
?>