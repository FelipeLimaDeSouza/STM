<?php

	class CadastrarUsuario{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/UsuarioModel.php';
            
            $this->model = new UsuarioModel(Conexao::getInstance());
            
        }

        public function validaCadastroController($dados){
        	
        	$nome = $dados['nome'];
        	$email = $dados['email'];
        	$senha = $dados['senha'];
        	$conf_senha = $dados['conf_senha'];
        	$tipo = $dados['tipo'];

        	if(($nome == "") || ($email == "") || ($senha == "") || ($conf_senha == "") || ($tipo == "")){

        		$array  = array('status' => '1');

	            echo json_encode($array);

        	}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        		
        		$array = array('status' => 2);

				echo json_encode($array);

        	}elseif ($senha != $conf_senha) {
        		
        		$array = array('status' => 0, 'mensagem' => 'As senhas não correspondem.');

				echo json_encode($array);

        	}else{

        		$valida_cad = $this->model->retornaUsuarioEmailDAO($email);

        		if($valida_cad == true){

	        		$retorna = $this->model->cadastrarUsuarioDAO($nome, $email, $senha, $tipo);

	        		if($retorna == true){

	        			$array = array('status' => 6, 'link' => 'home.php?pesquisa=');

						echo json_encode($array);

	        		}else{

	        			$array = array('status' => 0, 'mensagem' => 'Erro ao cadastrar');

						echo json_encode($array);

	        		}

        		}else{

        			$array = array('status' => 0, 'mensagem' => 'Email já cadastrado.');

					echo json_encode($array);

        		}

        	}

        }

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$session = new CadastrarUsuario;
	    
	    $session->validaCadastroController($_POST);

	}

?>