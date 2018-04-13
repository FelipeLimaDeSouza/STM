<?php

	class PontoModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function retornaHistoricoEspPessoalDAO($id){
            
            try{
                
                $sql = "SELECT * FROM tb_ponto WHERE MD5(user_id_ponto) = ? ORDER BY ponto_data DESC;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function retornaHpHjDAO($id){
            
            try{
                
                $sql = "SELECT * FROM tb_ponto WHERE user_id_ponto = ? AND ponto_data = CURDATE();";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function retornaSemanaHpDAO($ponto_data){
            
            try{
                
                $sql = "SELECT CASE WEEKDAY(?) WHEN 0 THEN 'Segunda-feira' WHEN 1 THEN 'Terça-feira' WHEN 2 THEN 'Quarta-feira'
                       WHEN 3 THEN 'Quinta-feira' WHEN 4 THEN 'Sexta-feira' WHEN 5 THEN 'Sábado' WHEN 6 THEN 'Domingo' END AS diadasemana";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $ponto_data);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function inserirPontoDiaDAO($id){
            
            try{
                
                $sql = "INSERT INTO tb_ponto(ponto_data, user_id_ponto) VALUES(CURDATE(), ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function inserirPontoEntradaDAO($id){
            
            try{
                
                $sql = "UPDATE tb_ponto SET ponto_entrada = CURTIME() WHERE ponto_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function inserirPontoAlmocoDAO($id){
            
            try{
                
                $sql = "UPDATE tb_ponto SET ponto_almoco = CURTIME() WHERE ponto_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function inserirPontoVoltaAlmocoDAO($id){
            
            try{
                
                $sql = "UPDATE tb_ponto SET ponto_volta_almoco = CURTIME() WHERE ponto_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }

        public function inserirPontoSaidaDAO($id){
            
            try{
                
                $sql = "UPDATE tb_ponto SET ponto_saida = CURTIME() WHERE ponto_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }
            
        }



	}

?>