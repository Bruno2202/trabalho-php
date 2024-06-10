<?php 
   include_once __DIR__ . '../../../DAL/Conexao.php';

    $email = trim($_POST['email']); 
    $passowrd = trim($_POST['password']); 

   $sql = "Select * from USUARIOS where email= ?;";
   $con = DAL\Conexao::conectar(); 
   $query = $con->prepare($sql);
   $query->execute ([$email]);
   $linha = $query->fetch(\PDO::FETCH_ASSOC);
   DAL\Conexao::desconectar(); 

    if (md5($passowrd) == $linha['SENHA']) {
            session_start();
            $_SESSION['login'] = $email;
            header("location:../adm.php");
    } else header("location:../home.php");
?>