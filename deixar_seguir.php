<?php 

	session_start();

	if (!($_SESSION)) {
		header('Location: index.php?erro=1');
	}

	require_once './Bd.php';

	$id_usuario = $_SESSION['id_usuario'];
	$deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

	$db = new Bd();
	$con = $db -> conectar();

	$sql = "
		DELETE FROM usuarios_seguidores 
		WHERE id_usuario = $id_usuario AND seguindo_id_usuario = $deixar_seguir_id_usuario
	";

	if (!(mysqli_query($con, $sql))) {
		echo 'Erro ao tentar deixar de seguir usuário';
	}
