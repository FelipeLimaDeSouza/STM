<?php

	class SetoresModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function retornaSetoresDAO(){

        	try{
                
                $sql = "SELECT * FROM tb_setores ORDER BY setor_nome ASC;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function retornaSetorIdDAO($id){

            try{
                
                $sql = "SELECT * FROM tb_setores WHERE setor_id = ?";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function verificaNomeDAO($nome){

            try{
                
                $sql = "SELECT * FROM tb_setores WHERE setor_nome = ?";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nome);

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

        public function cadastrarSetorDAO($nome){

            try{
                
                $sql = "INSERT INTO tb_setores(setor_nome) VALUES(?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, strtoupper($nome));

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

	}

?>