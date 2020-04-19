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
	
		<script src="./js/app.js"></script>
	</head>
	<body>

		<!-- Static navbar -->
		<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom mb-4 p-0">
			<div class="container">
				<img class="navbar-brand" src="./imagens/icone_twitter.png">

				<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto mt-2 mt-md-0">
						<li class="nav-item">
							<a class="nav-link" href="inscrevase.php">Inscrever-se</a>
						</li>
						<li class="nav-item <?= isset($_GET['erro']) ? 'show' : '' ?>">
							<a class="nav-link" id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button">
								Entrar
							</a>
							
							<ul class="dropdown-menu dropdown-menu-right <?= isset($_GET['erro']) ? 'show' : '' ?>" aria-labelledby="entrar">
								<div class="col-md-12 mb-3">
									<p>Você possui uma conta?</p>

									<form method="post" action="validar_acesso.php" id="formLogin">
										<div class="form-group">
											<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário">
										</div>
						
										<div class="form-group">
											<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha">
										</div>
						
										<button type="buttom" class="btn btn-primary" id="btn_login">
											Entrar
										</button>

										<?php if (isset($_GET['erro'])) : ?>
											<p class="mt-3 text-danger">Usuário e ou senha inválido(s)</p>
										<?php endif ?>
						
									</form>
								</div>
							</ul>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<div class="container">

			<!-- Main component for a primary marketing message or call to action -->
			<div class="jumbotron">
				<h1 class="display-4 font-weight-bold">Bem vindo ao Twitter Clone</h1>
				<p>Veja o que está acontecendo agora...</p>
			</div>

			<div class="clearfix"></div>
		</div>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	</body>
</html>