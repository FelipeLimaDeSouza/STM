<?php

	class RetornaBuscaNotasControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/NotasModel.php';
            
            $this->model = new NotasModel(Conexao::getInstance());
            
        }

        public function retornaNotasBuscaAvancada($data_ini, $data_fim, $empresa){

            return $this->model->retornaNotasBuscaAvancadaDAO($data_ini, $data_fim, $empresa);

        }
	}

?>