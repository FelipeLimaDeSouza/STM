<?php

	class UsuariosControl{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/UsuariosModel.php';
            
            $this->model = new UsuariosModel(Conexao::getInstance());
            
        }

        public function validaNovaSenhaControl(){

            if((!isset($_POST['input_usuario'])) || (empty($_POST['input_usuario']))){

                $array = array('status' => 2, 'mensagem' => 'Ops! Você esqueceu de preencher um campo. ಠ_ಠ');

                echo json_encode($array);

            }else{

                $usuario = $_POST['input_usuario'];

                $valida = $this->model->validaUsuarioDAO($usuario);

                if($valida == false){

                    $quebra_linha = "\n";

                    $emailsender="suporte.ti@stm-sistema.com.br";

                    $emaildestinatario = "felipe@stm-sistema.com.br";

                    $nomeremetente     = $usuario;
                    $emailremetente    = "suporte.ti@stm-sistema.com.br";
                    $assunto           = "Solicitação de Troca de Senha";
                    $mensagem          = "Solicito a troca de senha do meu usuário!";

                    $mensagem = '<p>'.$usuario.', via site diz:</p>
                    <p>'.$mensagem.'</p>';

                    $headers = "MIME-Version: 1.1".$quebra_linha;
                    $headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
                    $headers .= "From: ".$emailsender.$quebra_linha;
                    $headers .= "Return-Path: " . $emailsender . $quebra_linha;
                    //$headers .= "Reply-To: ".$emailremetente.$quebra_linha;

                    if(mail($emaildestinatario, $assunto, $mensagem, $headers, "-r". $emailsender)){

                        $array = array('status' => 4, 'mensagem' => 'Solicitação enviada com sucesso! ( ͡~ ͜ʖ ͡°)');

                        echo json_encode($array);

                    }else{

                        $array = array('status' => 2, 'mensagem' => 'Erro ao enviar solicitação!');

                        echo json_encode($array);

                    }

                }else{

                    $array = array('status' => 2, 'mensagem' => 'Usuário não cadastrado!');

                    echo json_encode($array);

                }

            }
        
        }

	}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $control = new UsuariosControl();

        $control->validaNovaSenhaControl();

    }

?>