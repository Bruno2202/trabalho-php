<?php 
    namespace VIEW\Piano;
    include_once __DIR__ . '../../../../MODEL/Piano.php'; 
    include_once __DIR__ . '../../../../BLL/Piano.php'; 

    $piano = new \MODEL\Piano();

    $piano->setId($_POST['id']);
    $piano->setDescricao($_POST['descricao']);
    $piano->setModelo($_POST['modelo']);
    $piano->setMarca($_POST['marca']);
    $piano->setAno($_POST['ano']);
    $piano->setNumTeclas($_POST['numTeclas']);
    $piano->setCor($_POST['cor']);

    $bllPiano = new \BLL\Piano(); 
    $result =  $bllPiano->Update($piano);  

    header("location: ../gerenciador.php");
?>