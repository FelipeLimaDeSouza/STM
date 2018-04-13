<?php

	class EmpresasModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function retornaEmpresasDAO(){

        	try{
                
                $sql = "SELECT * FROM tb_empresas ORDER BY empresa_nome ASC;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function verificaCnpjDAO($cnpj){

            try{
                
                $sql = "SELECT empresa_cnpj FROM tb_empresas WHERE empresa_cnpj = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $cnpj);

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

        public function cadastrarEmpresaDAO($nome, $cnpj){

            try{
                
                $sql = "INSERT INTO tb_empresas(empresa_nome, empresa_cnpj) VALUES(?, ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, strtoupper($nome));

                $stm->bindValue(2, $cnpj);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

	}

?>