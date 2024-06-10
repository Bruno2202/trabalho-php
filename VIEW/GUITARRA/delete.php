<?php 
    namespace VIEW\Guitarra;
    include_once __DIR__ . "../../../BLL/Guitarra.php"; 

    $id = $_GET['id'];

    $bllGuit = new \BLL\Guitarra(); 
    $result =  $bllGuit->Delete($id);  
  
    header("location: gerenciador.php");
?>