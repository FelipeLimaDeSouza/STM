<?php

	class SetoresControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/SetoresModel.php';
            
            $this->model = new SetoresModel(Conexao::getInstance());
            
        }

        public function retornaSetores(){

        	return $this->model->retornaSetoresDAO();

        }

        public function retornaSetorId($id){

            return $this->model->retornaSetorIdDAO($id);

        }

        public function validaSetorControl(){
            
            $nome = $_POST['input_nome'];

            if(trim($nome) != ""){

                $valida = $this->model->verificaNomeDAO($nome);

                if($valida == true){

                    $retorna = $this->model->cadastrarSetorDAO($nome);

                    if($retorna == true){

                        $array = array('status' => 4, 'mensagem' => 'Setor cadastrado com sucesso! ( ͡~ ͜ʖ ͡°)');

                        echo json_encode($array);

                    }else{

                        $array = array('status' => 3);

                        echo json_encode($array);

                    }

                }else{

                    $array = array('status' => 2, 'mensagem' => 'Setor já cadastrado!');

                    echo json_encode($array);

                }

            }else{

                $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                echo json_encode($array);

            }

        }

	}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $control = new SetoresControl();

        $control->validaSetorControl();

    }

?>