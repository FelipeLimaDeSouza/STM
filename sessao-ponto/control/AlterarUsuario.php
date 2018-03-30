<?php

	class AlterarUsuario{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/UsuarioModel.php';
            
            $this->model = new UsuarioModel(Conexao::getInstance());
            
        }

        public function validaAlterarController($dados){
        	
        	$nome = $dados['nome'];
        	$email = $dados['email'];
            $senha = $dados['senha'];
        	$conf_senha = $dados['conf_senha'];
        	$tipo = $dados['tipo'];


        	if(($nome == "") || ($email == "") || ($tipo == "")){

        		$array  = array('status' => 1);

	            echo json_encode($array);

        	}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        		
        		$array = array('status' => 2);

				echo json_encode($array);

        	}elseif ($senha != $conf_senha) {
        		
        		$array = array('status' => 0, 'mensagem' => 'As senhas não correspondem.');

				echo json_encode($array);

        	}elseif($senha == ""){

                $dados = $this->model->retornaUsuarioEspEmailDAO($email);

                if($dados != null){

                    $id = null;

                    foreach ($dados as $reg) {
                        
                        $id = $reg->user_id;

                    }

                    if($_GET['uid'] == md5($id)){

                        $retorna = $this->model->alterarUsuarioSSDAO($nome, $email, $tipo, $id);

                        if($retorna == true){

                            $array = array('status' => 7, 'link' => 'home.php?alterar='.$_GET['uid']);

                            echo json_encode($array);

                        }else{

                            $array = array('status' => 0, 'mensagem' => 'Erro ao alterar.');

                            echo json_encode($array);

                        }


                    }else{

                        $array = array('status' => 0, 'mensagem' => 'Este e-mail já está sendo usado.');

                        echo json_encode($array);

                    }

                }else{

                    $retorna = $this->model->alterarUsuarioSSCCDAO($nome, $email, $tipo, $_GET['uid']);

                    if($retorna == true){

                        $array = array('status' => 7, 'link' => 'home.php?alterar='.$_GET['uid']);

                        echo json_encode($array);

                    }else{

                        $array = array('status' => 0, 'mensagem' => 'Erro ao alterar.');

                        echo json_encode($array);

                    }

                }

                
            }else{

        		$dados = $this->model->retornaUsuarioEspEmailDAO($email);

                if($dados != null){

                    $id = null;

                    foreach ($dados as $reg) {
                        
                        $id = $reg->user_id;

                    }

                    if($_GET['uid'] == md5($id)){

                        $retorna = $this->model->alterarUsuarioDAO($nome, $email, $tipo, $senha, $id);

                        if($retorna == true){

                            $array = array('status' => 7, 'link' => 'home.php?alterar='.$_GET['uid']);

                            echo json_encode($array);

                        }else{

                            $array = array('status' => 0, 'mensagem' => 'Erro ao alterar.');

                            echo json_encode($array);

                        }


                    }else{

                        $array = array('status' => 0, 'mensagem' => 'Este e-mail já está sendo usado.');

                        echo json_encode($array);

                    }

                }else{

                    $retorna = $this->model->alterarUsuarioCCDAO($nome, $email, $tipo, $senha, $_GET['uid']);

                    if($retorna == true){

                        $array = array('status' => 7, 'link' => 'home.php?alterar='.$_GET['uid']);

                        echo json_encode($array);

                    }else{

                        $array = array('status' => 0, 'mensagem' => 'Erro ao alterar.');

                        echo json_encode($array);

                    }

                }

        	}

        }

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$session = new AlterarUsuario;
	    
	    $session->validaAlterarController($_POST);

	}

?>