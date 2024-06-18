<?php 
    namespace VIEW\Violino;
    include_once __DIR__ . '../../../../MODEL/Violino.php'; 
    include_once __DIR__ . '../../../../BLL/Violino.php'; 

    $violino = new \MODEL\Violino();

    $violino->setId($_POST['id']);
    $violino->setDescricao($_POST['descricao']);
    $violino->setModelo($_POST['modelo']);
    $violino->setMarca($_POST['marca']);
    $violino->setAno($_POST['ano']);
    $violino->setCor($_POST['cor']);

    $bllViolino = new \BLL\Violino(); 
    $result =  $bllViolino->Update($violino);  

    header("location: ../gerenciador.php");
?>