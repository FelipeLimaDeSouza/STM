<?php

	class VeiculosControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/VeiculosModel.php';
            
            $this->model = new VeiculosModel(Conexao::getInstance());
            
        }

        public function retornaVeiculos(){

        	return $this->model->retornaVeiculosDAO();

        }

        public function retornaVeiculoPessoa($id){

            return $this->model->retornaVeiculoPessoaDAO($id);

        }

        public function validaCadastroVeiculoControl(){
            
            $placa = $_POST['input_placa'];

            if(trim($placa) != ""){

                $valida = $this->model->verificaPlacaDAO($placa);

                if($valida == true){

                    $retorna = $this->model->cadastrarVeiculoDAO($placa);

                    if($retorna == true){

                        $array = array('status' => 4, 'mensagem' => 'Veículo cadastrado com sucesso! ( ͡~ ͜ʖ ͡°)');

                        echo json_encode($array);

                    }else{

                        $array = array('status' => 3);

                        echo json_encode($array);

                    }

                }else{

                    $array = array('status' => 2, 'mensagem' => 'Veículo já cadastrado!');

                    echo json_encode($array);

                }

            }else{

                $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                echo json_encode($array);

            }

        }

	}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $control = new VeiculosControl();

        $control->validaCadastroVeiculoControl();

    }

?>