<?php

	class PessoasControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/PessoasModel.php';
            
            $this->model = new PessoasModel(Conexao::getInstance());
            
        }

        public function retornaPessoas(){

        	return $this->model->retornaPessoasDAO();

        }

        public function validaPessoasControl(){
            
            $nome = $_POST['input_nome'];

            if((trim($nome) != "") && (isset($_POST['input_empresa'])) && ($_POST['input_empresa'] > 0) && ($_POST['input_empresa'] != null)){

                if(((!isset($_POST['input_cpf'])) && (!isset($_POST['input_rg']))) || (($_POST['input_cpf'] == null) && ($_POST['input_rg'] == null))) {
                    
                    $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ Lembrando... digite pelo menos o CPF ou o RG!');

                    echo json_encode($array);

                }else{

                    $empresa_id = $_POST['input_empresa'];

                    $veiculo_id = null;

                    $rg = null;

                    $cpf = null;

                    if((isset($_POST['input_veiculo'])) && ($_POST['input_veiculo'] > 0) && ($_POST['input_veiculo'] != null)){

                        $veiculo_id = $_POST['input_veiculo'];

                    }

                    if ((isset($_POST['input_rg'])) && ($_POST['input_rg'] != null)) {
                    
                        $rg = $_POST['input_rg'];

                    }

                    if ((isset($_POST['input_cpf'])) && ($_POST['input_cpf'] != null)) {
                        
                        $cpf = $_POST['input_cpf'];

                    }

                    $valida = $this->model->verificaPessoaDAO($nome, $empresa_id, $rg, $cpf);

                    if($valida == true){

                        $retorna = null;

                        if($veiculo_id != null){

                            $retorna = $this->model->cadastrarPessoaDAO($nome, $empresa_id, $veiculo_id, $rg, $cpf);

                        }else{

                            $retorna = $this->model->cadastrarPessoaSemVeiculoDAO($nome, $empresa_id, $rg, $cpf);

                        }

                        if($retorna == true){

                            $array = array('status' => 4, 'mensagem' => 'Pessoa cadastrada com sucesso! ( ͡~ ͜ʖ ͡°)');

                            echo json_encode($array);

                        }else{

                            $array = array('status' => 3);

                            echo json_encode($array);

                        }

                    }else{

                        $array = array('status' => 2, 'mensagem' => 'Pessoa já cadastrada!');

                        echo json_encode($array);

                    }

                }

            }else{

                $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                echo json_encode($array);

            }

        }

	}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $control = new PessoasControl();

        $control->validaPessoasControl();

    }

?>