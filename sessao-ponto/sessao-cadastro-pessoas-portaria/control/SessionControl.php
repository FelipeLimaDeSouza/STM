<?php

	class SessionControl{
        
        private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/UsuariosModel.php';
            
            $this->model = new UsuariosModel(Conexao::getInstance());
            
        }

        public function validaSessionController(){

            $usuario = $_POST['input_usuario'];
            $senha = $_POST['input_senha'];

            $retorna = $this->model->realizaLoginDAO($usuario, $senha);
                
            if($retorna == true){
                
                $array  = array('status' => '1', 'link' => 'home.php');
                echo json_encode($array);
                
            }else{
                
                $array  = array('status' => '0', 'mensagem' => 'Email ou senha invalidos.');
                echo json_encode($array);
                
            }
        }

    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $session = new SessionControl();
        
        $session->validaSessionController();

    }

?>