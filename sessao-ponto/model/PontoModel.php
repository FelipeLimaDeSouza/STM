<?php

	class PontoModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function retornaHistoricoEspPessoalDAO($id){
            
            try{
                
                $sql = "SELECT * , CASE WHEN ponto_entrada <= '08:20:00' THEN SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(ponto_saida , '08:00:00')) - TIME_TO_SEC(TIMEDIFF(ponto_volta_almoco , ponto_almoco))) ELSE SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(ponto_saida , ponto_entrada)) - TIME_TO_SEC(TIMEDIFF(ponto_volta_almoco , ponto_almoco))) END AS 'hora_dia' FROM tb_ponto WHERE MD5(user_id_ponto) = ? ORDER BY ponto_data DESC";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function retornaPrimeiroDiaMesDAO($ponto_data){
            
            try{
                
                $sql = "SELECT ponto_data FROM tb_ponto WHERE MONTH(ponto_data) = MONTH(?) ORDER BY ponto_data DESC LIMIT 1;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $ponto_data);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }
            
        }

        public function retornaTotalHorasDAO($ponto_data, $user_id_ponto){
            
            try{
                
                $sql = "SELECT 
                            CASE 
                                WHEN (SUM((SELECT SUM(TIME_TO_SEC(TIMEDIFF(ponto_saida , ponto_entrada))) - 
                                            SUM(TIME_TO_SEC(TIMEDIFF(ponto_volta_almoco , ponto_almoco))) 
                                        FROM tb_ponto 
                                        WHERE (ponto_data BETWEEN DATE_SUB(?, 
                                            INTERVAL DAYOFMONTH(?)-1 DAY) AND LAST_DAY(?)) 
                                            AND ponto_entrada > '08:20:00' AND MD5(user_id_ponto) = ?))) IS NULL
                                    THEN 
                                        SEC_TO_TIME(SUM((SELECT SUM(TIME_TO_SEC(TIMEDIFF(ponto_saida , '08:00:00'))) - 
                                            SUM(TIME_TO_SEC(TIMEDIFF(ponto_volta_almoco , ponto_almoco)))
                                        FROM tb_ponto 
                                        WHERE (ponto_data BETWEEN DATE_SUB(?, INTERVAL DAYOFMONTH(?)-1 DAY) 
                                            AND LAST_DAY(?)) 
                                            AND ponto_entrada <= '08:20:00' AND MD5(user_id_ponto) = ?)) + 0)
                                WHEN
                                    (SUM((SELECT SUM(TIME_TO_SEC(TIMEDIFF(ponto_saida , '08:00:00'))) - 
                                            SUM(TIME_TO_SEC(TIMEDIFF(ponto_volta_almoco , ponto_almoco)))
                                        FROM tb_ponto 
                                        WHERE (ponto_data BETWEEN DATE_SUB(?, INTERVAL DAYOFMONTH(?)-1 DAY) 
                                            AND LAST_DAY(?)) 
                                            AND ponto_entrada <= '08:20:00' AND MD5(user_id_ponto) = ?))) IS NULL
                                    THEN
                                        SEC_TO_TIME(SUM((SELECT SUM(TIME_TO_SEC(TIMEDIFF(ponto_saida , ponto_entrada))) - 
                                            SUM(TIME_TO_SEC(TIMEDIFF(ponto_volta_almoco , ponto_almoco))) 
                                        FROM tb_ponto 
                                        WHERE (ponto_data BETWEEN DATE_SUB(?, 
                                            INTERVAL DAYOFMONTH(?)-1 DAY) AND LAST_DAY(?)) 
                                            AND ponto_entrada > '08:20:00' AND MD5(user_id_ponto) = ?)) + 0)
                                ELSE 
                                    SEC_TO_TIME(SUM((SELECT SUM(TIME_TO_SEC(TIMEDIFF(ponto_saida , ponto_entrada))) - 
                                            SUM(TIME_TO_SEC(TIMEDIFF(ponto_volta_almoco , ponto_almoco))) 
                                        FROM tb_ponto 
                                        WHERE (ponto_data BETWEEN DATE_SUB(?, 
                                            INTERVAL DAYOFMONTH(?)-1 DAY) AND LAST_DAY(?)) 
                                            AND ponto_entrada > '08:20:00' AND MD5(user_id_ponto) = ?)) + 
                                        
                                    SUM((SELECT SUM(TIME_TO_SEC(TIMEDIFF(ponto_saida , '08:00:00'))) - 
                                        SUM(TIME_TO_SEC(TIMEDIFF(ponto_volta_almoco , ponto_almoco)))
                                    FROM tb_ponto 
                                    WHERE (ponto_data BETWEEN DATE_SUB(?, INTERVAL DAYOFMONTH(?)-1 DAY) 
                                        AND LAST_DAY(?)) 
                                        AND ponto_entrada <= '08:20:00' AND MD5(user_id_ponto) = ?)))
                            END
                        AS 'horas';";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $ponto_data);

                $stm->bindValue(2, $ponto_data);

                $stm->bindValue(3, $ponto_data);

                $stm->bindValue(4, $user_id_ponto);

                $stm->bindValue(5, $ponto_data);

                $stm->bindValue(6, $ponto_data);

                $stm->bindValue(7, $ponto_data);

                $stm->bindValue(8, $user_id_ponto);

                $stm->bindValue(9, $ponto_data);

                $stm->bindValue(10, $ponto_data);

                $stm->bindValue(11, $ponto_data);

                $stm->bindValue(12, $user_id_ponto);

                $stm->bindValue(13, $ponto_data);

                $stm->bindValue(14, $ponto_data);

                $stm->bindValue(15, $ponto_data);

                $stm->bindValue(16, $user_id_ponto);

                $stm->bindValue(17, $ponto_data);

                $stm->bindValue(18, $ponto_data);

                $stm->bindValue(19, $ponto_data);

                $stm->bindValue(20, $user_id_ponto);

                $stm->bindValue(21, $ponto_data);

                $stm->bindValue(22, $ponto_data);

                $stm->bindValue(23, $ponto_data);

                $stm->bindValue(24, $user_id_ponto);

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