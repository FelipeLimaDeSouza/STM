<?php

	class UsuariosControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/UsuariosModel.php';
            
            $this->model = new UsuariosModel(Conexao::getInstance());
            
        }

        public function retornaUsuarios(){
        	
        	return $this->model->retornaUsuariosDAO();

        }

        public function validaCadastroUsuarioControl(){

        	if((!isset($_POST['input_nome'])) || (!isset($_POST['input_usuario'])) || (!isset($_POST['input_nivel'])) || (!isset($_POST['input_senha'])) || ($_POST['input_nome'] == null) || ($_POST['input_usuario'] == null) || ($_POST['input_nivel'] == null) || ($_POST['input_nivel'] <= 0) || ($_POST['input_senha'] == null)){

        		$array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                echo json_encode($array);

        	}else{

        		$valida = $this->model->validaUsuarioDAO($_POST['input_usuario']);

        		if($valida == true){

        			$retorna = $this->model->cadastraUsuarioDAO($_POST['input_usuario'], $_POST['input_nome'], ($_POST['input_nivel'] - 1), $_POST['input_senha']);

        			if($retorna == true){

        				$array = array('status' => 4, 'mensagem' => 'Usuário cadastrado com sucesso! ( ͡~ ͜ʖ ͡°)');

                		echo json_encode($array);

        			}else{

        				$array = array('status' => 3);

                		echo json_encode($array);

        			}

        		}else{

        			$array = array('status' => 2, 'mensagem' => 'Usuário já cadastrado! ಠ_ಠ');

                	echo json_encode($array);

        		}

        	}
        	
        }

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$control = new UsuariosControl();

		$control->validaCadastroUsuarioControl();

	}

?>