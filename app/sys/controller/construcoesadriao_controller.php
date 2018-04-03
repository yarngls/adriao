<?php

	namespace BenliTech\ConstrucoesAdriaoController;

	class ConstrucoesAdriao{

		private $view_path;

		public function gestao_dividas($db){


			$data_hoje = Date("Y-m-d");
			$array_divida_acumulada=[];
			$historico_dividas = $db->query("SELECT id_devedor FROM `dividas_construcoes_adriao` where `estado_divida`='pendente' group by id_devedor;");
			$contador=count($historico_dividas);
			for($c=0;$c<$contador=count($historico_dividas);$c++){
				$id_devedor=$historico_dividas[$c]['id_devedor'];
				$divida_acumulada = $db->query("SELECT SUM(montante_divida) as total_acumulada,nome_devedor, id_devedor FROM `dividas_construcoes_adriao` where id_devedor='$id_devedor' and estado_divida='pendente';");
				$array_divida_acumulada[]=$divida_acumulada;
			}
			$_SESSION['query_select_dividas'] = $array_divida_acumulada;

			$this->view_path=dirname(__FILE__).'/../views/Construcoes_Adriao/gestao_dividas.php';
			include $this->view_path;
		}

		public function registar_divida($db,$dados){
			$id_devedor=$dados["id_devedor"];
			$nome_devedor=$dados["nome_devedor"];
			$descricao_divida=$dados["descricao_divida"];
			$montante_divida=$dados["montante_divida"];
			$responsavel_divida=$dados["responsavel_divida"];
			$observacao_divida=$dados["observacao_divida"];
			$data_divida=date("Y-m-d");

			if($id_devedor==""){
				$id_devedor=$data_divida.$nome_devedor;
			}else{
				$id_devedor=$dados["id_devedor"];
			}

			$query_registar_divida=$db->query("INSERT INTO dividas_construcoes_adriao (id_devedor,nome_devedor,
											  descricao_divida,montante_divida,responsavel_divida,observacao_divida,
											  estado_divida,data_divida,divida_inicial)values('$id_devedor','$nome_devedor',
											  '$descricao_divida','$montante_divida','$responsavel_divida','$observacao_divida',
											  'pendente','$data_divida','$montante_divida');");
			$query_select_dividas=$db->query("SELECT * FROM dividas_construcoes_adriao;");

			$gestao_dividas= new ConstrucoesAdriao;
			$gestao_dividas->gestao_dividas($db);

			$_SESSION["query_select_dividas"]=$query_select_dividas;



			
		}

		public function dividas_do_cliente($db,$dados){
			$id_devedor=$dados["id_devedor"];
			$nome_devedor=$dados["nome_devedor"];

			$query_divida=$db->query("SELECT *FROM `dividas_construcoes_adriao` where id_devedor='$id_devedor' and estado_divida='pendente';");
			$_SESSION['dividas_um_cliente_construcoes'] = $query_divida;
			$listagem_dividas_do_cliente=dirname(__FILE__).'/../views/Construcoes_Adriao/listagem_dividas_do_cliente_construcoes.php';			
			include $listagem_dividas_do_cliente;
			//echo json_encode(["value"=>$query_divida]);
		}
		
		public function efetuar_pagamento_devedor_construcao($db,$dados){
			$id_divida_pesquisada=$dados["id_divida_pesquisada"];
			$verificar_pagamentos=$db->query("SELECT *from pagamento_construcao_adriao where id_divida='$id_divida_pesquisada';");

			$_SESSION['dados_pagamento']=$dados;
			$_SESSION['historico_pagamento']=$verificar_pagamentos;
			$form_efetuar_pagamento_normal=dirname(__FILE__).'/../views/Construcoes_Adriao/form_efetuar_pagamento_normal.php';			
			include $form_efetuar_pagamento_normal;
			
		}

		public function ordem_pagamento($db,$dados_pagamento){

			//$nome_cliente_pagamento=$dados_pagamento["nome_cliente_pagamento"];
			//$descricao_da_divida_pagamento=$dados_pagamento["descricao_da_divida_pagamento"];
			$numero_recibo_pagamento=$dados_pagamento["numero_recibo_pagamento"];
			$montante_em_divida=$dados_pagamento["montante_em_divida"];
			$montante_a_pagar_pagamento=$dados_pagamento["montante_a_pagar_pagamento"];
			$tipo_pagamento=$dados_pagamento["tipo_pagamento"];
			$numero_doc_banco=$dados_pagamento["numero_doc_banco"];
			$id_devedor_pesquisada=$dados_pagamento["id_devedor_pesquisada"];
			$id_divida_pesquisada=$dados_pagamento["id_divida_pesquisada"];
			$date_pagamento= date('Y-m-d');

			$saldo_por_pagar=$montante_em_divida-$montante_a_pagar_pagamento;			
			if($saldo_por_pagar==0){
				
				$query_actuaizar_divida=$db->query("UPDATE dividas_construcoes_adriao set montante_divida='$saldo_por_pagar',
													estado_divida='liquidado' where id_dividas='$id_divida_pesquisada';");
					$query_registar_pagamento=$db->query("INSERT INTO pagamento_construcao_adriao (id_divida,id_devedor,
														numero_recibo_pagamento,montante_a_pagar_pagamento,tipo_pagamento,
														numero_doc_banco,data_pagamento)values('$id_divida_pesquisada','$id_devedor_pesquisada',
												  		'$numero_recibo_pagamento','$montante_a_pagar_pagamento',
												  		'$tipo_pagamento','$numero_doc_banco','$date_pagamento');");
					echo json_encode(["sucesso"=>"sucesso"]);
				
			}else{
				$query_actuaizar_divida=$db->query("UPDATE dividas_construcoes_adriao set montante_divida='$saldo_por_pagar'
													 where id_dividas='$id_divida_pesquisada';");
					$query_registar_pagamento=$db->query("INSERT INTO pagamento_construcao_adriao (id_divida,id_devedor,
														numero_recibo_pagamento,montante_a_pagar_pagamento,tipo_pagamento,
														numero_doc_banco,data_pagamento)values('$id_divida_pesquisada','$id_devedor_pesquisada',
												  		'$numero_recibo_pagamento','$montante_a_pagar_pagamento',
												  		'$tipo_pagamento','$numero_doc_banco','$date_pagamento');");
					echo json_encode(["sucesso"=>"sucesso"]);
			}


		}
		
		
	}


?>

