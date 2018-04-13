<?php

	class Session{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/UsuarioModel.php';
            
            $this->model = new UsuarioModel(Conexao::getInstance());
            
        }

        public function validaSessionController($dados){

        	$email = $dados['email'];
            $senha = $dados['senha'];

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

		    	$array = array('status' => 2);

				echo json_encode($array);

			}else{

				$retorna = $this->model->realizaLogin($email, $senha);
	            
	            if($retorna == true){
	                
	                $array  = array('status' => '5', 'link' => 'home.php');
	                echo json_encode($array);
	                
	            }else{
	                
	                $array  = array('status' => '0', 'mensagem' => 'Email ou senha invalidos.');
	                echo json_encode($array);
	                
	            }

        	}

        }

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$session = new Session;
	    
	    $session->validaSessionController($_POST);

	}

?>