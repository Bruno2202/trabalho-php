<?php 
    namespace VIEW\Bateria;
    include_once __DIR__ . '../../../../MODEL/Bateria.php'; 
    include_once __DIR__ . '../../../../BLL/Bateria.php'; 

    $bateria = new \MODEL\Bateria();

    $bateria->setId($_POST['id']);
    $bateria->setDescricao($_POST['descricao']);
    $bateria->setModelo($_POST['modelo']);
    $bateria->setMarca($_POST['marca']);
    $bateria->setAno($_POST['ano']);
    $bateria->setNumPecas($_POST['numPecas']);
    $bateria->setCor($_POST['cor']);

    $bllBateria = new \BLL\Bateria(); 
    $result =  $bllBateria->Update($bateria);  

    header("location: ../gerenciador.php");
?>