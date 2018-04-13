<?php

	class AlterarPessoaControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/PessoasModel.php';
            
            $this->model = new PessoasModel(Conexao::getInstance());
            
        }

        public function alterarPessoa(){

            if(($_POST['input_empresa'] == 0) && ($_POST['input_veiculo'] == 0)){

                $array = array('status' => 5, 'mensagem' => 'Não foi feita alteração.');

                echo json_encode($array);

            }elseif(($_POST['input_empresa'] != 0) && ($_POST['input_veiculo'] == 0)){

                $url = $_SERVER['REQUEST_URI'];

                $id = substr($url, 77);

                $retorna = $this->model->alterarEmpresaDAO($_POST['input_empresa'], $id);

                if($retorna == true){

                    $array = array('status' => 5, 'mensagem' => 'Alterado com sucesso!');

                    echo json_encode($array);

                }else{

                    $array = array('status' => 5, 'mensagem' => 'Erro');

                    echo json_encode($array);

                }

            }elseif (($_POST['input_empresa'] == 0) && ($_POST['input_veiculo'] != 0)) {
                
                $url = $_SERVER['REQUEST_URI'];

                $id = substr($url, 77);
                
                $valida_veiculo = $this->model->validaVeiculoDAO($id);

                $retorna = null;

                if($valida_veiculo == false){

                    $retorna = $this->model->alterarVeiculoDAO($_POST['input_veiculo'], $id);

                }else{

                    $retorna = $this->model->inserirVeiculoDAO($_POST['input_veiculo'], $id);

                }

                if($retorna == true){

                    $array = array('status' => 5, 'mensagem' => 'Alterado com sucesso!');

                    echo json_encode($array);

                }else{

                    $array = array('status' => 5, 'mensagem' => 'Erro');

                    echo json_encode($array);

                }

            }else{

                $url = $_SERVER['REQUEST_URI'];

                $id = substr($url, 77);

                $retorna_empresa = $this->model->alterarEmpresaDAO($_POST['input_empresa'], $id);

                $valida_veiculo = $this->model->validaVeiculoDAO($id);

                $retorna_veiculo = null;

                if($valida_veiculo == false){

                    $retorna_veiculo = $this->model->alterarVeiculoDAO($_POST['input_veiculo'], $id);

                }else{

                    $retorna_veiculo = $this->model->inserirVeiculoDAO($_POST['input_veiculo'], $id);

                }

                if(($retorna_empresa == true) && ($retorna_veiculo == true)){

                    $array = array('status' => 5, 'mensagem' => 'Alterado com sucessos!');

                    echo json_encode($array);

                }else{

                    $array = array('status' => 5, 'mensagem' => 'Erro');

                    echo json_encode($array);

                }

            }            

        }

	}

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $control = new AlterarPessoaControl();

        $control->alterarPessoa();

    }

?>