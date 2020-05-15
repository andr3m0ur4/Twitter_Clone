<?php 

	session_start();

	if (!($_SESSION)) {
		header('Location: index.php?erro=1');
	}

	require_once './Bd.php';

	$id_usuario = $_SESSION['id_usuario'];
	$tweet = $_POST['txt_tweet'];

	$db = new Bd();
	$con = $db -> conectar();

	$sql = "INSERT INTO tweet(id_usuario, tweet) VALUES('$id_usuario', '$tweet')";

	if (!(mysqli_query($con, $sql))) {
		echo 'Erro ao tentar inserir o tweet';
	}
