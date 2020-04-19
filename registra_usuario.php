<?php 

	require_once './Bd.php';

	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$db = new Bd();
	$con = $db -> conectar();

	$sql = "INSERT INTO usuarios(usuario, email, senha) VALUES('$usuario', '$email', '$senha')";

	if (mysqli_query($con, $sql)) {
		echo 'Usuário foi registrado com sucesso!';
	} else {
		echo 'Erro ao tentar inserir o registro';
	}
