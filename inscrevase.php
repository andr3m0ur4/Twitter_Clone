<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">

		<title>Twitter Clone</title>

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	</head>
	<body>

		<!-- Static navbar -->
		<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom mb-4 p-0">
			<div class="container">
				<img src="./imagens/icone_twitter.png" class="navbar-brand">

				<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto mt-2 mt-md-0">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Voltar para Home</a>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<div class="container mt-5">
			<div class="row">
				<div class="col-md-4 m-auto">
					<h3>Inscreva-se já.</h3>
					
					<form class="mt-4" method="post" action="registra_usuario.php" id="formCadastrarse">
						<div class="form-group">
							<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
							<?php if (isset($_GET['erro_usuario'])) : ?>
								<p class="text-danger mt-1">Usuário já cadastrado</p>
							<?php endif ?>
						</div>

						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
							<?php if (isset($_GET['erro_email'])) : ?>
								<p class="text-danger mt-1">E-mail já cadastrado</p>
							<?php endif ?>
						</div>
						
						<div class="form-group">
							<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
						</div>
						
						<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
					</form>
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>
	
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	</body>
</html>