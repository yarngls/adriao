<?php

	namespace BenliTech\DrogariaController;

	class Drogaria{

		private $view_path;

		public function __construct(){
			$this->view_path=dirname(__FILE__).'/../views/Drogaria/menu_drogaria.php';
		}

		public function drogaria($categoria,$db){
			$dados_stock = $db->query("SELECT * FROM `produto` where `categoria`='$categoria'");
			//$stock=$dados[0]['stock'];
			$_SESSION['dados_stock'] = $dados_stock;
			include $this->view_path;
		}

		public function stock_produto($categoria,$db){
			$dados_stock = $db->query("SELECT * FROM `produto` where `categoria`='$categoria'");
			//$stock=$dados[0]['stock'];
			$_SESSION['dados_stock'] = $dados_stock;
			$_SESSION['categoria_impremir']=$categoria;
			$views_stock_produto=dirname(__FILE__).'/../views/Drogaria/stock_produto.php';			
			include $views_stock_produto;		
			
		}



		public function maquina_carpintaria($db){
			$data_hoje = Date("Y-m-d");
			$historico_maquina = $db->query("SELECT * FROM `maquina_carpintaria` where `data_pagamento`='$data_hoje'");
			$_SESSION['historico_maquina'] = $historico_maquina;
			$maquina_carp=dirname(__FILE__).'/../views/Drogaria/menu_maquina_carpintaria.php';
			include $maquina_carp;
		}



		public function form_update_stock($id_produto,$db){
			$dados_update = $db->query("SELECT * FROM `produto` where `id_produto`='$id_produto'");
			//$stock=$dados[0]['stock'];
			$_SESSION['dados_update'] = $dados_update;
			$views_stock_produto=dirname(__FILE__).'/../views/Drogaria/form_update_stock.php';			
			include $views_stock_produto;	
			//echo json_encode(["value"=>$dados]);
			
		}

		/*public function stock_carp($db){
			$dados = $db->query("SELECT * FROM `produto` where `categoria`='carpintaria'");
			//$stock=$dados[0]['stock'];
			$_SESSION['dados'] = $dados;
			$views_stock_elect=dirname(__FILE__).'/../views/Drogaria/stock_elect.php';			
			include $views_stock_elect;		
			
		}*/

		public function form_registo_stock(){
			$form_registo_stock=dirname(__FILE__).'/../views/Drogaria/form_registo_stock.php';
			include $form_registo_stock;
		}

		public function registar_stock($dados,$db){
			$designacao = $dados["designacao"];
			$referencia = $dados["referencia"];
			$quantidade = $dados["quantidade"];
			$nome_fornecedor = $dados["nome_fornecedor"];
			$preco_compra = $dados["preco_compra"];
			$preco_venda = $dados["preco_venda"];
			$categoria = $dados["categoria"];

			$query = $db->query(
							"insert into produto (designacao,referencia,quantidade,nome_fornecedor,preco_compra,preco_venda,
							 categoria) values ('$designacao','$referencia','$quantidade',
							 '$nome_fornecedor','$preco_compra','$preco_venda','$categoria');");

			echo json_encode(["sucesso"=>"sucesso"]);
			
		}

		public function atualizar_stock($dados,$db){
			$id_produto = $dados["id_produto"];
			$designacao = $dados["designacao"];
			$referencia = $dados["referencia"];
			$quantidade = $dados["quantidade"];
			$preco_compra = $dados["preco_compra"];
			$preco_venda = $dados["preco_venda"];
			$categoria = $dados["categoria"];

			$query = $db->query(
							"update produto set designacao = '$designacao',referencia='$referencia',
												quantidade = '$quantidade',preco_compra='$preco_compra',
												preco_venda = '$preco_venda',categoria='$categoria' 
												where id_produto = '$id_produto';");

			echo json_encode(["resposta"=>$query]);
			
		}

		public function form_nova_entrada($id_produto,$db){
			$dados_produto = $db->query("SELECT * FROM `produto` where `id_produto`='$id_produto'");
			$_SESSION['dados_produto'] = $dados_produto;
			$form_nova_entrada=dirname(__FILE__).'/../views/Drogaria/form_nova_entrada.php';			
			include $form_nova_entrada;	
			//echo json_encode(["value"=>$dados]);
		}

		public function listar_designacao_produtos($designacao,$db){
			$designacao_produtos= $db->query("SELECT designacao FROM `produto` where `designacao` like'%$designacao%'");
					
			echo json_encode(["resultado"=>$designacao_produtos]);
		}

		public function listar_referencia_produto($designacao_inserida,$db){
			$referencia_produto= $db->query("SELECT referencia FROM `produto` where `designacao` like'%$designacao_inserida%'");
					
			echo json_encode(["resultado"=>$referencia_produto]);
		}

		public function listar_preco_stock($designacao_para_stock,$referencia_para_stock,$db){
			$dados_produto= $db->query("SELECT quantidade, preco_venda,id_produto FROM `produto` where `designacao` = '$designacao_para_stock' and `referencia` = '$referencia_para_stock'");
					
			echo json_encode(["resultado"=>$dados_produto]);
		}

		public function form_vendas(){
			$form_vendas=dirname(__FILE__).'/../views/Drogaria/form_vendas.php';			
			include $form_vendas;	
			//echo json_encode(["value"=>$dados]);
		}

		public function registar_nova_entrada($dados,$db){
			//$dados_produto = $db->query("SELECT * FROM `produto` where `id_produto`='$id_produto'");
			//$_SESSION['dados_produto'] = $dados_produto;
			$designacao=$dados["designacao"];
			$referencia=$dados["referencia"];
			$quantidade = $dados["quantidade"];
			$preco_venda = $dados["preco_venda"];
			$categoria = $dados["categoria"];
			$nome_fornecedor = $dados["nome_fornecedor"];
			$preco_fornecedor = $dados["preco_fornecedor"];
			$quantidade_fornecida = $dados["quantidade_entrada"];
			$stock_actual = $dados["stock_actual"];
			$id_produto = $dados["id_produto"];	

			$data_entrada = Date("Y-m-d");

			$query = $db->query(
							"update produto set quantidade = '$stock_actual' where id_produto = '$id_produto';");

			
			$registar_fornecedor = $db->query(
							"insert into fornecedor (nome_fornecedor,preco_fornecedor,quantidade_fornecida,
													 data_entrada,id_produto) values ('$nome_fornecedor','$preco_fornecedor',
													 '$quantidade_fornecida','$data_entrada','$id_produto');");

			$registar_fornecedor = $db->query(
							"insert into entrada_produto (id_produto,stock_encontrada,quantidade_entrada,stock_actualizado,
													 fornecedor,data) values ('$id_produto','$quantidade',
													 '$quantidade_fornecida','$stock_actual','$nome_fornecedor','$data_entrada');");

			echo json_encode(["resposta"=>"sucesso"]);
		}


		public function historico_produto($id_produto,$designacao_produto,$referencia_produto,$db){
			//$dados_produto = $db->query("SELECT * FROM `produto` where `id_produto`='$id_produto'");
			$_SESSION['id_produto_historico'] = $id_produto;
			$_SESSION['designacao_produto_historico'] = $designacao_produto;
			$_SESSION['referencia_produto_historico'] = $referencia_produto;
			$historico_produto=dirname(__FILE__).'/../views/Drogaria/historico_produto.php';			
			include $historico_produto;	
			//echo json_encode(["value"=>$dados]);
		}

		public function historico_vendas_produto($id_produto,$db){
			$dados_historico_vendas_produto = $db->query("SELECT * FROM `venda` where `id_produto_vendido`='$id_produto'");
			$_SESSION['historico_vendas_produto'] = $dados_historico_vendas_produto;
			$historico_vendas_produto=dirname(__FILE__).'/../views/Drogaria/historico_vendas_produto.php';			
			include $historico_vendas_produto;	
			//echo json_encode(["value"=>$dados]);
		}

		public function historico_requisicoes_drogaria($id_produto,$db){
			$dados_historico_requisicoes_produto = $db->query("SELECT * FROM `requisicoes` where `id_produto_requisitado`='$id_produto'");
			$_SESSION['historico_requisicoes'] = $dados_historico_requisicoes_produto;
			$historico_requisicoes_produto=dirname(__FILE__).'/../views/Drogaria/historico_requisicoes_drogaria.php';			
			include $historico_requisicoes_produto;	
			//echo json_encode(["value"=>$dados]);
		}

		public function historico_entradas_produto($id_produto,$db){
			$dados_historico_entradas_produto = $db->query("SELECT * FROM `entrada_produto` where `id_produto`='$id_produto'");
			$_SESSION['dados_historico_entradas_produto'] = $dados_historico_entradas_produto;
			$historico_entradas_produto=dirname(__FILE__).'/../views/Drogaria/historico_entradas_produto.php';			
			include $historico_entradas_produto;	
			//echo json_encode(["value"=>$dados]);
		}

		public function historico_fornecedores_produto($id_produto,$db){
			$dados_historico_fornecedores_produto = $db->query("SELECT * FROM `fornecedor` where `id_produto`='$id_produto'");
			$_SESSION['dados_historico_fornecedores_produto'] = $dados_historico_fornecedores_produto;
			$historico_fornecedores_produto=dirname(__FILE__).'/../views/Drogaria/historico_fornecedores_produto.php';			
			include $historico_fornecedores_produto;	
			//echo json_encode(["value"=>$dados]);
		}



		public function vendas($dados,$db){
			//$dados_produto = $db->query("SELECT * FROM `produto` where `id_produto`='$id_produto'");
			//$_SESSION['dados_produto'] = $dados_produto;
			$nome_cliente=$dados["nome_cliente"];
			$designacao_produto=$dados["designacao_produto"];
			$referencia_produto = $dados["referencia_produto"];
			$preco_unitario = $dados["preco_unitario"];
			$quantidade_stock = $dados["quantidade_stock"];
			$quantidade_a_comprar = $dados["quantidade_a_comprar"];
			$total_a_pagar = $dados["total_a_pagar"];
			$observacoes = $dados["observacoes"];
			$id_produto_vendido = $dados["id_produto_vendido"];



			$data_venda = Date("Y-m-d");

			$stock_actualizado = $quantidade_stock-$quantidade_a_comprar;

			$query = $db->query(
							"update produto set quantidade = '$stock_actualizado' where id_produto = '$id_produto_vendido';");

			
			$registar_vendas = $db->query(
							"insert into venda (nome_cliente,designacao_produto,referencia_produto,
								                preco_unitario,quantidade_a_comprar,total_a_pagar,observacoes,data_venda,id_produto_vendido)
								                 values ('$nome_cliente','$designacao_produto','$referencia_produto',
													 '$preco_unitario','$quantidade_a_comprar','$total_a_pagar',
													 '$observacoes','$data_venda','$id_produto_vendido');");

			/*$registar_fornecedor = $db->query(
							"insert into entrada_produto (id_produto,stock_encontrada,quantidade_entrada,stock_actualizado,
													 fornecedor,data) values ('$id_produto','$quantidade',
													 '$quantidade_fornecida','$stock_actual','$nome_fornecedor','$data_entrada');");
			*/
			echo json_encode(["sucesso"=>'sucesso']);
		}


		public function historico_vendas($db){

			$data_hoje = Date("Y-m-d");

			$historico_vendas = $db->query("SELECT * FROM `venda` where `data_venda`='$data_hoje'");
			$_SESSION['historico_vendas'] = $historico_vendas;
			$pagina_historico_vendas=dirname(__FILE__).'/../views/Drogaria/historico_vendas.php';			
			include $pagina_historico_vendas;
			//echo json_encode(["value"=>$historico_vendas]);

		}

		public function historico_requisicoes($db){

			$data_hoje = Date("Y-m-d");

			$historico_requisicoes = $db->query("SELECT * FROM `requisicoes` group by id_requisitor");
			$_SESSION['historico_requisicoes'] = $historico_requisicoes;
			$pagina_historico_requisicoes=dirname(__FILE__).'/../views/Drogaria/historico_requisicoes.php';			
			include $pagina_historico_requisicoes;
			//echo json_encode(["value"=>$historico_vendas]);

		}

		

		public function pesquisa_venda($data_pesquisa,$db){

			
			$historico_vendas = $db->query("SELECT * FROM `venda` where `data_venda`='$data_pesquisa'");
			$_SESSION['historico_vendas'] = $historico_vendas;			
			$historico_vendas_drogaria=dirname(__FILE__).'/../views/Drogaria/historico_vendas_drogaria.php';			
			include $historico_vendas_drogaria;	
			//echo json_encode(["value"=>$dados]);

		}
		public function data_de_hoje($db){

			$data_hoje = Date("Y-m-d");
			
			echo json_encode(["data_hoje"=>$data_hoje]);

		}





		public function registar_requisicao($dados,$db){
			//$dados_produto = $db->query("SELECT * FROM `produto` where `id_produto`='$id_produto'");
			//$_SESSION['dados_produto'] = $dados_produto;
			
			$id_requisitor=$dados["id_requisitor"];
			$destino_produto=$dados["destino_produto"];
			$designacao_produto=$dados["designacao_produto"];
			$referencia_produto = $dados["referencia_produto"];
			$quantidade_stock = $dados["quantidade_stock"];
			$quantidade_produto = $dados["quantidade_produto"];
			$categoria = $dados["categoria"];
			$responsavel = $dados["responsavel"];
			$observacao = $dados["observacoes"];
			$id_produto_requisitado = $dados["id_produto_requisitado"];



			$data_requisicao = Date("Y-m-d");

			$stock_actualizado = $quantidade_stock-$quantidade_produto;

			if($id_requisitor==""){
				$id_requisitor=$data_requisicao.$destino_produto;
			

				$query = $db->query(
							"update produto set quantidade = '$stock_actualizado' where id_produto = '$id_produto_requisitado';");

			
				$registar_requisicao = $db->query(
								"insert into requisicoes (id_requisitor,destino_produto,designacao_produto,referencia_produto,
									                quantidade_produto,categoria,responsavel,observacao,data,id_produto_requisitado)
									                 values ('$id_requisitor','$destino_produto','$designacao_produto','$referencia_produto',
														 '$quantidade_produto','$categoria','$responsavel',
														 '$observacao','$data_requisicao','$id_produto_requisitado');");
				echo json_encode(["value"=>"registado com sucesso"]);
				
			}else{
				$query = $db->query(
							"update produto set quantidade = '$stock_actualizado' where id_produto = '$id_produto_requisitado';");

			
				$registar_requisicao = $db->query(
								"insert into requisicoes (id_requisitor,destino_produto,designacao_produto,referencia_produto,
									                quantidade_produto,categoria,responsavel,observacao,data,id_produto_requisitado)
									                 values ('$id_requisitor','$destino_produto','$designacao_produto','$referencia_produto',
														 '$quantidade_produto','$categoria','$responsavel',
														 '$observacao','$data_requisicao','$id_produto_requisitado');");
				echo json_encode(["value"=>"registado com sucesso"]);
			}
			
		}


		


		public function persquisar_requisicoes($data_pesquisa,$db){

			
			$historico_requisicoes = $db->query("SELECT * FROM `requisicoes` where `data`='$data_pesquisa'");
			$_SESSION['historico_requisicoes'] = $historico_requisicoes;			
			$historico_requisicoes_drogaria=dirname(__FILE__).'/../views/Drogaria/historico_requisicoes_drogaria.php';			
			include $historico_requisicoes_drogaria;	
			//echo json_encode(["value"=>$dados]);

		}

		public function listagem_requisicoes_requisitor($dados,$db){
			$id_requisitor=$dados["id_requisitor"];
			$select_history_requisicoes=$db->query("SELECT * from `requisicoes` where id_requisitor='$id_requisitor';");
			
			$_SESSION['history_requisicoes_cliente']=$select_history_requisicoes;
			$listagem_requisicoes_do_cliente=dirname(__FILE__).'/../views/Drogaria/listagem_requisicoes_do_cliente.php';
			include $listagem_requisicoes_do_cliente;
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
			$views_dados_pagamento=dirname(__FILE__).'/../views/Drogaria/pesquisar_pagamento_maquina.php';			
			include $views_dados_pagamento;	
			//echo json_encode(["value"=>$dados]);
			
		}

		/* --------------------- inicio funcoes dividas ------------------------------------------------- */


		public function historico_dividas($db){

			$data_hoje = Date("Y-m-d");
			$array_divida_acumulada=[];
			$historico_dividas = $db->query("SELECT id_devedor FROM `dividas` where `estado_divida`='pendente' group by id_devedor;");
			$contador=count($historico_dividas);
			for($c=0;$c<$contador=count($historico_dividas);$c++){
				$id=$historico_dividas[$c]['id_devedor'];
				$divida_acumulada = $db->query("SELECT SUM(total_divida) as total_acumulada,nome_devedor, id_devedor FROM `dividas` where id_devedor='$id' and estado_divida='pendente';");
				$array_divida_acumulada[]=$divida_acumulada;
			}
			$_SESSION['array_divida_acumulada'] = $array_divida_acumulada;
			$pagina_historico_dividas=dirname(__FILE__).'/../views/Drogaria/historico_dividas.php';			
			include $pagina_historico_dividas;
			//echo json_encode(["value"=>$array_divida_acumulada[0][0]['nome_devedor']]);

		}


		public function persquisar_divida($data_divida,$db){

			
			$historico_dividas_pesquisada = $db->query("SELECT * FROM `dividas` where `data_divida`='$data_divida' and estado_divida='pendente';");
			$_SESSION['historico_dividas_pesquisada'] = $historico_dividas_pesquisada;			
			$historico_dividas_drogaria=dirname(__FILE__).'/../views/Drogaria/historico_dividas_drogaria.php';			
			include $historico_dividas_drogaria;	
			//echo json_encode(["value"=>$dados]);

		}



		public function registar_divida($dados,$db){
			
			$data_divida = Date("Y-m-d");


			$nome_devedor=$dados["destino_produto_dividas"];
			$id_devedor=$dados["id_devedor_divida"];
			$designacao_produto=$dados["designacao_produto_dividas"];
			$referencia_produto = $dados["referencia_produto_dividas"];
			$quantidade_stock_dividas = $dados["quantidade_stock_dividas"];
			$quantidade_divida= $dados["quantidade_produto_dividas"];
			$preco_unitario = $dados["preco_unitario_prod_divida"];
			$categoria_produto = $dados["categoria_dividas"];
			$responsavel_divida = $dados["responsavel_divida"];
			$data_divida = $data_divida;
			$observacao_divida = $dados["observacoes_divida"];
			$id_produto_divida = $dados["id_produto_divida"];
			$total_divida=$quantidade_divida*$preco_unitario;
			if($id_devedor==""){
				$id_devedor=$data_divida.$nome_devedor;
				
			}else{
				$id_devedor=$dados["id_devedor_divida"];
			}




			$stock_actualizado = $quantidade_stock_dividas-$quantidade_divida;

			$query = $db->query(
							"update produto set quantidade = '$stock_actualizado' where id_produto = '$id_produto_divida';");
			
			
			$registar_requisicao = $db->query(
							"insert into dividas (nome_devedor,id_devedor,designacao_produto,referencia_produto,
								                quantidade_divida,preco_unitario,categoria_produto,responsavel_divida,data_divida,observacao_divida,id_produto_divida,total_divida,estado_divida)
								                 values ('$nome_devedor','$id_devedor','$designacao_produto','$referencia_produto',
													 '$quantidade_divida','$preco_unitario','$categoria_produto',
													 '$responsavel_divida','$data_divida','$observacao_divida','$id_produto_divida','$total_divida','pendente');");

			echo json_encode(["sucesso"=>"sucesso"]);
		}

		public function listagem_dividas_do_cliente($dados,$db){
			$id_devedor_histotico_divida=$dados["id_devedor_histotico_divida"];
			$nome_devedor_histotico_divida=$dados["nome_devedor_histotico_divida"];

			$query_divida=$db->query("SELECT *FROM `dividas` where id_devedor='$id_devedor_histotico_divida' and estado_divida='pendente';");
			$_SESSION['dados_dividas_um_cliente'] = $query_divida;
			$listagem_dividas_do_cliente=dirname(__FILE__).'/../views/Drogaria/listagem_dividas_do_cliente.php';			
			include $listagem_dividas_do_cliente;
			//echo json_encode(["value"=>$query_divida]);
		}


		public function efetuar_pagamento_devedor($dados,$db){
			$id_dividas=$dados["id_divida_pesquisada"];

			$nome_cliente=$dados["nome_devedor_pesquisada"];
			$designacao_produto=$dados["designacao_divida_pesquisada"];
			$referencia_produto=$dados["referencia_devedor_pesquisada"];
			$preco_unitario=$dados["preco_devedor_pesquisada"];
			$quantidade_a_comprar=$dados["quantidade_divida_pesquisada"];
			$total_a_pagar=$dados["total_divida_pesquisada"];
			$observacoes="pagamento de uma divida";
			$data_venda=date("Y-m-d");
			$id_produto_vendido=$dados["id_produto_divida_pesquisada"];

			$count_rows_before=$db->query("SELECT * FROM `venda`;");
			$count_before=count($count_rows_before);

			$query=$db->query("insert into venda (nome_cliente,designacao_produto,referencia_produto,
								                preco_unitario,quantidade_a_comprar,total_a_pagar,observacoes,data_venda,id_produto_vendido)
								                 values ('$nome_cliente','$designacao_produto','$referencia_produto',
													 '$preco_unitario','$quantidade_a_comprar','$total_a_pagar',
													 '$observacoes','$data_venda','$id_produto_vendido');");


			$count_rows_after=$db->query("SELECT * FROM `venda`;");
			$count_after=count($count_rows_after);

			if($count_after>$count_before){
				$query_liquidar_divida=$db->query("UPDATE dividas set `estado_divida`='liquidado' where id_dividas='$id_dividas';");
				echo json_encode(["sucesso"=>"Registado com sucesso"]);
			}else{
				echo json_encode(["value"=>"Divida não foi registada"]);
			}
			

		}

		/* --------------------- fim funcoes de dividas ------------------------------------------------- */



		/* --------------------- inicio funcoes de obra ------------------------------------------------- */


		public function form_registar_obra(){			
			$form_registar_obra=dirname(__FILE__).'/../views/Drogaria/form_registar_obra.php';			
			include $form_registar_obra;			
		}

		public function registar_obra($dados,$db){
			$dono_da_obra=$dados["dono_da_obra"];
			$nome_da_obra=$dados["nome_da_obra"];
			$tempo_execucao = $dados["tempo_execucao"];
			$data_inicio_obra = $dados["data_inicio_obra"];
			$data_fim_obra = $dados["data_fim_obra"];
			$responsavel_da_obra = $dados["responsavel_da_obra"];
			$nome_acesso = $dados["nome_acesso"];
			$codigo_acesso = $dados["codigo_acesso"];



			$data_requisicao = Date("Y-m-d");

		
			
			$registar_requisicao = $db->query(
							"insert into obra (dono_da_obra,nome_da_obra,tempo_execucao,
								                data_inicio_obra,data_fim_obra,responsavel_da_obra,
								                nome_acesso,codigo_acesso)
								                 values ('$dono_da_obra','$nome_da_obra','$tempo_execucao',
													 '$data_inicio_obra','$data_fim_obra','$responsavel_da_obra',
													 '$nome_acesso','$codigo_acesso');");

			echo json_encode(["sucesso"=>"sucesso"]);
		}

		public function aderir_obra($dados,$db){
			$nome_acesso = $dados["nome_acesso"];	
			$codigo_acesso = $dados["codigo_acesso"];	
			$dados_obra = $db->query("SELECT *FROM `obra` where `nome_acesso`='$nome_acesso'
									  and `codigo_acesso`='$codigo_acesso'");		
			$num_rows = count($dados_obra);
			if($num_rows==1){
				//echo json_encode(["value"=>"sucesso"]);
				$_SESSION['informacoes_obra'] = $dados_obra;
				$form_dados_obra=dirname(__FILE__).'/../views/Drogaria/form_dados_obra.php';			
				include $form_dados_obra;	
			}else{
				echo json_encode(["Erro de acesso"=>"Nome de acesso ou codigo acesso errado"]);
			}
					
		}

		public function folhas_pagamento($id_obra,$db){
			$date = Date("Y-m-d");
			$date_explode = explode("-", $date);
			$mes =	$date_explode[1];
			$ano =  $date_explode[0];
			$dados_folha_pagamento = $db->query("SELECT *FROM `semana_folhas_pagamento` 
												where month(inicio_folha)='$mes'
									  and year(inicio_folha)='$ano' and `id_obra`='$id_obra'");
			$num_rows = count($dados_folha_pagamento);	
			if($num_rows==0){
				$_SESSION['informacoes_folhas_pagamento'] = $dados_folha_pagamento;
				$_SESSION['informacoes_mes_actual_folha_pagamento'] = $date;
				$_SESSION['id_obra_actual'] = $id_obra;
				$form_dados_obra=dirname(__FILE__).'/../views/Drogaria/form_folha_pagamento.php';			
				include $form_dados_obra;
					
			}else{
				$_SESSION['informacoes_folhas_pagamento'] = $dados_folha_pagamento;
				$_SESSION['informacoes_mes_actual_folha_pagamento'] = $date;
				$_SESSION['id_obra_actual'] = $id_obra;
				$form_dados_obra=dirname(__FILE__).'/../views/Drogaria/form_folha_pagamento.php';			
				include $form_dados_obra;
			}

			//echo json_encode(["value"=>$num_rows]);
					
		}


		public function registar_data_folhas($id_obra_actual,$data_inicio_folha,$data_fim_folha,$db){
			
			$data_requisicao = Date("Y-m-d");		
			
			$registar_data_folhas = $db->query(
							"insert into semana_folhas_pagamento (id_obra,inicio_folha,fim_folha)
								                 values ('$id_obra_actual','$data_inicio_folha',
								                 	     '$data_fim_folha');");

			echo json_encode(["sucesso"=>"sucesso"]);
		}



		public function caregar_folha_pagamento($id_folha_caregar,$id_obra_caregar,$db){
			
			$caregar_folha_pagamento = $db->query("SELECT *FROM `marcacao_dia_trabalho` 
												where id_folha='$id_folha_caregar' and id_obra='$id_obra_caregar'");
			$num_rows = count($caregar_folha_pagamento);	
			if($num_rows==0){
				$_SESSION['id_obra_nova_folha'] = $id_obra_caregar;
				$_SESSION['id_folha_caregar'] = $id_folha_caregar;
				$criar_nova_folha=dirname(__FILE__).'/../views/Drogaria/formularios_pagamento_vazio.php';			
				include $criar_nova_folha;
				
					
			}else{
				$_SESSION['id_obra_nova_folha'] = $id_obra_caregar;
				$_SESSION['id_folha_caregar'] = $id_folha_caregar;
				$_SESSION['dados_trabalhador_registado'] = $caregar_folha_pagamento;
				$mostrar_dados_folha_trabalhador=dirname(__FILE__).'/../views/Drogaria/formularios_pagamento_preenchido.php';			
				include $mostrar_dados_folha_trabalhador;
				//echo json_encode(["resp"=>"ja existe reisto".$id_folha_caregar.$id_obra_caregar]);
			}

			//echo json_encode(["value"=>$num_rows]);
					
		}


		public function registar_dados_dia($dados,$db){
			$nome_trabalhador=$dados["nome_trabalhador"];
			$preco_hora=$dados["preco_hora"];
			$hora_segunda = $dados["hora_segunda"];
			$hora_terca = $dados["hora_terca"];
			$hora_quarta = $dados["hora_quarta"];
			$hora_quinta = $dados["hora_quinta"];
			$hora_sexta = $dados["hora_sexta"];
			$hora_sabado = $dados["hora_sabado"];
			$total = $dados["total"];
			$observacao = $dados["observacao"];
			$id_folha_registo = $dados["id_folha_registo"];
			$id_obra_registo = $dados["id_obra_registo"];


			$data_requisicao = Date("Y-m-d");
			
			$registar_requisicao = $db->query(
							"insert into marcacao_dia_trabalho (id_folha,id_obra,nome_trabalhador,preco_hora,hora_segunda,
								                hora_terca,hora_quarta,hora_quinta,hora_sexta,hora_sabado,observacao)
								                 values ('$id_folha_registo','$id_obra_registo','$nome_trabalhador',
								                 	'$preco_hora','$hora_segunda','$hora_terca','$hora_quarta',
								                 	'$hora_quinta','$hora_sexta','$hora_sabado','$observacao');");

			echo json_encode(["sucesso"=>"sucesso"]);
		}






		public function actualizar_registar_dados_dia($dados,$db){
			$nome_trabalhador=$dados["nome_trabalhador"];
			$preco_hora=$dados["preco_hora"];
			$hora_segunda = $dados["hora_segunda"];
			$hora_terca = $dados["hora_terca"];
			$hora_quarta = $dados["hora_quarta"];
			$hora_quinta = $dados["hora_quinta"];
			$hora_sexta = $dados["hora_sexta"];
			$hora_sabado = $dados["hora_sabado"];
			$total = $dados["total"];
			$observacao = $dados["observacao"];
			$id_folha_registo = $dados["id_folha_registo"];
			$id_obra_registo = $dados["id_obra_registo"];
			$id_trabalhador = $dados["id_trabalhador"];


			$data_requisicao = Date("Y-m-d");
			
			if($id_trabalhador=='0'){

				$registar_folha = $db->query(
								"insert into marcacao_dia_trabalho (id_folha,id_obra,nome_trabalhador,preco_hora,hora_segunda,
									                hora_terca,hora_quarta,hora_quinta,hora_sexta,hora_sabado,observacao,total)
									                 values ('$id_folha_registo','$id_obra_registo','$nome_trabalhador',
									                 	'$preco_hora','$hora_segunda','$hora_terca','$hora_quarta',
									                 	'$hora_quinta','$hora_sexta','$hora_sabado','$observacao','$total');");

				

			}else{
				$update_folha = $db->query(
					"update marcacao_dia_trabalho set  nome_trabalhador='$nome_trabalhador', 
													   preco_hora='$preco_hora',hora_segunda='$hora_segunda',
													   hora_terca='$hora_terca',hora_quarta='$hora_quarta',
													   hora_quinta='$hora_quinta',hora_sexta='$hora_sexta',
													   hora_sabado='$hora_sabado',observacao='$observacao',total='$total'
													   where id_trabalhador='$id_trabalhador';");
			}
			echo json_encode(["sucesso"=>"sucesso"]);
		}




		public function persquisar_mes_folhas($dados,$db){
			$mes = $dados['ind_mes_pesquisar_folha'];
			$ano = $dados['ano_pesquisar_folha'];
			$id_obra = $dados['id_obra_actual'];

			$informacoes_folhas_pequisada = $db->query("SELECT *FROM `semana_folhas_pagamento` 
												where month(inicio_folha)='$mes'
									  and year(inicio_folha)='$ano' and `id_obra`='$id_obra'");
			$num_rows = count($informacoes_folhas_pequisada);	
			if($num_rows==0){
				/*$_SESSION['informacoes_folhas_pagamento'] = $dados_folha_pagamento;
				$_SESSION['informacoes_mes_actual_folha_pagamento'] = $date;
				$_SESSION['id_obra_actual'] = $id_obra;
				$pesquisar_folhas_mes=dirname(__FILE__).'/../views/Drogaria/pesquisar_folhas_mes.php';			
				include $pesquisar_folhas_mes;*/
				echo json_encode("Não foram registadas nenhuma folha para este mes.");	
			}else{
				$_SESSION['informacoes_folhas_pequisada'] = $informacoes_folhas_pequisada;
				$_SESSION['id_obra_actual'] = $id_obra;
				$pesquisar_folhas_mes=dirname(__FILE__).'/../views/Drogaria/pesquisar_folhas_mes.php';			
				include $pesquisar_folhas_mes;
			}

			
					
		}

		public function impremir_folha_pagamento_existente($db,$dados){
			$_SESSION['id_folha_impremir']=$dados['id_folha_impremir'];
			$_SESSION['id_obra_impremir']=$dados['id_obra_impremir'];
			$impremir_folha_pagamento_existente=dirname(__FILE__).'/../views/Gerar_PDF/impremir_folha_pagamento_existente.php';
			include $impremir_folha_pagamento_existente;
		}

		public function calcular_folha_pagamento_existente($db,$dados){
			$_SESSION['id_folha_calcular']=$dados['id_folha_caregar_existente'];
			$_SESSION['id_obra_calcular']=$dados['id_obra_caregar_existente'];
			$calcular_folha_pagamento_existente=dirname(__FILE__).'/../views/Gerar_PDF/calcular_folha_pagamento_existente.php';
			include $calcular_folha_pagamento_existente;			
		}

		/* --------------------- Fim funcoes de obra ---------------------------------------------------- */

		/*--------------------------- inicio mostrar vendas_mensais -------------------------------------------------*/

		public function vendas_do_mes($db){
			$date = Date("Y-m-d");

			$date_explode = explode("-", $date);
			$mes =	$date_explode[1];
			$ano =  $date_explode[0];
			$dia =  $date_explode[2];

			$array_vendas=[];
			$calcular_vendas='';

			$verificar_venda_mes_actual = $db->query("SELECT *FROM `venda` 
												where month(data_venda)='$mes'
									  and year(data_venda)='$ano'");
			$num_rows = count($verificar_venda_mes_actual);

			if($num_rows==0){
				$_SESSION['mes_ano_venda_actual'] = $date;
				$_SESSION['array_venda_mes_actual'] = $array_vendas;
				$_SESSION['dias_vendas'] = $num_rows;
				$vendas_do_mes=dirname(__FILE__).'/../views/Drogaria/vendas_do_mes.php';			
				include $vendas_do_mes;
					
			}else{
				
				if($mes=='01' || $mes=='03' || $mes=='05' || $mes=='07' || $mes=='08' || $mes=='10' || $mes=='12'){
					for ($i=1;$i<=31;$i++){
						$calcular_vendas = $db->query("SELECT SUM(total_a_pagar) as total FROM `venda` 
													where year(data_venda)='$ano' 
													and month(data_venda)='$mes' 
													and day(data_venda)='$i'");
						$array_vendas[$i]=$calcular_vendas;
						

					}
					$_SESSION['mes_ano_venda_actual'] = $date;
					$_SESSION['array_venda_mes_actual'] = $array_vendas;
					$_SESSION['dias_vendas'] = $num_rows;
					$vendas_do_mes=dirname(__FILE__).'/../views/Drogaria/vendas_do_mes.php';			
					include $vendas_do_mes;

				}else if($mes=='04' || $mes=='06' || $mes=='09' || $mes=='11'){
						for ($i=0;$i<30;$i++){
						$calcular_vendas = $db->query("SELECT SUM(total_a_pagar) as total FROM `venda` 
													where year(data_venda)='$ano' 
													and month(data_venda)='$mes' 
													and day(data_venda)='$i'");
						$array_vendas[$i]=$calcular_vendas;
						

						}
						$_SESSION['mes_ano_venda_actual'] = $date;
						$_SESSION['array_venda_mes_actual'] = $array_vendas;
						$_SESSION['dias_vendas'] = $num_rows;
						$vendas_do_mes=dirname(__FILE__).'/../views/Drogaria/vendas_do_mes.php';			
						include $vendas_do_mes;
				}else{
						for ($i=0;$i<29;$i++){
						$calcular_vendas = $db->query("SELECT SUM(total_a_pagar) as total FROM `venda` 
													where year(data_venda)='$ano' 
													and month(data_venda)='$mes' 
													and day(data_venda)='$i'");
						$array_vendas[$i]=$calcular_vendas;
						

					}
					$_SESSION['mes_ano_venda_actual'] = $date;
					$_SESSION['array_venda_mes_actual'] = $array_vendas;
					$_SESSION['dias_vendas'] = $num_rows;
					$vendas_do_mes=dirname(__FILE__).'/../views/Drogaria/vendas_do_mes.php';			
					include $vendas_do_mes;
				}				
			}		
					
		}




			public function persquisar_venda_mes_data($dados,$db){
			
			$mes=$dados['ind_mes_pesquisar_venda'];
			$ano=$dados['ano_pesquisar_venda'];


			$array_vendas=[];
			$calcular_vendas='';

			$verificar_venda_mes_actual = $db->query("SELECT *FROM `venda` 
												where month(data_venda)='$mes'
									  and year(data_venda)='$ano'");
			$num_rows = count($verificar_venda_mes_actual);	
			if($num_rows==0){
				$_SESSION['mes_venda_pesquisado'] = $mes;
				$_SESSION['ano_venda_pesquisado'] = $ano;
				$_SESSION['array_venda_pesquisado'] = $array_vendas;
				$_SESSION['dias_vendas_pesquisado'] = $num_rows;
				$vendas_do_mes=dirname(__FILE__).'/../views/Drogaria/vendas_do_mes_pesquisado.php';			
				include $vendas_do_mes;
					
			}else{
				
				if($mes=='01' || $mes=='03' || $mes=='05' || $mes=='07' || $mes=='08' || $mes=='10' || $mes=='12'){
					for ($i=1;$i<=31;$i++){
						$calcular_vendas = $db->query("SELECT SUM(total_a_pagar) as total FROM `venda` 
													where year(data_venda)='$ano' 
													and month(data_venda)='$mes' 
													and day(data_venda)='$i'");
						$array_vendas[$i]=$calcular_vendas;
						

					}
					$_SESSION['mes_venda_pesquisado'] = $mes;
					$_SESSION['ano_venda_pesquisado'] = $ano;
					$_SESSION['array_venda_pesquisado'] = $array_vendas;
					$_SESSION['dias_vendas_pesquisado'] = $num_rows;
					$vendas_do_mes=dirname(__FILE__).'/../views/Drogaria/vendas_do_mes_pesquisado.php';			
					include $vendas_do_mes;

				}else if($mes=='04' || $mes=='06' || $mes=='09' || $mes=='11'){
						for ($i=0;$i<30;$i++){
						$calcular_vendas = $db->query("SELECT SUM(total_a_pagar) as total FROM `venda` 
													where year(data_venda)='$ano' 
													and month(data_venda)='$mes' 
													and day(data_venda)='$i'");
						$array_vendas[$i]=$calcular_vendas;
						

						}
						$_SESSION['mes_venda_pesquisado'] = $mes;
						$_SESSION['ano_venda_pesquisado'] = $ano;
						$_SESSION['array_venda_pesquisado'] = $array_vendas;
						$_SESSION['dias_vendas_pesquisado'] = $num_rows;
						$vendas_do_mes=dirname(__FILE__).'/../views/Drogaria/vendas_do_mes_pesquisado.php';			
						include $vendas_do_mes;
				}else{
						for ($i=0;$i<29;$i++){
						$calcular_vendas = $db->query("SELECT SUM(total_a_pagar) as total FROM `venda` 
													where year(data_venda)='$ano' 
													and month(data_venda)='$mes' 
													and day(data_venda)='$i'");
						$array_vendas[$i]=$calcular_vendas;
						

					}
					$_SESSION['mes_venda_pesquisado'] = $mes;
					$_SESSION['ano_venda_pesquisado'] = $ano;
					$_SESSION['array_venda_pesquisado'] = $array_vendas;
					$_SESSION['dias_vendas_pesquisado'] = $num_rows;
					$vendas_do_mes=dirname(__FILE__).'/../views/Drogaria/vendas_do_mes_pesquisado.php';			
					include $vendas_do_mes;
				}
				
			}			
					
		}


		/*--------------------------- fim mostrar vendas_mensais -------------------------------------------------*/
				



		/*--------------------------- inico mostrar pagamento  maquina mensais -------------------------------------------------*/


		public function pagamento_maquina_do_mes($db){
			$date = Date("Y-m-d");

			$date_explode = explode("-", $date);
			$mes =	$date_explode[1];
			$ano =  $date_explode[0];
			$dia =  $date_explode[2];

			$array_pagamento=[];
			$calcular_pagamento_do_mes='';

			$verificar_pagamento_maquina_mes_actual = $db->query("SELECT *FROM `maquina_carpintaria` 
												where month(data_pagamento)='$mes'
									  and year(data_pagamento)='$ano'");
			$num_rows = count($verificar_pagamento_maquina_mes_actual);	
			if($num_rows==0){
				$_SESSION['mes_ano_pagamento_maquina_actual'] = $date;
				$_SESSION['array_pagamento_maquina_mes_actual'] = $array_pagamento;
				$_SESSION['dias_pagamento'] = $num_rows;
				$pagamento_maquina_do_mes=dirname(__FILE__).'/../views/Drogaria/pagamento_maquina_do_mes.php';			
				include $pagamento_maquina_do_mes;
					
			}else{
				
				if($mes=='01' || $mes=='03' || $mes=='05' || $mes=='07' || $mes=='08' || $mes=='10' || $mes=='12'){
					for ($i=1;$i<=31;$i++){
						$calcular_pagamento_do_mes = $db->query("SELECT SUM(total_pagar) as total FROM `maquina_carpintaria` 
													where year(data_pagamento)='$ano' 
													and month(data_pagamento)='$mes' 
													and day(data_pagamento)='$i'");
						$array_pagamento[$i]=$calcular_pagamento_do_mes;
						
						

					}
					$_SESSION['mes_ano_pagamento_maquina_actual'] = $date;
					$_SESSION['array_pagamento_maquina_mes_actual'] = $array_pagamento;
					$_SESSION['dias_pagamento'] = $num_rows;
					$pagamento_maquina_do_mes=dirname(__FILE__).'/../views/Drogaria/pagamento_maquina_do_mes.php';			
					include $pagamento_maquina_do_mes;

				}else if($mes=='04' || $mes=='06' || $mes=='09' || $mes=='11'){
						for ($i=0;$i<30;$i++){
						$calcular_pagamento_do_mes = $db->query("SELECT SUM(total_pagar) as total FROM `maquina_carpintaria` 
													where year(data_pagamento)='$ano' 
													and month(data_pagamento)='$mes' 
													and day(data_pagamento)='$i'");
						$array_pagamento[$i]=$calcular_pagamento_do_mes;
					}
					$_SESSION['mes_ano_pagamento_maquina_actual'] = $date;
					$_SESSION['array_pagamento_maquina_mes_actual'] = $array_pagamento;
					$_SESSION['dias_pagamento'] = $num_rows;
					$pagamento_maquina_do_mes=dirname(__FILE__).'/../views/Drogaria/pagamento_maquina_do_mes.php';			
					include $pagamento_maquina_do_mes;
				}else{
						for ($i=0;$i<29;$i++){
						$calcular_pagamento_do_mes = $db->query("SELECT SUM(total_pagar) as total FROM `maquina_carpintaria` 
													where year(data_pagamento)='$ano' 
													and month(data_pagamento)='$mes' 
													and day(data_pagamento)='$i'");
						$array_pagamento[$i]=$calcular_pagamento_do_mes;						
						

					}
					$_SESSION['mes_ano_pagamento_maquina_actual'] = $date;
					$_SESSION['array_pagamento_maquina_mes_actual'] = $array_pagamento;
					$_SESSION['dias_pagamento'] = $num_rows;
					$pagamento_maquina_do_mes=dirname(__FILE__).'/../views/Drogaria/pagamento_maquina_do_mes.php';			
					include $pagamento_maquina_do_mes;
				}				
			}		
					
		}




		public function persquisar_pagamento_maquina_mes($dados,$db){
			$date=Date("Y-m-d");
			$mes=$dados['ind_mes_pesquisar_pagamento_maquina'];
			$ano=$dados['ano_pesquisar_pagamento_maquina'];

			$array_pagamento=[];
			$calcular_pagamento_do_mes='';

			$verificar_pagamento_maquina_mes_actual = $db->query("SELECT *FROM `maquina_carpintaria` 
												where month(data_pagamento)='$mes'
									  and year(data_pagamento)='$ano'");
			$num_rows = count($verificar_pagamento_maquina_mes_actual);	
			if($num_rows==0){
				$_SESSION['mes_ano_pagamento_maquina_actual'] = $date;
				$_SESSION['array_pagamento_maquina_mes_actual'] = $array_pagamento;
				$_SESSION['dias_pagamento'] = $num_rows;
				$pagamento_maquina_do_mes=dirname(__FILE__).'/../views/Drogaria/pagamento_maquina_do_mes_pesquisado.php';			
				include $pagamento_maquina_do_mes;
					
			}else{
				
				if($mes=='01' || $mes=='03' || $mes=='05' || $mes=='07' || $mes=='08' || $mes=='10' || $mes=='12'){
					for ($i=1;$i<=31;$i++){
						$calcular_pagamento_do_mes = $db->query("SELECT SUM(total_pagar) as total FROM `maquina_carpintaria` 
													where year(data_pagamento)='$ano' 
													and month(data_pagamento)='$mes' 
													and day(data_pagamento)='$i'");
						$array_pagamento[$i]=$calcular_pagamento_do_mes;
						
						

					}
					$_SESSION['mes_ano_pagamento_maquina_actual'] = $date;
					$_SESSION['array_pagamento_maquina_mes_actual'] = $array_pagamento;
					$_SESSION['dias_pagamento'] = $num_rows;
					$pagamento_maquina_do_mes=dirname(__FILE__).'/../views/Drogaria/pagamento_maquina_do_mes_pesquisado.php';			
					include $pagamento_maquina_do_mes;

				}else if($mes=='04' || $mes=='06' || $mes=='09' || $mes=='11'){
						for ($i=0;$i<30;$i++){
						$calcular_pagamento_do_mes = $db->query("SELECT SUM(total_pagar) as total FROM `maquina_carpintaria` 
													where year(data_pagamento)='$ano' 
													and month(data_pagamento)='$mes' 
													and day(data_pagamento)='$i'");
						$array_pagamento[$i]=$calcular_pagamento_do_mes;
					}
					$_SESSION['mes_ano_pagamento_maquina_actual'] = $date;
					$_SESSION['array_pagamento_maquina_mes_actual'] = $array_pagamento;
					$_SESSION['dias_pagamento'] = $num_rows;
					$pagamento_maquina_do_mes=dirname(__FILE__).'/../views/Drogaria/pagamento_maquina_do_mes_pesquisado.php';			
					include $pagamento_maquina_do_mes;
				}else{
						for ($i=0;$i<29;$i++){
						$calcular_pagamento_do_mes = $db->query("SELECT SUM(total_pagar) as total FROM `maquina_carpintaria` 
													where year(data_pagamento)='$ano' 
													and month(data_pagamento)='$mes' 
													and day(data_pagamento)='$i'");
						$array_pagamento[$i]=$calcular_pagamento_do_mes;						
						

					}
					$_SESSION['mes_ano_pagamento_maquina_actual'] = $date;
					$_SESSION['array_pagamento_maquina_mes_actual'] = $array_pagamento;
					$_SESSION['dias_pagamento'] = $num_rows;
					$pagamento_maquina_do_mes=dirname(__FILE__).'/../views/Drogaria/pagamento_maquina_do_mes_pesquisado.php';			
					include $pagamento_maquina_do_mes;
				}				
			}		
					
		}



		/*--------------------------- fim mostrar pagamento  maquina mensais -------------------------------------------------*/



		public function update_cliente($id_cliente,$nome_cliente,$db){
			$date = date('Y-m-d H:i');
			$select_cliente=$db->query("SELECT * FROM `cliente` where id_cliente='$id_cliente'");
			$select_contato=$db->query("SELECT * FROM `contato` where id_cliente='$id_cliente'");
			echo json_encode(["select_cliente"=>$select_cliente,"select_contato"=>$select_contato,"data"=>$date]);
		}

		public function eliminar($dados,$db){
			$id_cliente=$dados["id_cliente"];
			$nome_cliente=$dados["nome_cliente"];
			$query=$db->query("SELECT * FROM `cliente` where id_cliente='$id_cliente' and nome_cliente='$nome_cliente'");
			echo json_encode($query);
		}

		public function confirmar_eliminar($dados_eliminar,$db){
			$id_cliente=$dados_eliminar["id_cliente"];
			$nome_cliente=$dados_eliminar["nome_cliente"];
			$query=$db->query("delete from cliente where id_cliente='$id_cliente' and nome_cliente='$nome_cliente';");
			echo json_encode(["resposta"=>"success"]);
		}


		

		public function listarTodos($db){

			$query = $db->query('SELECT * FROM `cliente` where estado="activo" order by nome_cliente limit 9');

			echo json_encode($query);

		}


		public function listarUm($valor,$db){

			$query = $db->query("SELECT * FROM `cliente` where nome_cliente like '%$valor%' and estado='activo' or id_cliente like '%$valor%' and estado='activo' limit 9");

			echo json_encode($query);


		}

		public function registo($cliente_data,$lista_contatos_cliente,$contrato_data,$lista_zonas_alarme,$lista_contato_emergencia,$db){
			
			$id_cliente=$cliente_data["id_cliente"];
			$nome_cliente=$cliente_data["nome_cliente"];
			$bi_cliente=$cliente_data["bi_cliente"];
			$data_nascimento=$cliente_data["data_nascimento"];
			$ilha_cliente=$cliente_data["ilha_cliente"];
			$cidade_cliente=$cliente_data["cidade_cliente"];
			$zona_cliente=$cliente_data["zona_cliente"];
			$data_inscricao=$cliente_data["data_inscricao"];
			$contato_cliente=$cliente_data["contato_cliente"];
			$email_cliente=$cliente_data["email_cliente"];
			$estado="activo";
				
			

		$query = $db->query(
							"insert into cliente (id_cliente,nome_cliente,bi_cliente,data_nascimento,
							 ilha_cliente,cidade_cliente,zona_cliente,data_inscricao,
							 contato_cliente,email_cliente,estado) values ('$id_cliente','$nome_cliente','$bi_cliente',
							 '$data_nascimento','$ilha_cliente','$cidade_cliente','$zona_cliente','$data_inscricao',
							 '$contato_cliente','$email_cliente','$estado'
							);");

		for($i=0;$i<count($lista_contatos_cliente);$i++){

			if($lista_contatos_cliente[$i]==0){
				$lista_contatos_cliente[$i]=0;
			}else{
				$numero=$lista_contatos_cliente[$i];
				$query_contato = $db->query(
							"insert into contato (numero,id_cliente) values ('$numero','$id_cliente'
						);");
			}
		}



			$tipo_contrato=$contrato_data["contrato_tipo"];

			if($tipo_contrato=="alarme"){
				$id_alarme=$contrato_data["id_alarme"];
				$modelo_alarme=$contrato_data["modelo_alarme"];
				$codigo_alarme=$contrato_data["codigo_alarme"];
				$quota_alarme=$contrato_data["quota_alarme"];
				$ilha_alarme=$contrato_data["ilha_alarme"];
				$cidade_alarme=$contrato_data["cidade_alarme"];
				$zona_alarme=$contrato_data["zona_alarme"];
				$data_instalacao=$contrato_data["data_instalacao"];
				$codigo_cliente_alarme=$contrato_data["codigo_cliente_alarme"];
				$aprisionamento_cliente=$contrato_data["aprisionamento_cliente"];
				$informacao_zona_alarme=$contrato_data["informacao_zona_alarme"];
				$numero_serie_zona=$contrato_data["numero_serie_zona"];
				$nome_pessoa_emergencia_alarme=$contrato_data["nome_pessoa_emergencia_alarme"];
				$numero_pessoa_emergencia_alarme=$contrato_data["numero_pessoa_emergencia_alarme"];
				$tipo_cliente=$contrato_data["tipo_cliente"];
				$observacoes_alarme=$contrato_data["observacoes_alarme"];
				


				$query_alarme=$db->query(
											"insert into alarme (id_alarme,modelo_alarme,codigo_alarme,quota_alarme,ilha_alarme,cidade_alarme,
											 zona_alarme,id_cliente,data_instalacao,codigo_cliente_alarme,aprisionamento_cliente,informacao_zona_alarme,numero_serie_zona,
											 nome_pessoa_emergencia_alarme,numero_pessoa_emergencia_alarme,tipo_cliente,observacoes_alarme,ilha_origem)
											 values('$id_alarme','$modelo_alarme','$codigo_alarme','$quota_alarme','$ilha_alarme',
											 	   '$cidade_alarme','$zona_alarme','$id_cliente','$data_instalacao','$codigo_cliente_alarme','$aprisionamento_cliente','$informacao_zona_alarme',
											 	   '$numero_serie_zona','$nome_pessoa_emergencia_alarme','$numero_pessoa_emergencia_alarme','$tipo_cliente','$observacoes_alarme','$ilha_alarme'
										);");


				foreach ($lista_zonas_alarme as $key => $zona) {
					$zonas_informacao=$zona["informacao"];
					$serie_numero=$zona["numero_serie"];
				
					if($zonas_informacao=="" || $serie_numero==""){
						$zonas_informacao="";
						$serie_numero="";
						
					}else{
						$query_lista_zonas_alarme=$db->query(
											"insert into zonas_alarme (informacao_zona,numero_serie,id_alarme) values
												('$zonas_informacao','$serie_numero','$id_alarme'
										);");
					}
					
				}

				foreach ($lista_contato_emergencia as $key => $emergencias) {
					$pessoa_emergencia=$emergencias["nome_pessoa_emergencia"];
					$numero_emergencia=$emergencias["numero_pessoa_emergencia"];
				
					if($pessoa_emergencia=="" || $numero_emergencia==""){
						$pessoa_emergencia="";
						$numero_emergencia="";
						
					}else{
						$query_lista_contato_emergencia=$db->query(
											"insert into lista_contato_emergencia (nome_pessoal,numero,id_alarme) values
												('$pessoa_emergencia','$numero_emergencia','$id_alarme'
										);");
					}
					
				}
				

				echo json_encode(["posicao"=>"sucesso"]);

			}else{

				$tipo_video=$contrato_data["tipo_video"];		
				$ddns_video=$contrato_data["ddns_video"];		
				$id_video=$contrato_data["id_video"];
				$password_video=$contrato_data["password_video"];
				$serial_number_video=$contrato_data["serial_number_video"];
				$notas_video=$contrato_data["notas_video"];
				$ilha_video=$contrato_data["ilha_video"];
				$cidade_video=$contrato_data["cidade_video"];
				$zona_video=$contrato_data["zona_video"];
				$data_instalacao_video=$contrato_data["data_instalacao_video"];
				$tipo_cliente=$contrato_data["tipo_cliente"];


				$query_video_vigilancia=$db->query("insert into video_vigilancia (tipo_video,ddns_video,id_video,password_video,
									serial_number_video,notas_video,ilha_video,cidade_video,zona_video,data_instalacao_video,tipo_cliente,id_cliente)
									 values('$tipo_video','$ddns_video','$id_video',
									'$password_video','$serial_number_video','$notas_video','$ilha_video',
									'$cidade_video','$zona_video','$data_instalacao_video','$tipo_cliente','$id_cliente');");

				echo json_encode(["sucesso"=>"sucesso"]);
			}
			
		}

		public function alterar($cliente_dados,$lista_contatos_cliente,$lista_contatos_update_cliente,$db){
			$id_cliente=$cliente_dados["id_cliente"];
			$nome_cliente=$cliente_dados["nome_cliente"];
			$bi_cliente=$cliente_dados["bi_cliente"];
			$data_nascimento=$cliente_dados["data_nascimento"];			
			$ilha_cliente=$cliente_dados["ilha_cliente"];
			$cidade_cliente=$cliente_dados["cidade_cliente"];
			$zona_cliente=$cliente_dados["zona_cliente"];			
			$data_inscricao=$cliente_dados["data_inscricao"];
			$contato_cliente=$cliente_dados["contato_cliente"];
			$email_cliente=$cliente_dados["email_cliente"];

			$query=$db->query("update cliente set id_cliente='$id_cliente',nome_cliente='$nome_cliente',bi_cliente='$bi_cliente',
							  data_nascimento='$data_nascimento',ilha_cliente='$ilha_cliente',cidade_cliente='$cidade_cliente',
							  zona_cliente='$zona_cliente',data_inscricao='$data_inscricao',
							   contato_cliente='$contato_cliente',email_cliente='$email_cliente' where id_cliente='$id_cliente';");

			$query_delete_contatos=$db->query("delete from contato where id_cliente='$id_cliente';");

			for($i=0;$i<count($lista_contatos_cliente);$i++){

			if($lista_contatos_cliente[$i]==0){
				$lista_contatos_cliente[$i]=0;
			}else{
				$numero=$lista_contatos_cliente[$i];
				$query_contato_update = $db->query(
							"insert into contato (numero,id_cliente) values ('$numero','$id_cliente'
						);");
			}
		}

		for($i=0;$i<count($lista_contatos_update_cliente);$i++){

			if($lista_contatos_update_cliente[$i]==0){
				$lista_contatos_update_cliente[$i]=0;
			}else{
				$numero=$lista_contatos_update_cliente[$i];
				$query_contato_update2 = $db->query(
							"insert into contato (numero,id_cliente) values ('$numero','$id_cliente'
						);");
			}
		}

			echo json_encode(["resposta"=>"success"]);
		}

		public function impremir_stock($db,$id_categoria_impremir){
			$_SESSION['id_categoria_para_impremir']=$id_categoria_impremir;
			$gerar_pdf_de_stock=dirname(__FILE__).'/../views/Gerar_PDF/gerar_pdf_de_stock.php';
			include $gerar_pdf_de_stock;	
		}

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function alterar_alarme($dados_alarme_update,$lista_zona_antes_update,$lista_emerg_antes_update,$lista_zona_novo_update,$lista_emerg_novo_update,$db){
			$id_alarme=$dados_alarme_update["id_alarme_update"];
			$modelo_alarme=$dados_alarme_update["modelo_alarme_update"];
			$codigo_alarme=$dados_alarme_update["codigo_alarme_update"];
			$quota_alarme=$dados_alarme_update["quota_alarme_update"];			
			$ilha_alarme=$dados_alarme_update["ilha_alarme_update"];
			$cidade_alarme=$dados_alarme_update["cidade_alarme_update"];
			$zona_alarme=$dados_alarme_update["zona_alarme_update"];			
			$data_instalacao=$dados_alarme_update["data_instalacao_update"];
			$codigo_cliente_alarme=$dados_alarme_update["codigo_cliente_alarme_update"];
			$aprisionamento_cliente=$dados_alarme_update["aprisionamento_cliente_update"];
			$informacao_zona_alarme=$dados_alarme_update["informacao_zona_alarme_update"];
			$numero_serie_zona=$dados_alarme_update["numero_serie_zona_update"];
			$nome_pessoa_emergencia_alarme=$dados_alarme_update["nome_pessoa_emergencia_alarme_update"];
			$numero_pessoa_emergencia_alarme=$dados_alarme_update["numero_pessoa_emergencia_alarme_update"];
			$tipo_cliente=$dados_alarme_update["tipo_update_outro_cliente"];
			$observacoes_alarme=$dados_alarme_update["observacoes_alarme"];
			$chave_alarme=$dados_alarme_update["chave_alarme"];
			$id_alarme_antes=$dados_alarme_update["id_alarme_antes"];
			$ilha_alarme_antes=$dados_alarme_update["ilha_alarme_antes"];
			$id_cliente=$dados_alarme_update["id_cliente"];
			$date = Date("Y-m-d");

			if($id_alarme_antes=="static"){



				$query=$db->query("update alarme set id_alarme='$id_alarme',modelo_alarme='$modelo_alarme',codigo_alarme='$codigo_alarme',
								  quota_alarme='$quota_alarme',ilha_alarme='$ilha_alarme',cidade_alarme='$cidade_alarme',
								  zona_alarme='$zona_alarme',data_instalacao='$data_instalacao',codigo_cliente_alarme='$codigo_cliente_alarme',
								  aprisionamento_cliente='$aprisionamento_cliente',informacao_zona_alarme='$informacao_zona_alarme',
								  numero_serie_zona='$numero_serie_zona',nome_pessoa_emergencia_alarme='$nome_pessoa_emergencia_alarme',
								  numero_pessoa_emergencia_alarme='$numero_pessoa_emergencia_alarme', 
								  tipo_cliente='$tipo_cliente',observacoes_alarme='$observacoes_alarme' where chave_alarme='$chave_alarme';");

				$query_delete_zonas_alarme=$db->query("delete from zonas_alarme where id_alarme='$id_alarme';");

				for($i=0;$i<count($lista_zona_antes_update);$i++){

					if($lista_zona_antes_update[$i]["informacao_zona"]=="" || $lista_zona_antes_update[$i]["numero_serie"]==""){
						$lista_zona_antes_update[$i]["informacao_zona"]="";
						$lista_zona_antes_update[$i]["numero_serie"]="";
					}else{
						$informacao_zona=$lista_zona_antes_update[$i]["informacao_zona"];
						$numero_serie=$lista_zona_antes_update[$i]["numero_serie"];
						$query_zona_update = $db->query(
									"insert into zonas_alarme (informacao_zona,numero_serie,id_alarme) values ('$informacao_zona','$numero_serie','$id_alarme'
								);");
					}
				}

				for($i=0;$i<count($lista_zona_novo_update);$i++){

					if($lista_zona_novo_update[$i]["informacao_zona"]=="" || $lista_zona_novo_update[$i]["numero_serie"]==""){
						$lista_zona_novo_update[$i]["informacao_zona"]="";
						$lista_zona_novo_update[$i]["numero_serie"]="";
					}else{
						$informacao_zona=$lista_zona_novo_update[$i]["informacao_zona"];
						$numero_serie=$lista_zona_novo_update[$i]["numero_serie"];
						$query_zona_update = $db->query(
									"insert into zonas_alarme (informacao_zona,numero_serie,id_alarme) values ('$informacao_zona','$numero_serie','$id_alarme'
								);");
					}
				}

				$query_delete_lista_contato_emergencia=$db->query("delete from lista_contato_emergencia where id_alarme='$id_alarme';");

				for($i=0;$i<count($lista_emerg_antes_update);$i++){

					if($lista_emerg_antes_update[$i]["nome_pessoal"]=="" || $lista_emerg_antes_update[$i]["numero"]==""){
						$lista_emerg_antes_update[$i]["nome_pessoal"]="";
						$lista_emerg_antes_update[$i]["numero"]="";
					}else{
						$nome_pessoal=$lista_emerg_antes_update[$i]["nome_pessoal"];
						$numero=$lista_emerg_antes_update[$i]["numero"];
						$query_emergencia_update = $db->query(
									"insert into lista_contato_emergencia (nome_pessoal,numero,id_alarme) values ('$nome_pessoal','$numero','$id_alarme'
								);");
					}
				}

				for($i=0;$i<count($lista_emerg_novo_update);$i++){

					if($lista_emerg_novo_update[$i]["nome_pessoal"]=="" || $lista_emerg_novo_update[$i]["numero"]==""){
						$lista_emerg_novo_update[$i]["nome_pessoal"]="";
						$lista_emerg_novo_update[$i]["numero"]="";
					}else{
						$nome_pessoal=$lista_emerg_novo_update[$i]["nome_pessoal"];
						$numero=$lista_emerg_novo_update[$i]["numero"];
						$query_emergencia_update = $db->query(
									"insert into lista_contato_emergencia (nome_pessoal,numero,id_alarme) values ('$nome_pessoal','$numero','$id_alarme'
								);");
					}
				}

	
				echo json_encode(["static"=>$id_alarme_antes]);
			}else{

				$query=$db->query("update alarme set id_alarme='$id_alarme',modelo_alarme='$modelo_alarme',codigo_alarme='$codigo_alarme',
								  quota_alarme='$quota_alarme',ilha_alarme='$ilha_alarme',cidade_alarme='$cidade_alarme',
								  zona_alarme='$zona_alarme',data_instalacao='$data_instalacao',codigo_cliente_alarme='$codigo_cliente_alarme',
								  aprisionamento_cliente='$aprisionamento_cliente',informacao_zona_alarme='$informacao_zona_alarme',
								  numero_serie_zona='$numero_serie_zona',nome_pessoa_emergencia_alarme='$nome_pessoa_emergencia_alarme',
								  numero_pessoa_emergencia_alarme='$numero_pessoa_emergencia_alarme', 
								  tipo_cliente='$tipo_cliente',observacoes_alarme='$observacoes_alarme' where chave_alarme='$chave_alarme';");
				
				$query=$db->query("insert into alarme (id_alarme,modelo_alarme,codigo_alarme,quota_alarme,ilha_alarme,cidade_alarme,
											 zona_alarme,id_cliente,data_instalacao,codigo_cliente_alarme,aprisionamento_cliente,informacao_zona_alarme,numero_serie_zona,
											 nome_pessoa_emergencia_alarme,numero_pessoa_emergencia_alarme,tipo_cliente,observacoes_alarme)
											 values('$id_alarme_antes','livre','livre','0','$ilha_alarme_antes',
											 	   'livre','livre','livre','$date','livre','livre','livre',
											 	   'livre','livre','livre','livre','livre');");
				
				$query_delete_zonas_alarme=$db->query("delete from zonas_alarme where id_alarme='$id_alarme_antes';");

				for($i=0;$i<count($lista_zona_antes_update);$i++){

					if($lista_zona_antes_update[$i]["informacao_zona"]=="" || $lista_zona_antes_update[$i]["numero_serie"]==""){
						$lista_zona_antes_update[$i]["informacao_zona"]="";
						$lista_zona_antes_update[$i]["numero_serie"]="";
					}else{
						$informacao_zona=$lista_zona_antes_update[$i]["informacao_zona"];
						$numero_serie=$lista_zona_antes_update[$i]["numero_serie"];
						$query_zona_update = $db->query(
									"insert into zonas_alarme (informacao_zona,numero_serie,id_alarme) values ('$informacao_zona','$numero_serie','$id_alarme'
								);");
					}
				}

				for($i=0;$i<count($lista_zona_novo_update);$i++){

					if($lista_zona_novo_update[$i]["informacao_zona"]=="" || $lista_zona_novo_update[$i]["numero_serie"]==""){
						$lista_zona_novo_update[$i]["informacao_zona"]="";
						$lista_zona_novo_update[$i]["numero_serie"]="";
					}else{
						$informacao_zona=$lista_zona_novo_update[$i]["informacao_zona"];
						$numero_serie=$lista_zona_novo_update[$i]["numero_serie"];
						$query_zona_update = $db->query(
									"insert into zonas_alarme (informacao_zona,numero_serie,id_alarme) values ('$informacao_zona','$numero_serie','$id_alarme'
								);");
					}
				}

				$query_delete_lista_contato_emergencia=$db->query("delete from lista_contato_emergencia where id_alarme='$id_alarme_antes';");

				for($i=0;$i<count($lista_emerg_antes_update);$i++){

					if($lista_emerg_antes_update[$i]["nome_pessoal"]=="" || $lista_emerg_antes_update[$i]["numero"]==""){
						$lista_emerg_antes_update[$i]["nome_pessoal"]="";
						$lista_emerg_antes_update[$i]["numero"]="";
					}else{
						$nome_pessoal=$lista_emerg_antes_update[$i]["nome_pessoal"];
						$numero=$lista_emerg_antes_update[$i]["numero"];
						$query_emergencia_update = $db->query(
									"insert into lista_contato_emergencia (nome_pessoal,numero,id_alarme) values ('$nome_pessoal','$numero','$id_alarme'
								);");
					}
				}

				for($i=0;$i<count($lista_emerg_novo_update);$i++){

					if($lista_emerg_novo_update[$i]["nome_pessoal"]=="" || $lista_emerg_novo_update[$i]["numero"]==""){
						$lista_emerg_novo_update[$i]["nome_pessoal"]="";
						$lista_emerg_novo_update[$i]["numero"]="";
					}else{
						$nome_pessoal=$lista_emerg_novo_update[$i]["nome_pessoal"];
						$numero=$lista_emerg_novo_update[$i]["numero"];
						$query_emergencia_update = $db->query(
									"insert into lista_contato_emergencia (nome_pessoal,numero,id_alarme) values ('$nome_pessoal','$numero','$id_alarme'
								);");
					}
				}
				echo json_encode(["resposta"=>$id_alarme_antes]);
			}
			
		}
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		public function alterar_video($dados_video,$db){
			$tipo_video=$dados_video["tipo_video"];
			$ddns_video=$dados_video["ddns_video"];
			$id_video=$dados_video["id_video"];
			$password_video=$dados_video["password_video"];
			$serial_number_video=$dados_video["serial_number_video"];
			$notas_video=$dados_video["notas_video"];
			$ilha_video=$dados_video["ilha_video"];
			$cidade_video=$dados_video["cidade_video"];
			$zona_video=$dados_video["zona_video"];
			$data_instalacao_video=$dados_video["data_instalacao"];
			$tipo_cliente=$dados_video["tipo_cliente"];
			$chave_video=$dados_video["chave_video"];

			$query_update_video=$db->query("update video_vigilancia set tipo_video='$tipo_video',ddns_video='$ddns_video',id_video='$id_video',
							  password_video='$password_video',serial_number_video='$serial_number_video',notas_video='$notas_video',
							  ilha_video='$ilha_video',cidade_video='$cidade_video',
							   zona_video='$zona_video',data_instalacao_video='$data_instalacao_video',tipo_cliente='$tipo_cliente' where chave_video='$chave_video';");
			echo json_encode(["sucesso"=>"sucesso"]);
		}



		public function validar_emails($email,$db){
			$query_validar_email=$db->query("select *from cliente where email='$email';");
			echo json_encode($query_validar_email);
		}

		public function novo_contrato($id_cliente,$db){
			$query=$db->query("SELECT * FROM `cliente` where id_cliente='$id_cliente'");
			echo json_encode($query);
		}


		public function novo_contrato_cliente($cliente_novo_contrato_data,$lista_contatos_antes_contrato,
												$lista_contatos_novo_contrato,$novo_contrato_data,
												$lista_zonas_alarme,$lista_contato_emergencia,$db){


			$id_cliente=$cliente_novo_contrato_data["id_cliente_contrato"];
			$nome_cliente=$cliente_novo_contrato_data["nome_cliente_contrato"];
			$bi_cliente=$cliente_novo_contrato_data["bi_cliente_contrato"];
			$data_nascimento=$cliente_novo_contrato_data["data_nascimento_contrato"];
			$ilha_cliente=$cliente_novo_contrato_data["ilha_cliente_contrato"];
			$cidade_cliente=$cliente_novo_contrato_data["cidade_cliente_contrato"];
			$zona_cliente=$cliente_novo_contrato_data["zona_cliente_contrato"];
			$data_inscricao=$cliente_novo_contrato_data["data_inscricao_contrato"];
			$contato_cliente=$cliente_novo_contrato_data["contato_cliente_contrato"];
			$email_cliente=$cliente_novo_contrato_data["email_cliente_contrato"];



			$query=$db->query("update cliente set id_cliente='$id_cliente',nome_cliente='$nome_cliente',bi_cliente='$bi_cliente',
							  data_nascimento='$data_nascimento',ilha_cliente='$ilha_cliente',cidade_cliente='$cidade_cliente',
							  zona_cliente='$zona_cliente',data_inscricao='$data_inscricao',
							   contato_cliente='$contato_cliente',email_cliente='$email_cliente' where id_cliente='$id_cliente';");

			$query_delete_contatos=$db->query("delete from contato where id_cliente='$id_cliente';");


			for($i=0;$i<count($lista_contatos_antes_contrato);$i++){

				if($lista_contatos_antes_contrato[$i]==0){
					$lista_contatos_antes_contrato[$i]=0;
				}else{
					$numero=$lista_contatos_antes_contrato[$i];
					$query_contato = $db->query(
								"insert into contato (numero,id_cliente) values ('$numero','$id_cliente'
							);");
				}
			}

			for($i=0;$i<count($lista_contatos_novo_contrato);$i++){

				if($lista_contatos_novo_contrato[$i]==0){
					$lista_contatos_novo_contrato[$i]=0;
				}else{
					$numero=$lista_contatos_novo_contrato[$i];
					$query_contato = $db->query(
								"insert into contato (numero,id_cliente) values ('$numero','$id_cliente'
							);");
				}
			}

		$tipo_contrato=$novo_contrato_data["contrato_tipo"];

			if($tipo_contrato=="alarme"){
				$id_alarme=$novo_contrato_data["id_alarme"];
				$modelo_alarme=$novo_contrato_data["modelo_alarme"];
				$codigo_alarme=$novo_contrato_data["codigo_alarme"];
				$quota_alarme=$novo_contrato_data["quota_alarme"];
				$ilha_alarme=$novo_contrato_data["ilha_alarme"];
				$cidade_alarme=$novo_contrato_data["cidade_alarme"];
				$zona_alarme=$novo_contrato_data["zona_alarme"];
				$data_instalacao=$novo_contrato_data["data_instalacao"];
				$codigo_cliente_alarme=$novo_contrato_data["codigo_cliente_alarme"];
				$aprisionamento_cliente=$novo_contrato_data["aprisionamento_cliente"];
				$informacao_zona_alarme=$novo_contrato_data["informacao_zona_alarme"];
				$numero_serie_zona=$novo_contrato_data["numero_serie_zona"];
				$nome_pessoa_emergencia_alarme=$novo_contrato_data["nome_pessoa_emergencia_alarme"];
				$numero_pessoa_emergencia_alarme=$novo_contrato_data["numero_pessoa_emergencia_alarme"];
				$observacoes_alarme=$novo_contrato_data["observacoes_alarme"];
				$tipo_cliente=$novo_contrato_data["tipo_cliente"];
				


				$query_alarme=$db->query(
											"insert into alarme (id_alarme,modelo_alarme,codigo_alarme,quota_alarme,ilha_alarme,cidade_alarme,
											 zona_alarme,id_cliente,data_instalacao,codigo_cliente_alarme,aprisionamento_cliente,informacao_zona_alarme,numero_serie_zona,
											 nome_pessoa_emergencia_alarme,numero_pessoa_emergencia_alarme,tipo_cliente,observacoes_alarme,ilha_origem)
											 values('$id_alarme','$modelo_alarme','$codigo_alarme','$quota_alarme','$ilha_alarme',
											 	   '$cidade_alarme','$zona_alarme','$id_cliente','$data_instalacao','$codigo_cliente_alarme',
											 	   '$aprisionamento_cliente','$informacao_zona_alarme',
											 	   '$numero_serie_zona','$nome_pessoa_emergencia_alarme','$numero_pessoa_emergencia_alarme','$tipo_cliente','$observacoes_alarme','$ilha_alarme'
										);");


				foreach ($lista_zonas_alarme as $key => $zona) {
					$zonas_informacao=$zona["informacao"];
					$serie_numero=$zona["numero_serie"];
				
					if($zonas_informacao=="" || $serie_numero==""){
						$zonas_informacao="";
						$serie_numero="";
						
					}else{
						$query_lista_zonas_alarme=$db->query(
											"insert into zonas_alarme (informacao_zona,numero_serie,id_alarme) values
												('$zonas_informacao','$serie_numero','$id_alarme'
										);");
					}
					
				}
				

				foreach ($lista_contato_emergencia as $key => $emergencias){
					$pessoa_emergencia=$emergencias["nome_pessoa_emergencia"];
					$numero_emergencia=$emergencias["numero_pessoa_emergencia"];
				
					if($pessoa_emergencia=="" || $numero_emergencia==""){
						$pessoa_emergencia="";
						$numero_emergencia="";
						
					}else{
						$query_lista_contato_emergencia=$db->query(
											"insert into lista_contato_emergencia (nome_pessoal,numero,id_alarme) values
												('$pessoa_emergencia','$numero_emergencia','$id_alarme'
										);");
					}
					
				}			

				echo json_encode(["sucesso"=>"sucesso"]);

			}else{

				$tipo_video=$novo_contrato_data["tipo_video"];		
				$ddns_video=$novo_contrato_data["ddns_video"];		
				$id_video=$novo_contrato_data["id_video"];
				$password_video=$novo_contrato_data["password_video"];
				$serial_number_video=$novo_contrato_data["serial_number_video"];
				$notas_video=$novo_contrato_data["notas_video"];
				$ilha_video=$novo_contrato_data["ilha_video"];
				$cidade_video=$novo_contrato_data["cidade_video"];
				$zona_video=$novo_contrato_data["zona_video"];
				$data_instalacao_video=$novo_contrato_data["data_instalacao_video"];
				$tipo_cliente=$novo_contrato_data["tipo_cliente"];


				$query_video_vigilancia=$db->query("insert into video_vigilancia (tipo_video,ddns_video,id_video,password_video,
									serial_number_video,notas_video,ilha_video,cidade_video,zona_video,data_instalacao_video,tipo_cliente,id_cliente)
									 values('$tipo_video','$ddns_video','$id_video',
									'$password_video','$serial_number_video','$notas_video','$ilha_video',
									'$cidade_video','$zona_video','$data_instalacao_video','$tipo_cliente','$id_cliente');");

				echo json_encode(["sucesso"=>"sucesso"]);

			}
			
		}

		public function form_listar_contratos(){
			$form_listar=dirname(__FILE__).'/../views/Cliente/form_listar_contratos.php';
			include $form_listar;
		}

		public function form_efetuar_pagamento(){
			$form_listar=dirname(__FILE__).'/../views/Cliente/form_efetuar_pagamento.php';
			include $form_listar;
		}

		public function listar_dados_contratos($dados,$db){
			$id_cliente=$dados["id_cliente"];
			$nome_cliente=$dados["nome_cliente"];
			$query_contrato_alarme = $db->query("SELECT * FROM `alarme` where id_cliente='$id_cliente';");
			$query_contrato_vigilancia = $db->query("SELECT * FROM `video_vigilancia` where id_cliente='$id_cliente';");
			echo json_encode(["alarmes"=>$query_contrato_alarme,"vigilancias"=>$query_contrato_vigilancia]);
		}

		public function listar_um_contrato($dados,$db){
			$id_cliente=$dados["id_cliente"];
			$nome_cliente=$dados["nome_cliente"];
			$id_alarme=$dados["id_alarme"];
			
				$query_contrato_alarme = $db->query("SELECT * FROM `alarme` where id_alarme='$id_alarme';");
				$query_lista_zonas_alarme = $db->query("SELECT * FROM `zonas_alarme` where id_alarme='$id_alarme';");
				$query_lista_contato_emergencia = $db->query("SELECT * FROM `lista_contato_emergencia` where id_alarme='$id_alarme';");
				echo json_encode(["alarmes"=>$query_contrato_alarme,"zonas"=>$query_lista_zonas_alarme,"contatos_emergencias"=>$query_lista_contato_emergencia]);
			
			
		}

		public function listar_contrato_video($dados,$db){
			$id_cliente=$dados["id_cliente"];
			$nome_cliente=$dados["nome_cliente"];
			$ddns_video=$dados["ddns_video"];
			
				$query_video = $db->query("SELECT * FROM `video_vigilancia` where ddns_video='$ddns_video';");
				
				echo json_encode(["video"=>$query_video]);
			
			
		}

		public function listar_total_clientes($db){
				$query_total_clientes= $db->query("SELECT count(id_cliente) as total FROM `cliente`;");		
				echo json_encode($query_total_clientes);
		}


		public function listar_total_alarme($ilha,$db){
			$ano_actual=Date("Y");
			$query_total_alarmes= $db->query("SELECT count(id_alarme) as total FROM `alarme` where year(data_instalacao)='$ano_actual' and `ilha_origem`='$ilha';");				
			echo json_encode(["total"=>$query_total_alarmes,"ano"=>$ano_actual]);
		}


		// se aceitar alterar id_contrato posso utilizadar este codigo
		/*public function listar_total_alarme($ilha,$db){

			$ano_actual=Date("Y");
			$query_total_livre= $db->query("SELECT count(id_alarme) as total FROM `alarme` where `ilha_alarme`='$ilha' and `id_cliente`='livre';");				
			if($query_total_livre[0]["total"]==0){
				$query_total_alarmes= $db->query("SELECT count(id_alarme) as total FROM `alarme` where year(data_instalacao)='$ano_actual' and `ilha_alarme`='$ilha';");
				echo json_encode(["total"=>$query_total_alarmes,"ano"=>$ano_actual]);
			}else{
				for($i=0;$i<count($query_total_alarmes[0]["total"]);$i++){
					$query_id_alarme_livre= $db->query("SELECT FROM `alarme` where `ilha_alarme`='$ilha' and `id_cliente`='livre';");	
				}
			}
		}



		public function pesquisar_dividas_do_cliente($id_cliente,$db){
				$existe_dividas= $db->query("SELECT count(id_cliente) as total FROM `dividas` where id_cliente='$id_cliente' and estado='pendente';");		
				
				echo json_encode(["resultado"=>$existe_dividas]);
		}	

		public function desactivar_cliente($id_cliente,$db){
				$desactivar_cliente= $db->query("update cliente set estado='desactivo' where id_cliente='$id_cliente';");				
				echo json_encode(["resultado"=>$desactivar_cliente]);
		}	


		public function lista_desativados($db){
			$lista_desativados= $db->query("SELECT *FROM `cliente` where estado='desactivo';");				
			echo json_encode(["resultado"=>$lista_desativados]);
		}	

		public function activar_cliente($id_cliente,$db){
				$activar_cliente= $db->query("update cliente set estado='activo' where id_cliente='$id_cliente';");				
				echo json_encode(["resultado"=>$activar_cliente]);
		}
		public function historico_pagamento($pesquisar_dados,$db){
				$historico_pagamento= $db->query("SELECT id_cliente,nome_cliente FROM `cliente` where nome_cliente like '%$pesquisar_dados%' or id_cliente like '%$pesquisar_dados%';");				
				echo json_encode(["resultado"=>$historico_pagamento]);				
		}
		public function todos_pagamentos_cliente($dados_certo,$db){
				$id_cliente= $db->query("SELECT id_cliente FROM `cliente` where nome_cliente='$dados_certo';");	
				$id=$id_cliente[0]["id_cliente"];			
				$todo_pagamento= $db->query("SELECT *FROM `pagamento` where id_cliente='$id';");
				echo json_encode(["resultado"=>$todo_pagamento]);		
		}*/	
		
	}


?>

