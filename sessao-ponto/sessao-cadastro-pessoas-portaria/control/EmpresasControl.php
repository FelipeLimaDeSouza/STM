<?php

	class EmpresasControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/EmpresasModel.php';
            
            $this->model = new EmpresasModel(Conexao::getInstance());
            
        }

        public function retornaEmpresas(){

        	return $this->model->retornaEmpresasDAO();

        }

        public function validarCadastroControl(){
            
            if((isset($_POST['input_nome'])) && ($_POST['input_nome'] != "") && (isset($_POST['input_cnpj'])) && ($_POST['input_cnpj'] != "") && (strlen($_POST['input_cnpj']) == 18)){

                $nome = $_POST['input_nome'];

                $cnpj = $_POST['input_cnpj'];

                $valida = $this->model->verificaCnpjDAO($cnpj);

                if($valida == true){

                    $retorna = $this->model->cadastrarEmpresaDAO($nome, $cnpj);

                    if($retorna == true){

                        $array = array('status' => 4, 'mensagem' => 'Empresa cadastrada com sucesso! ( ͡~ ͜ʖ ͡°)');

                        echo json_encode($array);

                    }else{

                        $array = array('status' => 3);

                        echo json_encode($array);

                    }

                }else{

                    $array = array('status' => 2, 'mensagem' => 'Empresa já cadastrada!');

                    echo json_encode($array);

                }

            }else{

                $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                echo json_encode($array);

            }

        }

	}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $control = new EmpresasControl();

        $control->validarCadastroControl();

    }

?>