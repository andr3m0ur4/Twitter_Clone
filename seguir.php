<?php 

	session_start();

	if (!($_SESSION)) {
		header('Location: index.php?erro=1');
	}

	require_once './Bd.php';

	$id_usuario = $_SESSION['id_usuario'];
	$seguir_id_usuario = $_POST['seguir_id_usuario'];

	$db = new Bd();
	$con = $db -> conectar();

	$sql = "
		INSERT INTO usuarios_seguidores (id_usuario, seguindo_id_usuario) 
		VALUES ($id_usuario, $seguir_id_usuario)
	";

	if (!(mysqli_query($con, $sql))) {
		echo 'Erro ao tentar seguir usuário';
	}
