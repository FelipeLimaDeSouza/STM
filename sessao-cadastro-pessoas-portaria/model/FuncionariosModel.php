<?php

	class FuncionariosModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function retornaFuncionariosDAO(){

        	try{
                
                $sql = "SELECT * FROM tb_funcionarios fun INNER JOIN tb_setores setor ON setor.setor_id = fun.setor_id_funcionario ORDER BY fun.funcionario_nome ASC;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function verificaFuncionarioSetorDAO($nome, $id){

            try{
                
                $sql = "SELECT * FROM tb_funcionarios WHERE funcionario_nome = ? AND setor_id_funcionario = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $nome);

                $stm->bindValue(2, $id);

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

        public function cadastrarFuncionarioDAO($nome, $id){

            try{
                
                $sql = "INSERT INTO tb_funcionarios(funcionario_nome, setor_id_funcionario) VALUES(?, ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, strtoupper($nome));

                $stm->bindValue(2, $id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

	}

?>