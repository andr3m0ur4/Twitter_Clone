<?php session_start() ?>

<?php if (!($_SESSION)) header('Location: index.php?erro=1') ?>

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

		<script src="./js/procurar_pessoas.js"></script>
	
	</head>
	<body>

		<!-- Static navbar -->
		<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom mb-4 p-0">
			<div class="container">
				<a href="./home.php">
					<img src="./imagens/icone_twitter.png" class="navbar-brand">
				</a>

				<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto mt-2 mt-md-0">
						<li class="nav-item">
							<a class="nav-link" href="./home.php">Página inicial</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="./sair.php">Sair</a>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<div class="container mt-5">
			<div class="row">
				<div class="col-md-3">
					<div class="card bg-light">
						<div class="card-body">
							<h4><?= $_SESSION['usuario'] ?></h4>

							<hr>

							<div class="row">
								<div class="col-6 col-md-12 col-xl-5">
									TWEETS <br> 1
								</div>

								<div class="col-6 col-md-12 col-xl-7">
									SEGUIDORES <br> 1
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card bg-light">
						<div class="card-body">

							<form id="form_procurar_pessoas">
								<div class="input-group">
									<input type="text" class="form-control" id="txt_nome" placeholder="Quem você está procurando?" maxlength="140" name="txt_nome">
									<span class="input-group-append">
										<button class="btn btn-outline-secondary" id="btn_pesquisar" type="button">
											Pesquisar
										</button>
									</span>
								</div>
							</form>
							
						</div>
					</div>

					<div id="pessoas" class="list-group mt-4">
						
					</div>
				</div>

				<div class="col-md-3">
					<div class="card bg-light">
						<div class="card-body">
							
						</div>
					</div>
				</div>
			</div>

			<div class="clearfix"></div>

		</div>
	
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	</body>
</html>