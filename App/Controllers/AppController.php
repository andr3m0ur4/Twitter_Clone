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

			if ($pesquisar_por != '') {
				
				$usuario = Container::getModel('Usuario');
				$usuario->__set('nome', $pesquisar_por);
				$usuarios = $usuario->getAll();
			}

			$this->view->usuarios = $usuarios;

			$this->render('quem_seguir');
		}
	}
