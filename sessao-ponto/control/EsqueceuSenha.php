<?php

	class EsqueceuSenha{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/UsuarioModel.php';
            
            $this->model = new UsuarioModel(Conexao::getInstance());
            
        }

        public function validaSenhaController($dados){

        	$email = $dados['email'];

        	if(($email == "") || (!filter_var($email, FILTER_VALIDATE_EMAIL))){

        		$array  = array('status' => '0', 'mensagem' => 'Email invalido.');
		        echo json_encode($array);

        	}else{

        		$retorna = $this->model->validaEnviarEmailDAO($email);

        		if($retorna == true){

	        		$email = $_POST['email'];

					$emailremetente    = $email;
					$assunto           = "Contato via Site";
					$emailsender = "suporte.ti@stm-sistema.com.br";
					$emaildestinatario = "suporte.ti@stm-sistema.com.br";

	        		$quebra_linha = "\n";

	        		$mensagem = '<p>'.$email.', solicitou a troca de senha via sessão de ponto no site.</p>';

					$headers = "MIME-Version: 1.1".$quebra_linha;
					$headers .= "Content-type: text/html; charset=utf-8".$quebra_linha;
					$headers .= "From: ".$emailsender.$quebra_linha;
					$headers .= "Return-Path: " . $emailsender . $quebra_linha;
					$headers .= "Reply-To: ".$emailremetente.$quebra_linha;

					mail($emaildestinatario, $assunto, $mensagem, $headers, "-r". $emailsender);

					$array = array('status' => 3);

					echo json_encode($array);

				}else{

					$array = array('status' => 0 , 'mensagem' => 'Cadastro não encontrado.');

					echo json_encode($array);

				}
	        
	    	}

        }

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$session = new EsqueceuSenha;
	    
	    $session->validaSenhaController($_POST);

	}

?>