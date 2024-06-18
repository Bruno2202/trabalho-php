<?php 
    namespace VIEW\Piano;
    include_once __DIR__ . "../../../../BLL/Piano.php"; 

    $id = $_GET['id'];

    $bllPiano = new \BLL\Piano(); 
    $result =  $bllPiano->Delete($id);  
  
    header("location: ../gerenciador.php");
?>