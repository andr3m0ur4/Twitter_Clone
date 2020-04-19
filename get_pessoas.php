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

	$sql = "SELECT * FROM usuarios WHERE usuario LIKE '%$nome%' AND id <> $id_usuario";

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
