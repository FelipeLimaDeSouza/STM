<?php

	class NotasControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/NotasModel.php';
            
            $this->model = new NotasModel(Conexao::getInstance());
            
        }

        public function retornaNotas(){

        	return $this->model->retornaNotasDAO();

        }

        public function retornaNotasBusca($busca){

            return $this->model->retornaNotasBuscaDAO($busca);

        }

        public function validaCadastroNotaControl(){

            if((!isset($_POST['input_pessoa'])) || (empty($_POST['input_pessoa'])) || ($_POST['input_pessoa'] <= 0) || ((!isset($_POST['input_empresa']))) || ((empty($_POST['input_empresa']))) || ($_POST['input_empresa'] <= 0)){

                $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                echo json_encode($array);

            }else{

                if((isset($_POST['input_numero'])) && (!empty($_POST['input_numero']))){

                    $nota_numero = $_POST['input_numero'];

                    $pessoa_id = $_POST['input_pessoa'];

                    $empresa_id = $_POST['input_empresa'];

                    session_start();

                    $usuario_id = $_SESSION['usuario_id'];

                    $valida = $this->model->validaNotaDAO($nota_numero);

                    if($valida == true){

                        $retorna = $this->model->cadastraNotaDAO($nota_numero, $pessoa_id, $empresa_id, $usuario_id);

                        if($retorna == true){

                            $array = array('status' => 4, 'mensagem' => 'Nota cadastrada com sucesso! ( ͡~ ͜ʖ ͡°)');

                            echo json_encode($array);

                        }else{

                            $array = array('status' => 3);

                            echo json_encode($array);

                        }

                    }else{

                        $array = array('status' => 2, 'mensagem' => 'Nota já cadastrada!');

                        echo json_encode($array);

                    }

                }elseif ((isset($_POST['input_vale'])) && (!empty($_POST['input_vale']))) {

                    $preco_vale = $_POST['input_vale'];

                    $pessoa_id = $_POST['input_pessoa'];

                    $empresa_id = $_POST['input_empresa'];

                    session_start();

                    $usuario_id = $_SESSION['usuario_id'];

                    $retorna = $this->model->cadastraValeDAO($preco_vale, $pessoa_id, $empresa_id, $usuario_id);

                    if($retorna == true){

                        $array = array('status' => 4, 'mensagem' => 'Vale cadastrado com sucesso! ( ͡~ ͜ʖ ͡°)');

                        echo json_encode($array);

                    }else{

                        $array = array('status' => 3);

                        echo json_encode($array);

                    }
                    
                }else{

                    $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                    echo json_encode($array);

                }

                

            }

        }

	}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $control = new NotasControl();

        $control->validaCadastroNotaControl();

    }

?>