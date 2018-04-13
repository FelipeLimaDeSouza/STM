<?php

	class HistoricoPessoal{
		
		private $model = null;
        
        public function __construct(){
            
            require_once '../utilitarios/Conexao.php';
            
            require_once '../model/PontoModel.php';
            
            $this->model = new PontoModel(Conexao::getInstance());
            
        }

        public function retornaHistoricoEspPessoal($id){
            
            return $this->model->retornaHistoricoEspPessoalDAO($id);

        }

        public function retornaHpHj($id){
            
            return $this->model->retornaHpHjDAO($id);

        }

        public function inserirPontoDia($id){
            
            return $this->model->inserirPontoDiaDAO($id);

        }

        public function inserirPontoEntrada($ponto_id){
            
            return $this->model->inserirPontoEntradaDAO($ponto_id);

        }

        public function inserirPontoAlmoco($ponto_id){
            
            return $this->model->inserirPontoAlmocoDAO($ponto_id);

        }

        public function inserirPontoVoltaAlmoco($ponto_id){
            
            return $this->model->inserirPontoVoltaAlmocoDAO($ponto_id);

        }

        public function inserirPontoSaida($ponto_id){
            
            return $this->model->inserirPontoSaidaDAO($ponto_id);

        }

        public function retornaSemanaHp($ponto_data){
            
            return $this->model->retornaSemanaHpDAO($ponto_data);

        }

	}

?>