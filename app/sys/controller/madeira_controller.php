<?php

	namespace BenliTech\MadeiraController;

	class Madeira{

		private $view_path;

		public function historico_venda_madeira(){

			$historico_venda_madeira=dirname(__FILE__).'/../views/Madeira/historico_venda_madeira.php';

			include $historico_venda_madeira;

		}

		public function stock_madeira(){

			$stock_madeira=dirname(__FILE__).'/../views/Madeira/stock_madeira.php';

			include $stock_madeira;

		}	

		public function listagem_stock_madeira($db,$categoria_madeira){
			$dados_stock_madeira = $db->query("SELECT * FROM `madeira` where `categoria_madeira`='$categoria_madeira' order by data_registo DESC;");
		
			$_SESSION['dados_stock_madeira'] = $dados_stock_madeira;
			//$_SESSION['categoria_impremir']=$categoria;

			$listagem_stock_madeira=dirname(__FILE__).'/../views/Madeira/listagem_stock_madeira.php';

			include $listagem_stock_madeira;
			
		}

		public function registar_madeira($db,$dados){
			$numero_registo= $dados["numero_registo"];
			$categoria_madeira= $dados["categoria_madeira"];
			$comprimento_madeira = $dados["comprimento_madeira"];	
			$espessura_madeira = $dados["espessura_madeira"];
			$largura_madeira = $dados["largura_madeira"];
			$cubagem_madeira = $dados["cubagem_madeira"];
			$preco_unitario = $dados["preco_unitario"];
			$obs_madeira = $dados["obs_madeira"];
			$data_registo=date("Y-m-d");

			$array_data=explode('-',$data_registo);

			$numero_registo=$numero_registo."=>".$array_data[2]."-".$array_data[1]."-".$array_data[0];


			$query_registo_madeira=$db->query("insert into madeira (numero_registo,categoria_madeira,comprimento_madeira,
																	espessura_madeira,largura_madeira,
																	cubagem_madeira,preco_unitario,data_registo,obs_madeira) values('$numero_registo',
																	'$categoria_madeira','$comprimento_madeira',
																	'$espessura_madeira','$largura_madeira','$cubagem_madeira',
																	'$preco_unitario','$data_registo','$obs_madeira');");
		
			echo json_encode(["numberRegister"=>$numero_registo]);	
		}

		
		
	}


?>

