<?php 
    namespace VIEW\Vioino;
    include_once __DIR__ . "../../../../BLL/Violino.php"; 

    $id = $_GET['id'];

    $bllViolino = new \BLL\Violino(); 
    $result =  $bllViolino->Delete($id);  
  
    header("location: ../gerenciador.php");
?>