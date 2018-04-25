<?php

	class UsuarioModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function validaEnviarEmailDAO($email){
            
            try{
                
                $sql = "SELECT * FROM tb_user WHERE user_email = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                $rows = $stm->rowCount();

                if ($rows > 0) {

                    return true;

                }else{

                    return false;

                }
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function retornaUsersDAO(){
            
            try{
                
                $sql = "SELECT * FROM tb_user WHERE user_status = 1 ORDER BY user_nome ASC;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function retornaUsuarioAlterarDAO($id){
            
            try{
                
                $sql = "SELECT * FROM tb_user WHERE MD5(user_id) = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function retornaUsuarioExcluirDAO($id){
            
            try{
                
                $sql = "SELECT * FROM tb_user WHERE MD5(user_id) = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function retornaUserDAO($busca){
            
            try{
                
                $sql = "SELECT * FROM tb_user WHERE user_status = 1 AND (user_nome LIKE ? OR user_email LIKE ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, "%" . $busca . "%");
                $stm->bindValue(2, "%" . $busca . "%");

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                $_SESSION['bsc'] = $busca;

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function cadastrarUsuarioDAO($nome, $email, $senha, $tipo){
            
            try{
                
                $sql = "INSERT INTO tb_user(user_nome, user_email, user_senha, user_tipo) VALUES(?, ?, MD5(?), ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nome);
                $stm->bindValue(2, $email);
                $stm->bindValue(3, $senha);
                $stm->bindValue(4, $tipo);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function alterarUsuarioSSDAO($nome, $email, $tipo, $id){
            
            try{
                
                $sql = "UPDATE tb_user SET user_nome = ? , user_email = ? , user_tipo = ? WHERE user_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nome);
                $stm->bindValue(2, $email);
                $stm->bindValue(3, $tipo);
                $stm->bindValue(4, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function desativaUsuarioDAO($id){
            
            try{
                
                $sql = "UPDATE tb_user SET user_status = 0 WHERE user_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function alterarUsuarioDAO($nome, $email, $tipo, $senha, $id){
            
            try{
                
                $sql = "UPDATE tb_user SET user_nome = ? , user_email = ? , user_tipo = ? , user_senha = MD5(?) WHERE user_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nome);
                $stm->bindValue(2, $email);
                $stm->bindValue(3, $tipo);
                $stm->bindValue(4, $senha);
                $stm->bindValue(5, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function alterarUsuarioSSCCDAO($nome, $email, $tipo, $id){
            
            try{
                
                $sql = "UPDATE tb_user SET user_nome = ? , user_email = ? , user_tipo = ? WHERE MD5(user_id) = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nome);
                $stm->bindValue(2, $email);
                $stm->bindValue(3, $tipo);
                $stm->bindValue(4, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function alterarUsuarioCCDAO($nome, $email, $tipo, $senha, $id){
            
            try{
                
                $sql = "UPDATE tb_user SET user_nome = ? , user_email = ? , user_tipo = ? , user_senha = MD5(?) WHERE MD5(user_id) = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nome);
                $stm->bindValue(2, $email);
                $stm->bindValue(3, $tipo);
                $stm->bindValue(4, $senha);
                $stm->bindValue(5, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function retornaUsuarioEmailDAO($email){
            
            try{
                
                $sql = "SELECT * FROM tb_user WHERE user_email = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $email);

                $stm->execute();

                $rows = $stm->rowCount();

                if ($rows > 0) {

                	return false;

                }else{

                	return true;

                }
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function retornaUsuarioEspEmailDAO($email){
            
            try{
                
                $sql = "SELECT * FROM tb_user WHERE user_email = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $email);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

	public function ips($ip){

        $ip_qbd = substr($ip, 0, 3);
        
        if($ip == "177.86.127.194"){

			return true;

		}else{

			return true;

		}

	}

        public function realizaLogin($email, $senha){

        	$ip = $this->getRealIPAddress();

            $retorno = $this->ips($ip);

        	if($retorno == true){
        	
	        	try {

	                $sql = "SELECT * FROM tb_user WHERE user_email = ? AND user_senha = MD5(?) AND user_status = 1;";

	                $stm = $this->pdo->prepare($sql);

	                $stm->bindValue(1, $email);
	                $stm->bindValue(2, $senha);

	                $stm->execute();

	                $rows = $stm->rowCount();

	                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

	                session_start();

	                if ($rows == 1) {

	                    foreach ($dados as $reg) {

	                        $_SESSION['usuario_nome'] = $reg->user_nome;
	                        $_SESSION['usuario_email'] = $reg->user_email;
	                        $_SESSION['usuario_id'] = $reg->user_id;
	                        $_SESSION['usuario_tipo'] = $reg->user_tipo;
	                        $_SESSION['usuario_ip'] = $reg->user_ip;

	                    }

	                    $retorna = $this->updateIp($_SESSION['usuario_id']);

                    	if($retorna == true){

                    		$_SESSION['usuario_ip'] = $this->getRealIPAddress();

                    	}

	                    $_SESSION['id'] = session_id();

	                    return true;
	                    
	                } else{

	                    session_unset();
	                    session_destroy();
	                    
	                    return false;

	                }

	              } catch (PDOException $erro) {

	                    session_unset();
	                    session_destroy();
	                
	                    return false;

	              }

          	}else{

          		return false;

          	}

        }

        public function updateIp($id){
        	
        	try {

                $sql = "UPDATE tb_user SET user_ip = ? WHERE user_id = ?;";

                $stm = $this->pdo->prepare($sql);
                
                $stm->bindValue(1, $this->getRealIPAddress());
                $stm->bindValue(2, $id);

                $stm->execute();

                return true;

              } catch (PDOException $erro) {

                session_unset();
                session_destroy();
            
                return false;

              }

        }

        public function getRealIPAddress(){ 

			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
				$ip = $_SERVER['REMOTE_ADDR'];
			}

			return $ip;

		}


	}

?>
