<?php

	class VeiculosModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function retornaVeiculosDAO(){

        	try{
                
                $sql = "SELECT * FROM tb_veiculos ORDER BY veiculo_placa ASC;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function retornaVeiculoPessoaDAO($id){

            try{
                
                $sql = "SELECT * FROM tb_veiculos vei INNER JOIN tb_veiculos_pessoas veipes ON veipes.veiculo_id_pessoa = vei.veiculo_id WHERE veipes.pessoa_id_veiculo = ?";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $id);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function verificaPlacaDAO($placa){

            try{
                
                $sql = "SELECT * FROM tb_veiculos WHERE veiculo_placa = ?";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $placa);

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

        public function cadastrarVeiculoDAO($placa){

            try{
                
                $sql = "INSERT INTO tb_veiculos(veiculo_placa) VALUES(?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, strtoupper($placa));

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

	}

?>