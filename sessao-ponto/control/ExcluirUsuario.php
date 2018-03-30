<?php

	class ExcluirUsuario{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/UsuarioModel.php';
            
            $this->model = new UsuarioModel(Conexao::getInstance());
            
        }

        public function validaExcluirController(){
        	
        	$id = $_GET['uid'];

            $dados = $this->model->retornaUsuarioExcluirDAO($id);

            if($dados != null){

                foreach ($dados as $reg) {
                    
                    $id = $reg->user_id;

                }

                $retorna = $this->model->desativaUsuarioDAO($id);

                if($retorna == true){

                    header('Location:../view/home.php?exc_success');

                }else{

                    header('Location:../view/home.php?exc_error');

                }

            }else{


                header('Location:../view/home.php');

            }

        }

	}

	if(isset($_GET['uid'])){

		$session = new ExcluirUsuario;
	    
	    $session->validaExcluirController();

	}

?>