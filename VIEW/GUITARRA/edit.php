<?php 
    namespace VIEW\Guitarra;
    include_once __DIR__ . '../../../MODEL/Guitarra.php'; 
    include_once __DIR__ . '../../../BLL/Guitarra.php'; 

    $guitarra = new \MODEL\Guitarra();

    $guitarra->setId($_POST['id']);
    $guitarra->setDescricao($_POST['descricao']);
    $guitarra->setModelo($_POST['modelo']);
    $guitarra->setMarca($_POST['marca']);
    $guitarra->setAno($_POST['ano']);
    $guitarra->setNumCordas($_POST['numCordas']);
    $guitarra->setCor($_POST['cor']);

    $bllGuit = new \BLL\Guitarra(); 
    $result =  $bllGuit->Update($guitarra);  

  
    header("location: gerenciador.php");
?>