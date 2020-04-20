<?php 

	session_start();

	if (!($_SESSION)) {
		header('Location: index.php?erro=1');
	}

	require_once './Bd.php';

	$id_usuario = $_SESSION['id_usuario'];
	$nome = $_POST['txt_nome'];

	$db = new Bd();
	$con = $db -> conectar();

	$sql = "
		SELECT u.*, us.id_usuario_seguidor
		FROM usuarios AS u
		LEFT JOIN usuarios_seguidores AS us
		ON (u.id = us.seguindo_id_usuario AND us.id_usuario = $id_usuario)
		WHERE u.usuario LIKE '%$nome%' AND u.id <> $id_usuario
	";

	$resultado_id = mysqli_query($con, $sql);
	
	if ($resultado_id) {
		$pessoas = [];

		while ($pessoa = mysqli_fetch_assoc($resultado_id)) {
			$pessoas[] = $pessoa;
		}

		echo json_encode($pessoas);

	} else {
		echo 'Erro na execução da consulta.';
	}
