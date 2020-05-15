<?php 

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;

	class IndexController extends Action
	{
		public function index()
		{
			$this->view->login = $_GET['login'] ?? '';
			
			$this->render('index');
		}

		public function inscreverse()
		{
			$this->view->usuario = [
				'nome' => '',
				'email' => '',
				'senha' => ''
			];

			$this->view->erro_cadastro = false;

			$this->render('inscreverse');
		}

		public function registrar()
		{
			// receber os dados do formulário e definir os mesmos no respectivo objeto
			$usuario = Container::getModel('Usuario');

			$usuario->__set('nome', $_POST['nome']);
			$usuario->__set('email', $_POST['email']);
			$usuario->__set('senha', $_POST['senha']);

			if ($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0) {

				// sucesso
				$usuario->__set('senha', md5($_POST['senha']));
				$usuario->salvar();

				$this->render('cadastro');

			} else {
				// erro
				$this->view->usuario = [
					'nome' => $_POST['nome'],
					'email' => $_POST['email'],
					'senha' => $_POST['senha']
				];

				$this->view->erro_cadastro = true;

				$this->render('inscreverse');
			}
		}
	}
