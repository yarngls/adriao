<style type="text/css">
	#imprimir{
	    position: absolute;
		top: .5vw;
		right: 2vw;
		cursor:pointer;
		width:2vw;
		height:2vw;
		font-size:10px !important;
	}
	#documento{
		font-size:10px !important;
		font-family: 'Times New Roman';
	}
	#border{
		border:2px solid #111;
		height:100%;
	}
	.logo{
		
		margin-top:0px;
		width:100%;
	}
	.logo img{
		width:12vw;
		height:auto;
		height: 6vh;
	}
	.nome{
		width:98%;
		text-align:center;
		font-size:10 !important;
		font-weight:bold;
	}
	.rua{
		width:98%;
		text-align:center;
		font-size:10px !important;
	}
	#documento h1,#documento h2,#documento h3,#documento h4, h5{
		text-align:center;
		font-size:10px !important;
	}
	.corpo_doc{
		font-family: 'Times New Roman';
		text-align:justify;
		margin-left:0px;
		margin-right:0px;
		margin-bottom:0px;
		line-height:12px;
		font-size:10px !important;
	}
	.corpo_doc p{
		text-align:center;
		font-weight:bold;
		font-size:10 !important;
	}
	
	.print,.print th, .print td{
		 border-bottom:1px dotted #eee;		 
	}
	.print{
	  border-collapse:collapse;
	  width:100%;
	  margin:auto;
	}
	.print th{
	   padding:4px;
	   font-size:10px;
	   background:#eee;
	   text-align: center;
	   font-family: 'Times New Roman';
	}
	.print td{
	   padding:4px 2px;
	   vertical-align:middle;
	   text-align:left;
	   font-size:10px;
	   text-align: center;
	}
	.table > thead > tr > th {
	  border-bottom: 1px solid #DDDDDD;
	  vertical-align: bottom;
	}
	.centro{
		text-align: center;
	}
	.table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td {
	  border-top: 1px solid #e7eaec;
	  line-height: 1.42857;
	  padding: 8px;
	  vertical-align: top;
	}
	.table .centro{
		font-size: 12px !important;
		
	}
	.total{
		font-size: 10px;
	}
	@media print {
		.pg-break {page-break-before: always;}
	}
</style>
<?php
		$id_categoria_para_impremir_pdf= $_SESSION['id_categoria_para_impremir'];
	//IN CASE I GOT TBL THAT HAVE MORE THAN 1 FIELD LINKED TO THE SAME OTHER
	//$moreFieldsToSameTable = [];
	//$db=new mysqli('localhost','root','5995330','ca');
	$db=new mysqli('localhost','920242','adriao02015','920242');
	$data = [];
	$fieldslim = 9;
	//GET PERSONAL FIELDES
	$sql = "SELECT * FROM `produto` where categoria ='$id_categoria_para_impremir_pdf';";

	$fieldper = $db->query($sql)or die('Erro ao tentar pegar as tabelas personalizadas!!! '.$db->error);
	$fieldlist = array();

	if($fieldper->num_rows > 0){

		while($cmp = $fieldper->fetch_array()){
		
			$fieldlist[] = array('designacao'=>$cmp['designacao'],
								 'referencia'=>$cmp['referencia'],
								 'quantidade'=>$cmp['quantidade'],
								 'preco_compra'=>$cmp['preco_compra'],
								 'preco_venda'=>$cmp['preco_venda']
								 );
			
		}		
	}

		 echo '	<i id="imprimir" class="fa fa-print"></i> 
				<div id="documento">
					<!--<div id="border">-->
						<div class="logo"><img src="img/log_adriao.png"></div>
						<br>
						<div class="font">Telefone: 2551414/9919079</div>
						<div class="">Caixa Posta: 45 Vila do Maio</div>
						<div class="">email: c.adriao@cvtelecom.cv</div>
						<br>						
						<br>

				        <div> </div>
				        <div id="negrito"> </div>
				        <div></div>
						<br>
						<h5 class="total">Panilha de Stock de Material - CATEGORIA '.mb_convert_case("", MB_CASE_UPPER, "UTF-8").strtoupper($id_categoria_para_impremir_pdf).'</h5>';
						$total_gearl_em_dinheiro=0;
						$total_gearl_em_dinheiro_com_separador='';
						for ($c=0;$c<count($fieldlist);$c++){
							$total_gearl_em_dinheiro=$total_gearl_em_dinheiro+($total_stock_em_dinheiro=$fieldlist[$c]['preco_venda']*$fieldlist[$c]['quantidade']);
						}
						$total_gearl_em_dinheiro_arredondado=ceil($total_gearl_em_dinheiro);
						$array_total_gearl_em_dinheiro_arredondado=str_split($total_gearl_em_dinheiro_arredondado);
						 if(count( $array_total_gearl_em_dinheiro_arredondado)<4){
		                    $total_gearl_em_dinheiro_com_separador=$total_gearl_em_dinheiro.'$00';
		                  }elseif (count( $array_total_gearl_em_dinheiro_arredondado)==4) {
		                    $total_gearl_em_dinheiro_com_separador=$array_total_gearl_em_dinheiro_arredondado[0].'.'.$array_total_gearl_em_dinheiro_arredondado[1].$array_total_gearl_em_dinheiro_arredondado[2].$array_total_gearl_em_dinheiro_arredondado[3].'$00';
		                  }elseif (count( $array_total_gearl_em_dinheiro_arredondado)==5) {
		                    $total_gearl_em_dinheiro_com_separador=$array_total_gearl_em_dinheiro_arredondado[0].$array_total_gearl_em_dinheiro_arredondado[1].'.'.$array_total_gearl_em_dinheiro_arredondado[2].$array_total_gearl_em_dinheiro_arredondado[3].$array_total_gearl_em_dinheiro_arredondado[4].'$00';
		                  }elseif (count( $array_total_gearl_em_dinheiro_arredondado)==6) {
		                    $total_gearl_em_dinheiro_com_separador=$array_total_gearl_em_dinheiro_arredondado[0].$array_total_gearl_em_dinheiro_arredondado[1].$array_total_gearl_em_dinheiro_arredondado[2].'.'.$array_total_gearl_em_dinheiro_arredondado[3].$array_total_gearl_em_dinheiro_arredondado[4].$array_total_gearl_em_dinheiro_arredondado[5].'$00';
		                  }elseif (count( $array_total_gearl_em_dinheiro_arredondado)==7) {
		                    $total_gearl_em_dinheiro_com_separador=$array_total_gearl_em_dinheiro_arredondado[0].'.'.$array_total_gearl_em_dinheiro_arredondado[1].$array_total_gearl_em_dinheiro_arredondado[2].$array_total_gearl_em_dinheiro_arredondado[3].'.'.$array_total_gearl_em_dinheiro_arredondado[4].$array_total_gearl_em_dinheiro_arredondado[5].$array_total_gearl_em_dinheiro_arredondado[6].'$00';
		                  }else{
		                    $total_gearl_em_dinheiro_com_separador=$total_gearl_em_dinheiro.'$00';
		                  }
						echo '<h5>Total de Material em Dinheiro = '.$total_gearl_em_dinheiro_com_separador.'</h5>
				        <div class="">
				        	<table class="table">
				        		<thead class="centro">
				        			<tr>
				        				<td>Nº</td>
				        				<td>Designação</td>
				        				<td>Referência</td>
				        				<td>Stock</td>
				        				<td>Preço Compra</td>
				        				<td>Preço Venda</td>
				        				<td>Total</td>
				        			<tr>
				        		</thead>
				        		<tbody class="">';
				        		$num=1;
				        		$total_stock_em_dinheiro=0;

				     	for($i=0; $i < count($fieldlist); $i++){
				     		$total_stock_em_dinheiro=$fieldlist[$i]['preco_venda']*$fieldlist[$i]['quantidade'];
				     		$designacao_limitado = (strlen($fieldlist[$i]['designacao']) > 30)? substr($fieldlist[$i]['designacao'],0,40).'...' : $fieldlist[$i]['designacao'];

			     			echo '<tr style="text-align:center" class="centro">
			     					<td>'.$num.'</td>
			     					<td>'.$designacao_limitado.'</td>
			     					<td>'.$fieldlist[$i]['referencia'].'</td>
			     					<td>'.$fieldlist[$i]['quantidade'].'</td>
			     					<td>'.$fieldlist[$i]['preco_compra'].'$00</td>
			     					<td>'.$fieldlist[$i]['preco_venda'].'$00</td>
			     					<td>'.$total_stock_em_dinheiro.'$00</td>
			     					<td></td>
			     					
			     				  </tr>';

			        		$total_stock_em_dinheiro=0;
			     			$num++;
			     		}	    			
				        			
				        			
				        			
				    echo   		'</tbody>
				        	<table>							
							<br>
							<p class="centro"></p>
							<br>						
						</div>
					<!--</div>-->
				</div>';
	//}


?> 
<script type="text/javascript" language="javascript" src="js/jQuery.print.js"></script>
<script type="text/javascript" name="javascript">
	$(document).ready(function(){
		$("#documento").print({
			globalStyles : true, // Use Global styles
			mediaPrint : true, // Add link with attrbute media=print
			//stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata", //Custom stylesheet
			iframe : true, //Print in a hidden iframe
			//noPrintSelector : ".avoid-this", // Dont print this
			append : "Free jQuery Plugins<br/>", // Add this on top
			prepend : "<br/>jQueryScript.net" // Add this at bottom
		});
		$('#imprimir').click(function(){
			$("#documento").print({
				globalStyles : true, // Use Global styles
				mediaPrint : true, // Add link with attrbute media=print
				//stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata", //Custom stylesheet
				iframe : true, //Print in a hidden iframe
				//noPrintSelector : ".avoid-this", // Dont print this
				append : "Free jQuery Plugins<br/>", // Add this on top
				prepend : "<br/>jQueryScript.net" // Add this at bottom
			});		
		});
	});
</script>