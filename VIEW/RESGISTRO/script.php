<?php 
	include_once __DIR__ . '../../../DAL/Conexao.php';

	$name = trim($_POST['name']); 
	$email = trim($_POST['email']); 
	$password = trim($_POST['password']); 
	$password = md5($password);

	try {
		$con = DAL\Conexao::conectar();

		$sql = "INSERT INTO usuarios (NOME, EMAIL, SENHA) 
				VALUES (:name, :email, :password)";

		$query = $con->prepare($sql);
		$query->bindParam(':name', $name);
		$query->bindParam(':email', $email);
		$query->bindParam(':password', $password);

		if ($query->execute()) {
			session_start();
			$_SESSION['login'] = $email;
			header("Location: ../adm.php");
		} else {
			header("Location: ../home.php");
		}

		DAL\Conexao::desconectar();
	} catch (PDOException $e) {
		echo "Erro: " . $e->getMessage();
	}
?>
