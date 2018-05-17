<?php

	class AlterarNotaControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/NotasModel.php';
            
            $this->model = new NotasModel(Conexao::getInstance());
            
        }

        public function alterarNota(){

            if((!isset($_POST['input_id'])) || (!isset($_POST['input_empresa'])) || (!isset($_POST['input_pessoa'])) || (!isset($_POST['textarea_motivo'])) || ($_POST['input_id'] == null) || ($_POST['input_empresa'] == null) || ($_POST['input_pessoa'] == null) || ($_POST['textarea_motivo'] == null)){

                $array = array('status' => 6, 'mensagem' => 'Preencha os campos corretamente.');

                echo json_encode($array);

            }elseif((isset($_POST['input_numero'])) && ($_POST['input_numero'] != null) && (!isset($_POST['input_vale']))){

                session_start();

                $retorna = $this->model->alteraNotaNumeroDAO($_POST['input_id'], $_POST['input_numero'], $_POST['input_empresa'], $_POST['input_pessoa'], $_SESSION['usuario_id']);

                if($retorna == true){

                    $this->model->inserirLogNotaDAO($_POST['input_id'], $_POST['textarea_motivo'], $_SESSION['usuario_id']);

                    $array = array('status' => 7, 'mensagem' => 'Alterado com sucesso!');

                    echo json_encode($array);

                }else{

                    $array = array('status' => 6, 'mensagem' => 'Erro');

                    echo json_encode($array);

                }

            }elseif((isset($_POST['input_vale'])) && ($_POST['input_vale'] != null) && (!isset($_POST['input_numero']))){
                
                session_start();

                $retorna = $this->model->alteraNotaValeDAO($_POST['input_id'], $_POST['input_vale'], $_POST['input_empresa'], $_POST['input_pessoa'], $_SESSION['usuario_id']);

                if($retorna == true){

                    $this->model->inserirLogNotaDAO($_POST['input_id'], $_POST['textarea_motivo'], $_SESSION['usuario_id']);

                    $array = array('status' => 7, 'mensagem' => 'Alterado com sucesso!');

                    echo json_encode($array);

                }else{

                    $array = array('status' => 6, 'mensagem' => 'Erro');

                    echo json_encode($array);

                }

            }else{

                $array = array('status' => 6, 'mensagem' => 'Preencha os campos corretamente.');

                echo json_encode($array);

            }

        }

	}

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $control = new AlterarNotaControl();

        $control->alterarNota();

    }

?>