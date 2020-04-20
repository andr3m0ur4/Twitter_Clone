<?php 

	require_once './Bd.php';

	$bd = new Bd();
	$con = $bd -> conectar();

	$id_usuario = $_SESSION['id_usuario'];

	$sql = "SELECT COUNT(*) AS qtd_seguidores FROM usuarios_seguidores WHERE seguindo_id_usuario = $id_usuario";

	$resultado_id = mysqli_query($con, $sql);

	$qtd_seguidores = mysqli_fetch_assoc($resultado_id);
