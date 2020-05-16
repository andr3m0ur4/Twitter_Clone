<?php 

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;

	class AppController extends Action
	{
		public function timeline()
		{
			$this->validarAutentificacao();

			// recuperação dos tweets
			$tweet = Container::getModel('Tweet');

			$tweet->__set('id_usuario', $_SESSION['id']);

			$tweets = $tweet->getAll();

			$this->view->tweets = $tweets;

			$usuario = Container::getModel('Usuario');
			$usuario->__set('id', $_SESSION['id']);

			$this->view->info_usuario = $usuario->getInfoUsuario();
			$this->view->total_tweets = $usuario->getTotalTweets();
			$this->view->total_seguindo = $usuario->getTotalSeguindo();
			$this->view->total_seguidores = $usuario->getTotalSeguidores();

			$this->render('timeline');
		}

		public function tweet()
		{
			$this->validarAutentificacao();

			$tweet = Container::getModel('Tweet');

			$tweet->__set('tweet', $_POST['tweet']);
			$tweet->__set('id_usuario', $_SESSION['id']);

			$tweet->salvar();

			header('Location: /timeline');
		}

		public function validarAutentificacao()
		{
			session_start();

			if (
				!isset($_SESSION['id']) || $_SESSION['id'] == '' || 
				!isset($_SESSION['nome']) || $_SESSION['nome'] == ''
			) {
				header('Location: /?login=erro');
			}
		}

		public function quemSeguir()
		{
			$this->validarAutentificacao();

			$pesquisar_por = $_GET['pesquisar_por'] ?? '';

			$usuarios = [];

			$usuario = Container::getModel('Usuario');
			$usuario->__set('id', $_SESSION['id']);

			if ($pesquisar_por != '') {
				$usuario->__set('nome', $pesquisar_por);
				$usuarios = $usuario->getAll();
			}

			$this->view->usuarios = $usuarios;

			$this->view->info_usuario = $usuario->getInfoUsuario();
			$this->view->total_tweets = $usuario->getTotalTweets();
			$this->view->total_seguindo = $usuario->getTotalSeguindo();
			$this->view->total_seguidores = $usuario->getTotalSeguidores();

			$this->render('quem_seguir');
		}

		public function acao()
		{
			$this->validarAutentificacao();

			$acao = $_GET['acao'] ?? '';
			$id_usuario_seguindo = $_GET['id_usuario'] ?? '';

			$usuario_seguidor = Container::getModel('UsuarioSeguidor');
			$usuario_seguidor->__set('id_usuario', $_SESSION['id']);
			$usuario_seguidor->__set('id_usuario_seguindo', $id_usuario_seguindo);

			if ($acao == 'seguir') {
				$usuario_seguidor->seguirUsuario();
			} else if ($acao == 'deixar_de_seguir') {
				$usuario_seguidor->deixarSeguirUsuario();
			}

			header('Location: /quem_seguir');
		}

		public function removerTweet()
		{
			$this->validarAutentificacao();

			$id_tweet = $_GET['id_tweet'] ?? '';

			$tweet = Container::getModel('Tweet');
			$tweet->__set('id', $id_tweet);
			$tweet->excluir();

			header('Location: /timeline');
		}
	}
