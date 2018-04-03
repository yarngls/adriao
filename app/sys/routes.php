<?php
	/**
	  * MVC samples - benlitech
	  * Despachador de pedidos
	*/
    session_start();
    date_default_timezone_set('Atlantic/Cape_Verde');
	//add db
	include 'db/dbobject.php';
	//add function helper
	include "func.php";  
	LoadController('home');
	LoadController('ilha'); //add ilhas functionality
	LoadController('login');
	LoadController('drogaria');
	LoadController('maquinacarpintaria');
	LoadController('madeira');
	LoadController('agenda');
	LoadController('construcoesadriao');
  
	//NAMESPACES    
	use BenliTech\db\Dbtools;
	use BenliTech\HomeController\Home;
	use BenliTech\IlhaController\Ilhas;
	use BenliTech\LoginController\Login;
	use BenliTech\DrogariaController\Drogaria;  
	use BenliTech\MaquinaCarpintariaController\MaquinaCarpintaria;  
	use BenliTech\MadeiraController\Madeira;  
	use BenliTech\AgendaController\Agenda;  
	use BenliTech\ConstrucoesAdriaoController\ConstrucoesAdriao;  
	  
	//CONNECT TO DB
	$db = new DBTools(); 
  
	if( $_SERVER[ 'REQUEST_METHOD'] == "POST"){
        if(! isset( $_POST['want'] ) ){
            return null;
        }         
        //what they want?
        $want = $_POST['want'];
        $need = $_POST['data'];        
        switch( $want ){
			case "login":                
				$login = new Login();
				$login->index();
			break;
			case "entrar":
				$login = new Login();				
				$upw = explode('&', $need);
				$login->entrar($upw[0], $upw[1],$db);
			break;
			case "logout":                
				$login = new Login();
				$login->logout();
			break;
			case 'drogaria';
				switch ($need) {
					case 'menu_drogaria':
						$drogaria = new Drogaria;
						$categoria=$_POST["categoria"];
						$drogaria->drogaria($categoria,$db);
					break;
					case 'stock_produto':
						$drogaria = new Drogaria;
						$categoria=$_POST["categoria"];
						$drogaria->stock_produto($categoria,$db);
						//echo json_encode(["value"=>$categoria]);
					break;
					case 'form_update_stock':
						$drogaria = new Drogaria;
						$id_produto=$_POST["id_produto"];
						$drogaria->form_update_stock($id_produto,$db);
						//echo json_encode(["value"=>$ref_prod]);
					break;					

					case 'form_registo_stock':
						$drogaria = new Drogaria;
						$drogaria->form_registo_stock();
						//echo json_encode(["value"=>"form_registo_stock"]);
					break;

					case 'registar_stock':
						$drogaria = new Drogaria;
						$dados = @$_POST["dados"];
						$drogaria->registar_stock($dados,$db);
						//echo json_encode(["value"=>$dados]);
					break;	
					case 'atualizar_stock':
						$drogaria = new Drogaria;
						$dados = @$_POST["dados"];
						$drogaria->atualizar_stock($dados,$db);
						//echo json_encode(["value"=>$dados]);
					break;
					case 'form_nova_entrada':
						$drogaria = new Drogaria;
						$id_produto = @$_POST["id_produto"];
						$drogaria->form_nova_entrada($id_produto,$db);
						//echo json_encode(["value"=>$id_produto]);
					break;	
					case 'registar_nova_entrada':
						$drogaria = new Drogaria;
						$dados = @$_POST["dados"];
						$drogaria->registar_nova_entrada($dados,$db);
						//echo json_encode(["value"=>$dados]);
					break;	
					case 'historico_produto':
						$drogaria = new Drogaria;
						$id_produto = @$_POST["id_produto"];
						$designacao_produto = @$_POST["designacao_produto"];
						$referencia_produto = @$_POST["referencia_produto"];
						$drogaria->historico_produto($id_produto,$designacao_produto,$referencia_produto,$db);
						//echo json_encode(["id"=>$referencia_produto]);
					break;	
					case 'historico_vendas_produto':
						$drogaria = new Drogaria;
						$id_produto = @$_POST["id_produto"];
						$drogaria->historico_vendas_produto($id_produto,$db);
						//echo json_encode(["id"=>$id_produto]);
					break;	
					case 'historico_requisicoes_drogaria':
						$drogaria = new Drogaria;
						$id_produto = @$_POST["id_produto"];
						$drogaria->historico_requisicoes_drogaria($id_produto,$db);
						//echo json_encode(["id"=>$id_produto]);
					break;
					case 'historico_entradas_produto':
						$drogaria = new Drogaria;
						$id_produto = @$_POST["id_produto"];
						$drogaria->historico_entradas_produto($id_produto,$db);
						//echo json_encode(["id"=>$id_produto]);
					break;	
					case 'historico_fornecedores_produto':
						$drogaria = new Drogaria;
						$id_produto = @$_POST["id_produto"];
						$drogaria->historico_fornecedores_produto($id_produto,$db);
						//echo json_encode(["id"=>$id_produto]);
					break;	

					case 'form_vendas':
						$drogaria = new Drogaria;
						$drogaria->form_vendas();						
						//echo json_encode(["value"=>"form_vendas"]);
					break;	

					case 'listar_designacao_produtos':
						$drogaria = new Drogaria;
						$designacao=$_POST["designacao"];
						$drogaria->listar_designacao_produtos($designacao,$db);						
						//echo json_encode(["value"=>$designacao]);
					break;

					case 'listar_referencia_produto':
						$drogaria = new Drogaria;
						$designacao_inserida=$_POST["designacao_inserida"];
						$drogaria->listar_referencia_produto($designacao_inserida,$db);						
						//echo json_encode(["value"=>$designacao_inserida]);
					break;

					case 'listar_preco_stock':
						$drogaria = new Drogaria;
						$designacao_para_stock=$_POST["designacao_para_stock"];
						$referencia_para_stock=$_POST["referencia_para_stock"];
						$drogaria->listar_preco_stock($designacao_para_stock,$referencia_para_stock,$db);						
						//echo json_encode(["value"=>$designacao_para_stock . " " . $referencia_para_stock]);
					break;
					case 'vendas':
						$drogaria = new Drogaria;
						$dados=$_POST["dados"];
						$drogaria->vendas($dados,$db);						
						//echo json_encode(["value"=>$dados]);
					break;
					case 'historico_vendas':
						$drogaria = new Drogaria;
						//$dados=$_POST["dados"];
						$drogaria->historico_vendas($db);						
						//echo json_encode(["value"=>"dadoss"]);
					break;

					case 'data_de_hoje':
						$drogaria = new Drogaria;
						$drogaria->data_de_hoje($db);						
						//$dados=$_POST["dados"];
						//echo json_encode(["value"=>""]);
					break;
					case 'pesquisa_venda':
						$drogaria = new Drogaria;
						$data_pesquisa=$_POST["data_pesquisa"];
						$drogaria->pesquisa_venda($data_pesquisa,$db);						
						//echo json_encode(["value"=>$data_pesquisa]);
					break;
					case 'historico_requisicoes':
						$drogaria = new Drogaria;
						$drogaria->historico_requisicoes($db);						
						//echo json_encode(["value"=>]);
					break;					
					case 'registar_requisicao':
						$drogaria = new Drogaria;
						$dados = @$_POST["dados"];
						$drogaria->registar_requisicao($dados,$db);						
						//echo json_encode(["value"=>$dados]);
					break;
						
						
					case 'persquisar_requisicoes':
						$drogaria = new Drogaria;
						$data_pesquisa=$_POST["data_pesquisa"];
						$drogaria->persquisar_requisicoes($data_pesquisa,$db);						
						//echo json_encode(["value"=>$data_pesquisa]);
					break;	
					
					case 'menu_maquina_carpintaria':
						$maquina_carpintaria = new Drogaria;
						$maquina_carpintaria->maquina_carpintaria($db);
					//echo json_encode(["maquina"=>"carpintaria"]);
					break;
					case 'pagamento_minuto':
						$maquina_carpintaria = new Drogaria;
						$dados = @$_POST["dados"];
						$maquina_carpintaria->pagamento_minuto($dados,$db);
						//echo json_encode(["maquina"=>$dados]);
					break;	
					case 'persquisar_pagamento_maquina':
						$maquina_carpintaria = new Drogaria;
						$data_pesquisa = @$_POST["data_pesquisa"];
						$maquina_carpintaria->persquisar_pagamento_maquina($data_pesquisa,$db);
						//echo json_encode(["maquina"=>$data_pesquisa]);
					break;


					/*--------------------------- inicio obras ---------------------------------------------*/
					case 'form_registar_obra':
						$form_registar_obra = new Drogaria;						
						$form_registar_obra->form_registar_obra();
						//echo json_encode(["maquina"=>"criar_nova_obra"]);
					break;

					case 'registar_obra':
						$registar_obra = new Drogaria;
						$dados = @$_POST["dados"];						
						$registar_obra->registar_obra($dados,$db);
						//echo json_encode(["maquina"=>$dados]);
					break;

					case 'aderir_obra':
						$aderir_obra = new Drogaria;
						$dados = @$_POST["dados"];						
						$aderir_obra->aderir_obra($dados,$db);
					break;	

					case 'folhas_pagamento':
						$folhas_pagamento = new Drogaria;
						$id_obra = @$_POST["id_obra"];						
						$folhas_pagamento->folhas_pagamento($id_obra,$db);
						//echo json_encode(["value"=>$id_obra]);
					break;
					case 'registar_data_folhas':
						$registar_data_folhas = new Drogaria;
						$id_obra_actual = @$_POST["id_obra_actual"];						
						$data_inicio_folha = @$_POST["data_inicio_folha"];						
						$data_fim_folha = @$_POST["data_fim_folha"];						
						$registar_data_folhas->registar_data_folhas($id_obra_actual,$data_inicio_folha,$data_fim_folha,$db);
						//echo json_encode(["value"=>$data_fim_folha]);
					break;		

					case 'caregar_folha_pagamento':
						$caregar_folha_pagamento = new Drogaria;
						$id_folha_caregar = @$_POST["id_folha_caregar"];						
						$id_obra_caregar = @$_POST["id_obra_caregar"];						
						$caregar_folha_pagamento->caregar_folha_pagamento($id_folha_caregar,$id_obra_caregar,$db);
						//echo json_encode(["value"=>$id_folha_caregar]);
					break;
					case 'registar_dados_dia':
						$registar_dados_dia = new Drogaria;
						$dados = @$_POST["dados"];							
						$registar_dados_dia->registar_dados_dia($dados,$db);
						//echo json_encode(["value"=>$dados]);
					break;

					case 'actualizar_registar_dados_dia':
						$actualizar_registar_dados_dia = new Drogaria;
						$dados = @$_POST["dados"];							
						$actualizar_registar_dados_dia->actualizar_registar_dados_dia($dados,$db);
						//echo json_encode(["value"=>$dados]);
					break;

					case 'persquisar_mes_folhas':
						$persquisar_mes_folhas = new Drogaria;
						$dados = @$_POST["dados"];							
						$persquisar_mes_folhas->persquisar_mes_folhas($dados,$db);
						//echo json_encode(["value"=>$dados]);
					break;	

					case 'impremir_folha_pagamento_existente':
						  $impremir_folha_pagamento_existente=new Drogaria();
						  $dados=@$_POST['dados'];
						  $impremir_folha_pagamento_existente->impremir_folha_pagamento_existente($db, $dados);
					break;

					case 'calcular_folha_pagamento_existente':
						  $calcular_folha_pagamento_existente=new Drogaria();
						  $dados=@$_POST['dados'];						 
						 $calcular_folha_pagamento_existente->calcular_folha_pagamento_existente($db,$dados);
					break;


					/*--------------------------- fim obra -------------------------------------------------*/


					/*--------------------------- inicio mostrar vendas_mensais -------------------------------------------------*/

					case 'vendas_do_mes':
						$vendas_do_mes = new Drogaria;						
						$vendas_do_mes->vendas_do_mes($db);
						//echo json_encode(["value"=>"vendas_do_mes"]);
					break;

					case 'persquisar_venda_mes_data':
						$persquisar_venda_mes_data = new Drogaria;
						$dados=$_POST['dados'];						
						$persquisar_venda_mes_data->persquisar_venda_mes_data($dados,$db);
						//echo json_encode(["value"=>$dados]);
					break;
					/*--------------------------- fim mostrar vendas_mensais -------------------------------------------------*/
				

					/*--------------------------- inicio pagamento maquina mensais -------------------------------------------------*/

					case 'pagamento_maquina_do_mes':
						$pagamento_maquina_do_mes = new Drogaria;						
						$pagamento_maquina_do_mes->pagamento_maquina_do_mes($db);
						//echo json_encode(["value"=>"pagamento maquina"]);
					break;

					case 'persquisar_pagamento_maquina_mes':
						$persquisar_pagamento_maquina_mes = new Drogaria;
						$dados=$_POST['dados'];						
						$persquisar_pagamento_maquina_mes->persquisar_pagamento_maquina_mes($dados,$db);
						//echo json_encode(["value"=>$dados]);
					break;
					/*--------------------------- fim pagamento maquina mensais -------------------------------------------------*/
					
					/*--------------------------- inicio gerar PDF -------------------------------------------------*/
					case 'impremir_stock':
						$impremir_stock = new Drogaria;
						$id_categoria_impremir=$_POST['id_categoria_impremir'];						
						$impremir_stock->impremir_stock($db,$id_categoria_impremir);
						//echo json_encode(["value"=>$id_categoria_impremir]);
					break;

					/*--------------------------- fim gerar PDF -------------------------------------------------*/


					
					/* -------------------------- inico funcoes dividas ------------------------------------------*/

					case 'historico_dividas':
						$drogaria = new Drogaria;
						$drogaria->historico_dividas($db);						
						//echo json_encode(["value"=>"dividas"]);
					break;	

					case 'registar_divida':
						$drogaria = new Drogaria;
						$dados = @$_POST["dados"];
						$drogaria->registar_divida($dados,$db);						
						//echo json_encode(["value"=>$dados]);
					break;

					case 'persquisar_divida':
						$drogaria = new Drogaria;
						$data_divida=$_POST["data_divida"];
						$drogaria->persquisar_divida($data_divida,$db);						
						//echo json_encode(["value"=>$data_pesquisa]);
					break;	

					case 'listagem_dividas_do_cliente':
						$drogaria = new Drogaria;
						$dados = @$_POST["dados"];
						$drogaria->listagem_dividas_do_cliente($dados,$db);						
						//echo json_encode(["value"=>$dados]);
					break;

					case "efetuar_pagamento_devedor":
						$efetuar_pagamento_devedor= new Drogaria;
						$dados=@$_POST["dados"];
						$efetuar_pagamento_devedor->efetuar_pagamento_devedor($dados,$db);
						//echo json_encode(["dados"=>$dados]);
					break;


					/* -------------------------- fim funcoes dividas ------------------------------------------*/

					/* -------------------------- inicio funcoes requisicoes ------------------------------------------*/

					case 'listagem_requisicoes_requisitor':
						$listagem_requisicoes_requisitor=new Drogaria;
						$dados=@$_POST["dados"];
						$listagem_requisicoes_requisitor->listagem_requisicoes_requisitor($dados,$db);
					break;



					/* -------------------------- fim funcoes requisicoes ------------------------------------------*/

				}
			break;
			case 'maquina_carpintaria';
				switch ($need) {
					case 'menu_maquina_carpintaria':
						$maquina_carpintaria = new MaquinaCarpintaria;
						$maquina_carpintaria->maquina_carpintaria($db);
					//echo json_encode(["maquina"=>"carpintaria"]);
					break;
					case 'pagamento_minuto':
						$maquina_carpintaria = new MaquinaCarpintaria;
						$dados = @$_POST["dados"];
						$maquina_carpintaria->pagamento_minuto($dados,$db);
						//echo json_encode(["maquina"=>$dados]);
					break;	
					case 'persquisar_pagamento_maquina':
						$maquina_carpintaria = new MaquinaCarpintaria;
						$data_pesquisa = @$_POST["data_pesquisa"];
						$maquina_carpintaria->persquisar_pagamento_maquina($data_pesquisa,$db);
						//echo json_encode(["maquina"=>$data_pesquisa]);
					break;								
				}
			break;
			case 'madeira':
				switch ($need) {
					case 'historico_venda_madeira':
						$historico_venda_madeira = new Madeira;
						$historico_venda_madeira->historico_venda_madeira();
					break;
					case 'stock_madeira':
						$stock_madeira = new Madeira;
						$stock_madeira->stock_madeira();
						//echo json_encode(["value"=>"olaa"]);
					break;
					case 'listagem_stock_madeira':
						$listagem_stock_madeira = new Madeira;
						$categoria_madeira=@$_POST["categoria_madeira"];
						$listagem_stock_madeira->listagem_stock_madeira($db,$categoria_madeira);
						//echo json_encode(["value"=>$categoria_madeira]);
					break;
					case 'registar_madeira':
						$registar_madeira = new Madeira;
						$dados=@$_POST["dados"];
						$registar_madeira->registar_madeira($db,$dados);
						//echo json_encode(["value"=>$dados]);
					break;
					
					default:
						echo json_encode(["Error 404.File not a Found"]);
					break;
				}
			case 'agenda':
				switch ($need) {					
					case 'caregar_agenda':
						$caregar_agenda=new Agenda;
						$caregar_agenda->caregar_agenda($db);
					break;
					case 'registar_lembrete':
						$registar_lembrete=new Agenda;
						$lembrete=@$_POST["lembrete"];
						$registar_lembrete->registar_lembrete($db,$lembrete);
					break;
					case 'desactivar_lembrete':
						$desactivar_lembrete=new Agenda;
						$id_lembrete=@$_POST["id_lembrete"];
						$desactivar_lembrete->desactivar_lembrete($db,$id_lembrete);
					break;
					
					default:
						echo json_encode(["error 404"=>"File not a found"]);
						break;
				}
				break;

				case 'construcoes_adriao':
					switch ($need) {					
						case 'gestao_dividas':
							$gestao_dividas=new ConstrucoesAdriao;
							$gestao_dividas->gestao_dividas($db);
						break;
						case 'registar_divida':
							$registar_divida=new ConstrucoesAdriao;
							$dados=@$_POST["dados"];
							$registar_divida->registar_divida($db,$dados);
						break;
						case 'dividas_do_cliente':
							$dividas_do_cliente=new ConstrucoesAdriao;
							$dados=@$_POST["dados"];
							$dividas_do_cliente->dividas_do_cliente($db,$dados);							
						break;
						case 'efetuar_pagamento_devedor_construcao':
							$efetuar_pagamento_devedor_construcao=new ConstrucoesAdriao;
							$dados=@$_POST["dados"];
							$efetuar_pagamento_devedor_construcao->efetuar_pagamento_devedor_construcao($db,$dados);							
						break;

						case 'ordem_pagamento':
							$ordem_pagamento=new ConstrucoesAdriao;
							$dados_pagamento=@$_POST["dados_pagamento"];
							$ordem_pagamento->ordem_pagamento($db,$dados_pagamento);							
						break;
						
						default:
							echo json_encode(["error 404"=>"File not a found"]);
							break;
					}
				break;
			break;



        }
	}else{    
		if(! isset( $_GET['page'] ) ){
			$page = "home";
		}else{
			$page = $_GET['page'];
		}
		show_head();
		//get page
		switch($page){
			case "home":                
				$home = new Home();
				$data['ilha'] = "Fogo";
				$data['home'] = "AM AT HOME";
				$home->index( $data['home'] );
			break; 
		}
		show_foot();
	}
  
?>
  