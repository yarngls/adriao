<?php

	namespace BenliTech\MaquinaCarpintariaController;

	class MaquinaCarpintaria{

		private $view_path;

		public function __construct(){
			$this->view_path=dirname(__FILE__).'/../views/Maquina_Carpintaria/menu_maquina_carpintaria.php';
		}

		public function maquina_carpintaria($db){
			$data_hoje = Date("Y-m-d");
			$historico_maquina = $db->query("SELECT * FROM `maquina_carpintaria` where `data_pagamento`='$data_hoje'");
			$_SESSION['historico_maquina'] = $historico_maquina;
			include $this->view_path;
		}

		public function pagamento_minuto($dados,$db){
			$data_hoje = Date("Y-m-d");
			$nome_cliente = $dados["nome_cliente"];
			$preco_minuto = $dados["preco_minuto"];
			$total_minuto = $dados["total_minuto"];
			$total_pagar = $dados["total_pagar"];
			$observacao = $dados["observacao"];

			$query = $db->query(
							"insert into maquina_carpintaria (nome_cliente,preco_minuto,
												total_minuto,total_pagar,observacao,data_pagamento) 
													values ('$nome_cliente','$preco_minuto','$total_minuto',
							 '$total_pagar','$observacao','$data_hoje');");

			echo json_encode(["resposta"=>"sucesso"]);
			
		}


		public function persquisar_pagamento_maquina($data_pesquisa,$db){
			$dados_pagamento_maquina = $db->query("SELECT * FROM `maquina_carpintaria` where `data_pagamento`='$data_pesquisa'");
			//$stock=$dados[0]['stock'];
			$_SESSION['dados_pagamento_maquina'] = $dados_pagamento_maquina;
			$views_dados_pagamento=dirname(__FILE__).'/../views/Maquina_Carpintaria/pesquisar_pagamento_maquina.php';			
			include $views_dados_pagamento;	
			//echo json_encode(["value"=>$dados]);
			
		}

		
	}


?>

