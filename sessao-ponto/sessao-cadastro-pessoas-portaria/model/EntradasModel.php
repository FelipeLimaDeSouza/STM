<?php

	class EntradasModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function retornaEntradasDAO(){

        	try{
                
                $sql = "SELECT * FROM (SELECT ent.entrada_data_entrada, pes.pessoa_nome, pes.pessoa_rg, pes.pessoa_cpf, emp.empresa_nome, fun.funcionario_nome, ent.entrada_hora_entrada, ent.entrada_hora_saida, ent.entrada_data_saida, usu.usuario_nome, pes.pessoa_id, ent.entrada_id FROM tb_entradas ent INNER JOIN tb_pessoas pes ON pes.pessoa_id = ent.pessoa_id_entrada INNER JOIN tb_pessoas_empresas pesemp ON pesemp.pessoa_id_empresa = pes.pessoa_id INNER JOIN tb_empresas emp ON emp.empresa_id = pesemp.empresa_id_pessoa INNER JOIN tb_funcionarios fun ON fun.funcionario_id = ent.funcionario_id_entrada INNER JOIN tb_usuarios usu ON usu.usuario_id = ent.usuario_id_entrada WHERE ent.entrada_status = 0 UNION SELECT ent.entrada_data_entrada, pes.pessoa_nome, pes.pessoa_rg, pes.pessoa_cpf, emp.empresa_nome, fun.funcionario_nome, ent.entrada_hora_entrada, ent.entrada_hora_saida, ent.entrada_data_saida, usu.usuario_nome, pes.pessoa_id, ent.entrada_id FROM tb_entradas ent INNER JOIN tb_pessoas pes ON pes.pessoa_id = ent.pessoa_id_entrada INNER JOIN tb_pessoas_empresas pesemp ON pesemp.pessoa_id_empresa = pes.pessoa_id INNER JOIN tb_empresas emp ON emp.empresa_id = pesemp.empresa_id_pessoa INNER JOIN tb_veiculos_pessoas veipes ON veipes.pessoa_id_veiculo = pes.pessoa_id INNER JOIN tb_veiculos vei ON vei.veiculo_id = veipes.veiculo_id_pessoa INNER JOIN tb_funcionarios fun ON fun.funcionario_id = ent.funcionario_id_entrada INNER JOIN tb_usuarios usu ON usu.usuario_id = ent.usuario_id_entrada WHERE ent.entrada_status = 0) a ORDER BY entrada_id DESC";
                
                $stm = $this->pdo->prepare($sql);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function retornaEntradasAtivasDAO(){

            try{
                
                $sql = "SELECT * FROM (SELECT ent.entrada_data_entrada, pes.pessoa_nome, pes.pessoa_rg, pes.pessoa_cpf, emp.empresa_nome, fun.funcionario_nome, ent.entrada_hora_entrada, ent.entrada_hora_saida, ent.entrada_data_saida, usu.usuario_nome, pes.pessoa_id, ent.entrada_id FROM tb_entradas ent INNER JOIN tb_pessoas pes ON pes.pessoa_id = ent.pessoa_id_entrada INNER JOIN tb_pessoas_empresas pesemp ON pesemp.pessoa_id_empresa = pes.pessoa_id INNER JOIN tb_empresas emp ON emp.empresa_id = pesemp.empresa_id_pessoa INNER JOIN tb_funcionarios fun ON fun.funcionario_id = ent.funcionario_id_entrada INNER JOIN tb_usuarios usu ON usu.usuario_id = ent.usuario_id_entrada WHERE ent.entrada_status = 1 UNION SELECT ent.entrada_data_entrada, pes.pessoa_nome, pes.pessoa_rg, pes.pessoa_cpf, emp.empresa_nome, fun.funcionario_nome, ent.entrada_hora_entrada, ent.entrada_hora_saida, ent.entrada_data_saida, usu.usuario_nome, pes.pessoa_id, ent.entrada_id FROM tb_entradas ent INNER JOIN tb_pessoas pes ON pes.pessoa_id = ent.pessoa_id_entrada INNER JOIN tb_pessoas_empresas pesemp ON pesemp.pessoa_id_empresa = pes.pessoa_id INNER JOIN tb_empresas emp ON emp.empresa_id = pesemp.empresa_id_pessoa INNER JOIN tb_veiculos_pessoas veipes ON veipes.pessoa_id_veiculo = pes.pessoa_id INNER JOIN tb_veiculos vei ON vei.veiculo_id = veipes.veiculo_id_pessoa INNER JOIN tb_funcionarios fun ON fun.funcionario_id = ent.funcionario_id_entrada INNER JOIN tb_usuarios usu ON usu.usuario_id = ent.usuario_id_entrada WHERE ent.entrada_status = 1) a ORDER BY entrada_id DESC";
                
                $stm = $this->pdo->prepare($sql);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function registrarSaidaDAO($entrada_id){

            try{
                
                $sql = "UPDATE tb_entradas SET entrada_status = 0 , entrada_hora_saida = CURTIME() , entrada_data_saida = CURDATE() WHERE entrada_id = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $entrada_id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function retornaIdEntradaDAO($usuario_id){

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

        public function cadastrarEntradaDAO($pessoa_id, $funcionario_id, $usuario_id){

            try{

                $retornaId = $this->retornaIdEntradaDAO($usuario_id);

                $sql = "INSERT INTO tb_entradas(pessoa_id_entrada, funcionario_id_entrada, usuario_id_entrada, entrada_data_entrada, entrada_hora_entrada) VALUES(?, ?, ?, CURDATE(), CURTIME());";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $pessoa_id);

                $stm->bindValue(2, $funcionario_id);

                $stm->bindValue(3, $retornaId);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

	}

?>