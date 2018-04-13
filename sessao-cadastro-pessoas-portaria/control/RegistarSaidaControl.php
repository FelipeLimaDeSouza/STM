<?php

	class RegistrarSaidaControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/EntradasModel.php';
            
            $this->model = new EntradasModel(Conexao::getInstance());
            
        }

        public function registrarSaida(){
            
            $retorna = $this->model->registrarSaidaDAO($_GET['entrada_id']);

            if($retorna == true){

                $array = array('mensagem' => 'Registro de Saída Concluído com sucesso.');

                echo json_encode($array);

            }else{

                $array = array('mensagem' => 'Erro ao registrar saída.');

                echo json_encode($array);

            }

        }

	}

    if($_SERVER['REQUEST_METHOD'] == "GET"){

        $control = new RegistrarSaidaControl();

        $control->registrarSaida();

    }

?>