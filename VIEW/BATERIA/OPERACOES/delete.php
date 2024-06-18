<?php 
    namespace VIEW\Bateria;
    include_once __DIR__ . "../../../../BLL/Bateria.php"; 

    $id = $_GET['id'];

    $bllBateria = new \BLL\Bateria(); 
    $result =  $bllBateria->Delete($id);  
  
    header("location: ../gerenciador.php");
?>