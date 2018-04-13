<?php

	class FuncionariosControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/FuncionariosModel.php';
            
            $this->model = new FuncionariosModel(Conexao::getInstance());
            
        }

        public function retornaFuncionarios(){

        	return $this->model->retornaFuncionariosDAO();

        }

        public function validaCadastroControl(){

            $nome = $_POST['input_nome'];

            if((trim($nome) != "") && (isset($_POST['input_setor'])) && ($_POST['input_setor'] > 0) && ($_POST['input_setor'] != null)){

                $setor = $_POST['input_setor'];

                $valida = $this->model->verificaFuncionarioSetorDAO($nome, $setor);

                if($valida == true){

                    $retorna = $this->model->cadastrarFuncionarioDAO($nome, $setor);

                    if($retorna == true){

                        $array = array('status' => 4, 'mensagem' => 'Funcionário cadastrado com sucesso! ( ͡~ ͜ʖ ͡°)');

                        echo json_encode($array);

                    }else{

                        $array = array('status' => 3);

                        echo json_encode($array);

                    }

                }else{

                    $array = array('status' => 2, 'mensagem' => 'Funcionário já cadastrado!');

                    echo json_encode($array);

                }

            }else{

                $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                echo json_encode($array);

            }
        }

	}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $control = new FuncionariosControl();

        $control->validaCadastroControl();

    }

?>