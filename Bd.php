<?php 

	class Bd
	{
		private $host = 'localhost';
		private $user = 'root';
		private $password = '';
		private $database = 'twitter_clone';

		public function conectar()
		{
			$con = mysqli_connect($this -> host, $this -> user, $this -> password, $this -> database) 
				OR die('Erro ao conectar ao servidor: ' . mysqli_error($con));
			
			mysqli_set_charset($con, "utf8");

			return $con;
		}
	}
