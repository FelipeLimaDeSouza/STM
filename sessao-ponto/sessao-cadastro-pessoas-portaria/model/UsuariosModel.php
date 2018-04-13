<?php

	class UsuariosModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function realizaLoginDAO($usuario, $senha){

        	try {

	            $sql = "SELECT * FROM tb_usuarios WHERE usuario_login = ? AND usuario_senha = MD5(?)";

	            $stm = $this->pdo->prepare($sql);

	            $stm->bindValue(1, $usuario);
	            $stm->bindValue(2, $senha);

	            $stm->execute();

	            $rows = $stm->rowCount();

	            $dados = $stm->fetchAll(PDO::FETCH_OBJ);

	            session_start();

	            if ($rows === 1) {

	                foreach ($dados as $reg) {

	                    $_SESSION['usuario_nome'] = $reg->usuario_nome;
	                    $_SESSION['usuario_id'] = md5($reg->usuario_id);
	                    $_SESSION['usuario_nivel'] = $reg->usuario_nivel;

	                }

	                $_SESSION['id'] = session_id();

	                return true;
	                
	            } else{

	            	$_SESSION = array();

	            	if (ini_get("session.use_cookies")) {
					    $params = session_get_cookie_params();
					    setcookie(session_name(), '', time() - 42000,
					        $params["path"], $params["domain"],
					        $params["secure"], $params["httponly"]
					    );
					}

	                session_destroy();
	                
	                return false;

	            }

			} catch (PDOException $erro) {

			    $_SESSION = array();

            	if (ini_get("session.use_cookies")) {
				    $params = session_get_cookie_params();
				    setcookie(session_name(), '', time() - 42000,
				        $params["path"], $params["domain"],
				        $params["secure"], $params["httponly"]
				    );
				}

                session_destroy();

			    return false;

			}

        }

        public function retornaUsuariosDAO(){
        	
        	try{

        		$sql = "SELECT usuario_id, usuario_nome, usuario_login, CASE WHEN usuario_nivel = 0 THEN 'Administrador (a)' WHEN usuario_nivel = 1 THEN 'Porteiro (a)' WHEN usuario_nivel = 2 THEN 'Administrativo'
        		END AS 'usuario_nivel' FROM tb_usuarios";

	            $stm = $this->pdo->prepare($sql);

	            $stm->execute();

	            $dados = $stm->fetchAll(PDO::FETCH_OBJ);

	            return $dados;

        	}catch(PDOException $erro){

        		return null;

        	}

        }

        public function validaUsuarioDAO($usuario_login){
        	
        	try{

        		$sql = "SELECT usuario_login FROM tb_usuarios WHERE usuario_login = ?;";

	            $stm = $this->pdo->prepare($sql);

	            $stm->bindValue(1, $usuario_login);

	            $stm->execute();

	            $rows = $stm->rowCount();

	            if($rows >= 1){

	            	return false;

	            }else{

	            	return true;

	            }

        	}catch(PDOException $erro){

        		return null;

        	}

        }

        public function cadastraUsuarioDAO($usuario_login, $usuario_nome, $usuario_nivel, $usuario_senha){
        	
        	try{

        		$sql = "INSERT INTO tb_usuarios(usuario_login, usuario_nome, usuario_nivel, usuario_senha) VALUES(?, ?, ?, ?);";

	            $stm = $this->pdo->prepare($sql);

	            $stm->bindValue(1, strtolower($usuario_login));

	            $stm->bindValue(2, strtoupper($usuario_nome));

	            $stm->bindValue(3, $usuario_nivel);

	            $stm->bindValue(4, md5($usuario_senha));

	            $stm->execute();

	            return true;

        	}catch(PDOException $erro){

        		return null;

        	}

        }

	}

?>