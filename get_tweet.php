<?php 

	session_start();

	if (!($_SESSION)) {
		header('Location: index.php?erro=1');
	}

	require_once './Bd.php';

	$id_usuario = $_SESSION['id_usuario'];

	$db = new Bd();
	$con = $db -> conectar();

	$sql = "
		SELECT 
			t.id_tweet, 
			t.id_usuario, 
			t.tweet, 
			DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada,
			u.usuario
		FROM tweet AS t
		JOIN usuarios AS u
		ON (t.id_usuario = u.id)
		WHERE id_usuario = $id_usuario 
		ORDER BY data_inclusao DESC
	";

	$resultado_id = mysqli_query($con, $sql);
	
	if ($resultado_id) {
		$tweets = [];

		while ($tweet = mysqli_fetch_assoc($resultado_id)) {
			$tweets[] = $tweet;
		}

		echo json_encode($tweets);

	} else {
		echo 'Erro na execução da consulta.';
	}
