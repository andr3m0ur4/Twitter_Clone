<?php 

	require_once './Bd.php';

	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$db = new Bd();
	$con = $db -> conectar();

	$usuario_existe = false;
	$email_existe = false;

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

	if ($resultado_id = mysqli_query($con, $sql)) {
		
		$dados = mysqli_fetch_assoc($resultado_id);
		
		if (isset($dados['usuario'])) {
			$usuario_existe = true;
		}
	} else {
		echo 'Erro ao tentar localizar o registro de usuário no banco de dados';
	}

	$sql = "SELECT * FROM usuarios WHERE email = '$email'";

	if ($resultado_id = mysqli_query($con, $sql)) {
		
		$dados = mysqli_fetch_assoc($resultado_id);
		
		if (isset($dados['usuario'])) {
			$email_existe = true;
		}
	} else {
		echo 'Erro ao tentar localizar o registro de e-mail no banco de dados';
	}

	if ($usuario_existe || $email_existe) {

		$retorno_get = '';

		if ($usuario_existe) {
			$retorno_get .= 'erro_usuario=1&';
		}

		if ($email_existe) {
			$retorno_get .= 'erro_email=1';
		}

		header("Location: ./inscrevase.php?$retorno_get");
		die();
	}

	$sql = "INSERT INTO usuarios(usuario, email, senha) VALUES('$usuario', '$email', '$senha')";

	if (mysqli_query($con, $sql)) {
		echo 'Usuário foi registrado com sucesso!';
	} else {
		echo 'Erro ao tentar inserir o registro';
	}
