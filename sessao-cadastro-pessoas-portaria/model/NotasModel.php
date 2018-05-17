<?php

	class NotasModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function retornaNotasDAO(){

        	try{
                
                $sql = "SELECT nota.nota_id, nota.nota_data, nota.nota_hora, nota.nota_numero, nota.nota_vale, usu.usuario_nome, pes.pessoa_nome, pes.pessoa_id, emp.empresa_nome, emp.empresa_cnpj, emp.empresa_id FROM tb_notas nota INNER JOIN tb_usuarios usu ON usu.usuario_id = nota.usuario_id_nota INNER JOIN tb_pessoas pes ON pes.pessoa_id = nota.pessoa_id_nota INNER JOIN tb_empresas emp ON emp.empresa_id = nota.empresa_id_nota ORDER BY nota.nota_id DESC LIMIT 25;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function retornaNotasBuscaDAO($busca){

            try{
                
                $sql = "SELECT nota.nota_id, nota.nota_data, nota.nota_hora, nota.nota_numero, nota.nota_vale, usu.usuario_nome, pes.pessoa_nome, pes.pessoa_id, emp.empresa_nome, emp.empresa_cnpj, emp.empresa_id FROM tb_notas nota INNER JOIN tb_usuarios usu ON usu.usuario_id = nota.usuario_id_nota INNER JOIN tb_pessoas pes ON pes.pessoa_id = nota.pessoa_id_nota INNER JOIN tb_empresas emp ON emp.empresa_id = nota.empresa_id_nota WHERE (nota.nota_numero LIKE ?) OR (emp.empresa_nome LIKE ?) OR (pes.pessoa_nome LIKE ?) OR (nota.nota_vale LIKE ?) ORDER BY nota.nota_id DESC;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, '%'.$busca.'%');
                $stm->bindValue(2, '%'.$busca.'%');
                $stm->bindValue(3, '%'.$busca.'%');
                $stm->bindValue(4, '%'.$busca.'%');

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function retornaNotasBuscaAvancadaDAO($data_ini, $data_fim, $empresa){

            $data_i = implode('-', array_reverse(explode('/', $data_ini)));

            $data_f = implode('-', array_reverse(explode('/', $data_fim)));

            try{

                $sql = "SELECT nota.nota_id, nota.nota_data, nota.nota_hora, nota.nota_numero, nota.nota_vale, usu.usuario_nome, pes.pessoa_nome, pes.pessoa_id, emp.empresa_nome, emp.empresa_cnpj, emp.empresa_id FROM tb_notas nota INNER JOIN tb_usuarios usu ON usu.usuario_id = nota.usuario_id_nota INNER JOIN tb_pessoas pes ON pes.pessoa_id = nota.pessoa_id_nota INNER JOIN tb_empresas emp ON emp.empresa_id = nota.empresa_id_nota WHERE ? IS NOT NULL AND (emp.empresa_nome LIKE ? AND (nota.nota_data BETWEEN ? AND ?)) ORDER BY nota.nota_data ASC";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, '%'.$empresa.'%');
                $stm->bindValue(2, '%'.$empresa.'%');
                $stm->bindValue(3, $data_i);
                $stm->bindValue(4, $data_f);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                return null;
                
            }

        }

        public function validaNotaDAO($nota_numero){

            try{
                
                $sql = "SELECT * FROM tb_notas WHERE nota_numero = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nota_numero);

                $stm->execute();

                $rows = $stm->rowCount();

                if ($rows >= 1) {

                    return false;

                }else{

                    return true;

                }
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function retornaIdNotaDAO($usuario_id){

            try{
                
                $sql = "SELECT * FROM tb_usuarios WHERE MD5(usuario_id) = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $usuario_id);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                $id = null;

                foreach ($dados as $reg) {
                    
                    $id = $reg->usuario_id;

                }

                return $id;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function cadastraNotaDAO($nota_numero, $pessoa_id, $empresa_id, $usuario_id){

            try{

                $retornaId = $this->retornaIdNotaDAO($usuario_id);
                
                $sql = "INSERT INTO tb_notas(nota_numero, pessoa_id_nota, empresa_id_nota, usuario_id_nota, nota_data, nota_hora) VALUES(?, ?, ?, ?, CURDATE(), CURTIME());";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nota_numero);

                $stm->bindValue(2, $pessoa_id);

                $stm->bindValue(3, $empresa_id);

                $stm->bindValue(4, $retornaId);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function alteraNotaNumeroDAO($nota_id, $nota_numero, $empresa_id, $pessoa_id, $usuario_id){

            try{

                $retornaId = $this->retornaIdNotaDAO($usuario_id);
                
                $sql = "UPDATE tb_notas SET nota_numero = ?, empresa_id_nota = ?, pessoa_id_nota = ?, usuario_id_nota = ? WHERE nota_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nota_numero);

                $stm->bindValue(2, $empresa_id);

                $stm->bindValue(3, $pessoa_id);

                $stm->bindValue(4, $retornaId);

                $stm->bindValue(5, $nota_id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function alteraNotaValeDAO($nota_id, $nota_vale, $empresa_id, $pessoa_id, $usuario_id){

            try{

                $retornaId = $this->retornaIdNotaDAO($usuario_id);
                
                $sql = "UPDATE tb_notas SET nota_vale = ?, empresa_id_nota = ?, pessoa_id_nota = ?, usuario_id_nota = ? WHERE nota_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nota_vale);

                $stm->bindValue(2, $empresa_id);

                $stm->bindValue(3, $pessoa_id);

                $stm->bindValue(4, $retornaId);

                $stm->bindValue(5, $nota_id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function inserirLogNotaDAO($nota_id, $motivo, $usuario_id){

            try{

                $retornaId = $this->retornaIdNotaDAO($usuario_id);

                $sql = "INSERT INTO tb_log_alteracao_nota(nota_id_alteracao, alteracao_motivo, usuario_id_alteracao) VALUES(?, ?, ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nota_id);

                $stm->bindValue(2, $motivo);

                $stm->bindValue(3, $retornaId);

                $stm->execute();
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function cadastraValeDAO($preco_vale, $pessoa_id, $empresa_id, $usuario_id){

            try{

                $retornaId = $this->retornaIdNotaDAO($usuario_id);
                
                $sql = "INSERT INTO tb_notas(nota_vale, pessoa_id_nota, empresa_id_nota, usuario_id_nota, nota_data, nota_hora) VALUES(?, ?, ?, ?, CURDATE(), CURTIME());";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, "VALE R$" . strtolower($preco_vale));

                $stm->bindValue(2, $pessoa_id);

                $stm->bindValue(3, $empresa_id);

                $stm->bindValue(4, $retornaId);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

	}

?>