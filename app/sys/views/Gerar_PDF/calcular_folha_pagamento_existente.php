
<style type="text/css">
	#imprimir{
	    position: absolute;
		top: .5vw;
		right: 2vw;
		cursor:pointer;
		width:2vw;
		height:2vw;
	}
	#documento{
		font-size: 12px;
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
		font-size: 12px;
		font-weight:bold;
	}
	.rua{
		width:98%;
		text-align:center;
		font-size: 8px;
	}
	#documento h1,#documento h2,#documento h3,#documento h4, h5{
		text-align:center;
	}
	.corpo_doc{
		font-family: 'Times New Roman';
		text-align:justify;
		margin-left:0px;
		margin-right:0px;
		margin-bottom:0px;
		line-height:12px;
	}
	.corpo_doc p{
		text-align:center;
		font-weight:bold;
		font-size:11px;
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
	   font-size:11px;
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
	@media print {
		.pg-break {page-break-before: always;}
	}
</style>
<?php
		$id_folha_calcular= $_SESSION['id_folha_calcular'];
		$id_obra_calcular = $_SESSION['id_obra_calcular'];
	//IN CASE I GOT TBL THAT HAVE MORE THAN 1 FIELD LINKED TO THE SAME OTHER
	//$moreFieldsToSameTable = [];
	$db=new mysqli('localhost','root','5995330','ca');
	//$db=new mysqli('localhost','920242','adriao02015','920242');
	$data = [];
	$fieldslim = 9;
	//GET PERSONAL FIELDES
	$sql = "SELECT * FROM `marcacao_dia_trabalho` where id_obra ='$id_obra_calcular' and id_folha='$id_folha_calcular';";
	$fieldper = $db->query($sql)or die('Erro ao tentar pegar as tabelas personalizadas!!! '.$db->error);
	$fieldlist = array();

	if($fieldper->num_rows > 0){

		while($cmp = $fieldper->fetch_array()){
		
			$fieldlist[] = array('nome_trabalhador'=>$cmp['nome_trabalhador'],
								 'preco_hora'=>$cmp['preco_hora'],
								 'hora_segunda'=>$cmp['hora_segunda'],
								 'hora_terca'=>$cmp['hora_terca'],
								 'hora_quarta'=>$cmp['hora_quarta'],
								 'hora_quinta'=>$cmp['hora_quinta'],
								 'hora_sexta'=>$cmp['hora_sexta'],
								 'hora_sabado'=>$cmp['hora_sabado'],
								 'total'=>$cmp['total'],
								 'observacao'=>$cmp['observacao']
								 );
			
		}		
	}

	
		$query_obra=$db->query("SELECT * FROM `obra` where id_obra='$id_obra_calcular';");
		$dados_obra=$query_obra->fetch_array();

		$query_folha=$db->query("SELECT *FROM `semana_folhas_pagamento` where id_folha='$id_folha_calcular';");
		$dados_folha=$query_folha->fetch_array();

		$array_data_inicio=split('-', $dados_folha["inicio_folha"]);
		$array_data_fim=split('-', $dados_folha["fim_folha"]);

		$ordem_data_inicio=$array_data_inicio[2].'-'.$array_data_inicio[1].'-'.$array_data_inicio[0];
		$ordem_data_fim=$array_data_fim[2].'-'.$array_data_fim[1].'-'.$array_data_fim[0];

		 echo '	<i id="imprimir" class="fa fa-print"></i> 
				<div id="documento">
					<!--<div id="border">-->
						<div class="logo"><img src="img/log_adriao.png"></div>
						<br>
						<div class="">Telefone: 2551414/9919079</div>
						<div class="">Caixa Posta: 45 Vila do Maio</div>
						<div class="">email: c.adriao@cvtelecom.cv</div>
						<br>						
						<br>

				        <div> Obra: ' . $dados_obra["dono_da_obra"].' </div>
				        <div id="negrito"> Data: De '.$ordem_data_inicio.' a '.$ordem_data_fim.'   </div>
				        <div> Encaregado: ' .$dados_obra["responsavel_da_obra"] .' </div>
						<br>
						<h5>Folha de Pagamento '.mb_convert_case("", MB_CASE_UPPER, "UTF-8").'</h5>

				        <div class="">
				        	<table class="table">
				        		<thead class="">
				        			<tr>
				        				<td>Nº</td>
				        				<td>Nome</td>
				        				<td>D. de Trab.</td>
				        				<td>Preço/Dia</td>
				        				<td>Total/Dia</td>
				        				<td>Hora Extra</td>
				        				<td>Preço Hora</td>
				        				<td>Total/Hora</td>
				        				<td>Total/Liquido</td>
				        				<td>Assinatura</td>
				        			<tr>
				        		</thead>
				        		<tbody class="">';
				        		$num=1;
				        		$hora_extra=0;
				        		$dia_trabalho=0;
				        		$preco_dia=0;
				        		$total_hora_extra_pagar=0;
				        		$total_dia_limpo=0;
				        		$total_liquido=0;
				        		$total_semana_liquido=0;
				        		$preco_dia_com_separador='';
				        		$total_dia_limpo_com_separador='';
				        		$total_semana_liquido_com_separador='';
				        		$total_hora_extra_pagar_com_separador='';

				     	for($i=0; $i < count($fieldlist); $i++){
				     		$arrayHora="";
		     				$preco_dia=$fieldlist[$i]['preco_hora']*8;
		     				$array_preco_dia=str_split($preco_dia);
		     				if(count($array_preco_dia)==4 && $array_preco_dia[2]!='.'){
		     					$preco_dia_com_separador=$array_preco_dia[0].'.'.$array_preco_dia[1].$array_preco_dia[2].$array_preco_dia[3].'$00';
		     					
		     				}elseif(count($array_preco_dia)==5 && $array_preco_dia[3]!='.'){
		     					$preco_dia_com_separador=$array_preco_dia[0].$array_preco_dia[1].'.'.$array_preco_dia[2].$array_preco_dia[3].$array_preco_dia[4].'$00';
		     					
		     				}elseif(count($array_preco_dia)==5 && $array_preco_dia[3]=='.'){
		     					$preco_dia_com_separador=$array_preco_dia[0].$array_preco_dia[1].$array_preco_dia[2].','.$array_preco_dia[4].'$00';
		     					
		     				}else{
		     					$preco_dia_com_separador=$preco_dia.'$00';
		     				}
		     				$arrayHora = array(
		     									$fieldlist[$i]['hora_segunda'],
     										   	$fieldlist[$i]['hora_terca'],
     										   	$fieldlist[$i]['hora_quarta'],
     										   	$fieldlist[$i]['hora_quinta'],
     										   	$fieldlist[$i]['hora_sexta'],
     										   	$fieldlist[$i]['hora_sabado']
		     								   );
		     				
		     				for($t=0;$t<count($arrayHora);$t++){

				     			if($arrayHora[$t]==8){
				     				$dia_trabalho+=1;
				     			}elseif ($arrayHora[$t]>8) {
				     				$dia_trabalho+=1;
				     				$hora_extra=$hora_extra+($arrayHora[$t]-8);
				     			}elseif ($arrayHora[$t]>=0 && $arrayHora[$t]<8 ) {
				     				$hora_extra=$hora_extra+$arrayHora[$t];
				     			}else{
				     				$a=0;
				     			}
				     			
				     		}
				     	

				     		$total_dia_limpo=$dia_trabalho*$preco_dia;
				     		$array_total_dia_limpo=str_split($total_dia_limpo);
				     		if(count($array_total_dia_limpo)==4){
				     			$total_dia_limpo_com_separador=$array_total_dia_limpo[0].'.'.$array_total_dia_limpo[1].$array_total_dia_limpo[2].$array_total_dia_limpo[3].'$00';
				     		}elseif (count($array_total_dia_limpo)==5) {
				     			$total_dia_limpo_com_separador=$array_total_dia_limpo[0].$array_total_dia_limpo[1].'.'.$array_total_dia_limpo[2].$array_total_dia_limpo[3].$array_total_dia_limpo[4].'$00';
				     		}else{
				     			$total_dia_limpo_com_separador=$total_dia_limpo.'$00';
				     		}
				     		
				     		$total_hora_extra_pagar=$hora_extra*$fieldlist[$i]['preco_hora'];

				     		$array_total_hora_extra_pagar=str_split($total_hora_extra_pagar);

				     		if(count($array_total_hora_extra_pagar)==4 && $array_total_hora_extra_pagar[2]!='.' ){
				     			$total_hora_extra_pagar_com_separador=$array_total_hora_extra_pagar[0].'.'.$array_total_hora_extra_pagar[1].$array_total_hora_extra_pagar[2].$array_total_hora_extra_pagar[3].'$00';
				     		}elseif (count($array_total_hora_extra_pagar)==5 && $array_total_hora_extra_pagar[3]!='.' ) {
				     			$total_hora_extra_pagar_com_separador=$array_total_hora_extra_pagar[0].$array_total_hora_extra_pagar[1].'.'.$array_total_hora_extra_pagar[2].$array_total_hora_extra_pagar[3].$array_total_hora_extra_pagar[4].'$00';
				     		}elseif (count($array_total_hora_extra_pagar)==6 && $array_total_hora_extra_pagar[4]!='.' ) {
				     			$total_hora_extra_pagar_com_separador=$array_total_hora_extra_pagar[0].$array_total_hora_extra_pagar[1].'.'.$array_total_hora_extra_pagar[2].$array_total_hora_extra_pagar[3].$array_total_hora_extra_pagar[4].'.'.$array_total_hora_extra_pagar[5].'$00';
				     		}elseif (count($array_total_hora_extra_pagar)==6 && $array_total_hora_extra_pagar[4]=='.' ) {
				     			$total_hora_extra_pagar_com_separador=$array_total_hora_extra_pagar[0].'.'.$array_total_hora_extra_pagar[1].$array_total_hora_extra_pagar[2].$array_total_hora_extra_pagar[3].','.$array_total_hora_extra_pagar[5].'$00';
				     		}elseif (count($array_total_hora_extra_pagar)==7 && $array_total_hora_extra_pagar[5]!='.') {
				     			$total_hora_extra_pagar_com_separador=$array_total_hora_extra_pagar[0].$array_total_hora_extra_pagar[1].'.'.$array_total_hora_extra_pagar[2].$array_total_hora_extra_pagar[3].$array_total_hora_extra_pagar[4].'.'.$array_total_hora_extra_pagar[5].$array_total_hora_extra_pagar[6].'$00';
				     		}elseif (count($array_total_hora_extra_pagar)==7 && $array_total_hora_extra_pagar[5]=='.') {
				     			$total_hora_extra_pagar_com_separador=$array_total_hora_extra_pagar[0].$array_total_hora_extra_pagar[1].'.'.$array_total_hora_extra_pagar[2].$array_total_hora_extra_pagar[3].$array_total_hora_extra_pagar[4].','.$array_total_hora_extra_pagar[6].'$00';
				     		}else{
				     			$total_hora_extra_pagar_com_separador=$total_hora_extra_pagar.'$00';
				     		}


				     		$total_semana_liquido=$total_dia_limpo+$total_hora_extra_pagar;

				     		$array_total_semana_liquido=str_split($total_semana_liquido);
				     		if(count($array_total_semana_liquido)==4 && $array_total_semana_liquido[2]!='.' ){
				     			$total_semana_liquido_com_separador=$array_total_semana_liquido[0].'.'.$array_total_semana_liquido[1].$array_total_semana_liquido[2].$array_total_semana_liquido[3].'$00';
				     		}elseif (count($array_total_semana_liquido)==5 && $array_total_semana_liquido[3]!='.' ) {
				     			$total_semana_liquido_com_separador=$array_total_semana_liquido[0].$array_total_semana_liquido[1].'.'.$array_total_semana_liquido[2].$array_total_semana_liquido[3].$array_total_semana_liquido[4].'$00';
				     		}elseif (count($array_total_semana_liquido)==6 && $array_total_semana_liquido[4]!='.' ) {
				     			$total_semana_liquido_com_separador=$array_total_semana_liquido[0].$array_total_semana_liquido[1].'.'.$array_total_semana_liquido[2].$array_total_semana_liquido[3].$array_total_semana_liquido[4].'.'.$array_total_semana_liquido[5].'$00';
				     		}elseif (count($array_total_semana_liquido)==6 && $array_total_semana_liquido[4]=='.' ) {
				     			$total_semana_liquido_com_separador=$array_total_semana_liquido[0].'.'.$array_total_semana_liquido[1].$array_total_semana_liquido[2].$array_total_semana_liquido[3].','.$array_total_semana_liquido[5].'$00';
				     		}elseif (count($array_total_semana_liquido)==7 && $array_total_semana_liquido[5]!='.') {
				     			$total_semana_liquido_com_separador=$array_total_semana_liquido[0].$array_total_semana_liquido[1].'.'.$array_total_semana_liquido[2].$array_total_semana_liquido[3].$array_total_semana_liquido[4].'.'.$array_total_semana_liquido[5].$array_total_semana_liquido[6].'$00';
				     		}elseif (count($array_total_semana_liquido)==7 && $array_total_semana_liquido[5]=='.') {
				     			$total_semana_liquido_com_separador=$array_total_semana_liquido[0].$array_total_semana_liquido[1].'.'.$array_total_semana_liquido[2].$array_total_semana_liquido[3].$array_total_semana_liquido[4].','.$array_total_semana_liquido[6].'$00';
				     		}else{
				     			$total_semana_liquido_com_separador=$total_semana_liquido.'$00';
				     		}
				     		

				     		


				     			echo '<tr style="text-align:center">
				     					<td>'.$num.'</td>
				     					<td>'.$fieldlist[$i]['nome_trabalhador'].'</td>	
				     					<td>'.$dia_trabalho.'</td>
				     					<td>'.$preco_dia_com_separador.'</td>
				     					<td>'.$total_dia_limpo_com_separador.'</td>
				     					<td>'.$hora_extra.'</td>
				     					<td>'.$fieldlist[$i]['preco_hora'].'$00</td>
				     					<td>'.$total_hora_extra_pagar_com_separador.'</td>
				     					<td>'.$total_semana_liquido_com_separador.'</td>
				     					<td></td>
				     					
				     				  </tr>';

				        		$hora_extra=0;
				        		$dia_trabalho=0;
				        		$preco_dia=0;
				        		$total_hora_extra_pagar=0;
				        		$total_dia_limpo=0;
				        		$total_liquido=0;
				        		$total_semana_liquido=0;
				        		$preco_dia_com_separador='';
				        		$total_dia_limpo_com_separador='';
				        		$total_semana_liquido_com_separador='';
				        		$total_hora_extra_pagar_com_separador='';
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