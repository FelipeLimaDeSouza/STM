<?php

	class PessoasModel{

		private $pdo = null;
        
        public function __construct($conexao){
            
            $this->pdo = $conexao;
            
        }

        public function retornaPessoasDAO(){

        	try{
                
                $sql = "SELECT * FROM ((SELECT * FROM tb_pessoas pes INNER JOIN tb_pessoas_empresas pesemp ON pesemp.pessoa_id_empresa = pes.pessoa_id INNER JOIN tb_empresas emp ON emp.empresa_id = pesemp.empresa_id_pessoa) UNION (SELECT * FROM tb_pessoas pes INNER JOIN tb_pessoas_empresas pesemp ON pesemp.pessoa_id_empresa = pes.pessoa_id INNER JOIN tb_empresas emp ON emp.empresa_id = pesemp.empresa_id_pessoa WHERE (pes.pessoa_id IN (SELECT veipes.pessoa_id_veiculo FROM tb_veiculos_pessoas veipes)))) a ORDER BY pessoa_nome ASC";
                
                $stm = $this->pdo->prepare($sql);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                return $dados;
                
            }catch(PDOException $erro){
                
                echo $erro->getLine();
                
            }

        }

        public function retornaPessoaDAO($rg, $cpf){

            try{
                
                $sql = "SELECT pessoa_id FROM tb_pessoas WHERE pessoa_rg = ? OR pessoa_cpf = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $rg);

                $stm->bindValue(2, $cpf);

                $stm->execute();

                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                $id = null;

                foreach ($dados as $reg) {
                    
                    $id = $reg->pessoa_id;

                }

                return $id;

            }catch(PDOException $erro){
                
                return null;
                
            }

        }

        public function verificaPessoaDAO($nome, $empresa_id, $rg, $cpf){

            try{

                $sql = "(SELECT pessoa_id FROM tb_pessoas WHERE pessoa_rg = ? OR pessoa_cpf = ?) UNION (SELECT pessoa_id FROM tb_pessoas INNER JOIN tb_pessoas_empresas ON pessoa_id_empresa = pessoa_id INNER JOIN tb_empresas ON empresa_id = empresa_id_pessoa WHERE pessoa_nome = ? AND empresa_id = ?);";

                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $rg);

                $stm->bindValue(2, $cpf);

                $stm->bindValue(3, $nome);

                $stm->bindValue(4, $empresa_id);

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

        public function cadastrarPessoaDAO($nome, $empresa_id, $veiculo_id, $pessoa_rg, $pessoa_cpf){

            try{

                $sql = "";

                $stm = "";

                if(($pessoa_rg != null) && ($pessoa_cpf != null)){
                
                    $sql = "INSERT INTO tb_pessoas(pessoa_nome, pessoa_rg, pessoa_cpf) VALUES(?, ?, ?);";

                    $stm = $this->pdo->prepare($sql);

                    $stm->bindValue(1, strtoupper($nome));

                    $stm->bindValue(2, strtoupper($pessoa_rg));

                    $stm->bindValue(3, $pessoa_cpf);
                
                }elseif (($pessoa_rg == null) && ($pessoa_cpf != null)) {
                    
                    $sql = "INSERT INTO tb_pessoas(pessoa_nome, pessoa_cpf) VALUES(?, ?);";

                    $stm = $this->pdo->prepare($sql);

                    $stm->bindValue(1, strtoupper($nome));

                    $stm->bindValue(2, $pessoa_cpf);

                }elseif (($pessoa_rg != null) && ($pessoa_cpf == null)) {
                    
                    $sql = "INSERT INTO tb_pessoas(pessoa_nome, pessoa_rg) VALUES(?, ?);";

                    $stm = $this->pdo->prepare($sql);

                    $stm->bindValue(1, strtoupper($nome));

                    $stm->bindValue(2, strtoupper($pessoa_rg));

                }

                $stm->execute();
                
                $id = $this->retornaPessoaDAO($pessoa_rg, $pessoa_cpf);

                if($id != null){

                    

                    $retorna = $this->cadastrarPessoaEmpresa($id, $empresa_id);

                    if($retorna == true){

                        $retorna = $this->cadastrarVeiculoPessoa($id, $veiculo_id);

                        if($retorna == true){

                            return true;

                        }else{

                            return false;

                        }

                    }else{

                        return false;

                    }

                }else{

                    return false;

                }
                
            }catch(PDOException $erro){

                return false;
                
            }

        }

        public function cadastrarPessoaSemVeiculoDAO($nome, $empresa_id, $pessoa_rg, $pessoa_cpf){

            try{
                
                $sql = "INSERT INTO tb_pessoas(pessoa_nome, pessoa_rg, pessoa_cpf) VALUES(?, ?, ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, strtoupper($nome));

                $stm->bindValue(2, strtoupper($pessoa_rg));

                $stm->bindValue(3, $pessoa_cpf);

                if($stm->execute()){

                    $id = $this->retornaPessoaDAO($pessoa_rg, $pessoa_cpf);

                    if($id != null){

                        $retorna = $this->cadastrarPessoaEmpresa($id, $empresa_id);

                        if($retorna == true){

                            return true;

                        }else{

                            return false;

                        }

                    }else{

                        return false;

                    }

                }else{

                    return false;

                }
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function cadastrarPessoaEmpresa($pessoa_id, $empresa_id){
            
            try{
                
                $sql = "INSERT INTO tb_pessoas_empresas(pessoa_id_empresa, empresa_id_pessoa) VALUES(?, ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $pessoa_id);

                $stm->bindValue(2, $empresa_id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function cadastrarVeiculoPessoa($pessoa_id, $veiculo_id){
            
            try{
                
                $sql = "INSERT INTO tb_veiculos_pessoas(pessoa_id_veiculo, veiculo_id_pessoa) VALUES(?, ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $pessoa_id);

                $stm->bindValue(2, $veiculo_id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function alterarEmpresaDAO($empresa_id, $pessoa_id){
            
            try{
                
                $sql = "UPDATE tb_pessoas_empresas SET empresa_id_pessoa = ? WHERE pessoa_id_empresa = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $empresa_id);

                $stm->bindValue(2, $pessoa_id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function alterarVeiculoDAO($veiculo_id, $pessoa_id){
            
            try{
                
                $sql = "UPDATE tb_veiculos_pessoas SET veiculo_id_pessoa = ? WHERE pessoa_id_veiculo = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $veiculo_id);

                $stm->bindValue(2, $pessoa_id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function inserirVeiculoDAO($veiculo_id, $pessoa_id){
            
            try{
                
                $sql = "INSERT INTO tb_veiculos_pessoas(veiculo_id_pessoa, pessoa_id_veiculo) VALUES(?, ?);";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $veiculo_id);

                $stm->bindValue(2, $pessoa_id);

                $stm->execute();

                return true;
                
            }catch(PDOException $erro){
                
                return false;
                
            }

        }

        public function validaVeiculoDAO($pessoa_id){

            try{
                
                $sql = "SELECT * FROM tb_veiculos_pessoas WHERE pessoa_id_veiculo = ?;";
                
                $stm = $this->pdo->prepare($sql);

                $stm->bindValue(1, $pessoa_id);

                $stm->execute();

                $rows = $stm->rowCount();

                if($rows == 0){

                    return true;

                }else{

                    return false;

                }

            }catch(PDOException $erro){
                
                return null;
                
            }

        }

	}

?>