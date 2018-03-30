<?php

	class Usuarios{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/UsuarioModel.php';
            
            $this->model = new UsuarioModel(Conexao::getInstance());
            
        }

        public function retornaUsuarios(){

        	return $this->model->retornaUsersDAO();

        }

        public function retornaUsuario($busca){

        	return $this->model->retornaUserDAO(trim($busca));

        }

        public function retornaUsuarioAlterar($id){

        	return $this->model->retornaUsuarioAlterarDAO($id);

        }

	}

?>