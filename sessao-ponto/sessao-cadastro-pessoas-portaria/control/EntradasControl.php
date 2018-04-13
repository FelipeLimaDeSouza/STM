<?php

	class EntradasControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/EntradasModel.php';
            
            $this->model = new EntradasModel(Conexao::getInstance());
            
        }

        public function retornaEntradas(){

        	return $this->model->retornaEntradasDAO();

        }

        public function retornaEntradasAtivas(){

            return $this->model->retornaEntradasAtivasDAO();

        }

        public function validaCadastroEntrada(){
           
            if((!isset($_POST['input_pessoa'])) || (!isset($_POST['input_funcionario'])) || ($_POST['input_pessoa'] == null) || ($_POST['input_funcionario'] == null) || ($_POST['input_pessoa'] <= 0) || ($_POST['input_funcionario'] <= 0)){

                $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                echo json_encode($array);

            }else{

                session_start();

                $retorna = $this->model->cadastrarEntradaDAO($_POST['input_pessoa'], $_POST['input_funcionario'], $_SESSION['usuario_id']);

                if($retorna == true){

                    $array = array('status' => 4, 'mensagem' => 'Entrada cadastrada com sucesso! ( ͡~ ͜ʖ ͡°)');

                    echo json_encode($array);

                }else{

                    $array = array('status' => 3);

                    echo json_encode($array);

                }

            }

        }

	}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $control = new EntradasControl();

        $control->validaCadastroEntrada();

    }

?>