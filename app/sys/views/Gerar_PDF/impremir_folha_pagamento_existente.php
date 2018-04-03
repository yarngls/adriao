
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
		$id_folha_impremir = $_SESSION['id_folha_impremir'];
		$id_obra_impremir = $_SESSION['id_obra_impremir'];
	//IN CASE I GOT TBL THAT HAVE MORE THAN 1 FIELD LINKED TO THE SAME OTHER
	//$moreFieldsToSameTable = [];
	$db=new mysqli('localhost','root','5995330','ca');
	$data = [];
	$fieldslim = 9;
	//GET PERSONAL FIELDES
	$sql = "SELECT * FROM `marcacao_dia_trabalho` where id_obra ='$id_obra_impremir' and id_folha='$id_folha_impremir';";
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

	
	/*$tbl='';
	for($i=0; $i < count($fieldlist); $i++){
		$tbl .= '<tr>';
			$content = (strlen($fieldlist[$i]['nome_cliente']) > 10)? substr($fieldlist[$i]['nome_cliente'],0,10).'...' : $fieldlist[$i]['nome_cliente'];
			$tbl .= '<td>'.$content.'</td>';
			$tbl .= '<td>'.$fieldlist[$i]['ilha_cliente'].'</td>';
			$tbl .= '<td>'.$fieldlist[$i]['cidade_cliente'].'</td>';
			$tbl .= '<td>'.$fieldlist[$i]['zona_cliente'].'</td>';
			$tbl .= '<td>'.$fieldlist[$i]['contato_cliente'].'</td>';
			$tbl .= '<td>'.$fieldlist[$i]['email_cliente'].'</td>';
		$tbl .= '</tr>';
	}*/
				
			
	/*$query = $db->query('SHOW FULL COLUMNS FROM `'.$table.'`')or die('Erro ao tentar pegar a descricao');
	if($query->num_rows > 0){
		$i = 0;		
		$fields = '';
		$cond = '';
		$orderby = '';
		$where = '';		
		$tbl  = '<table class="print">';
		$tbl .= '<tr>';
		$n = $query->num_rows;
		while($res = $query->fetch_array()){
			$i ++;
			$campo = $res[0];
			//CRIAR A CLAUSULA ORDER BY
			if($res[0]=='Data'){
				$orderby = 'ORDER BY `Data` DESC';
			}
			//VERIFICAR SE O CAMPO E UM FK E CRIAR INFRAESTROTURA PARA SUPORATAR INSTANT SEARCH
			if($res[4]=='MUL'){				
				//GET THE ORIGIN TABLE AND FIELD
				$fktbl = "SELECT `KEY_COLUMN_USAGE`.`REFERENCED_TABLE_NAME` AS `REFTable`,`KEY_COLUMN_USAGE`.`REFERENCED_COLUMN_NAME` AS `REFKey`
						  FROM `INFORMATION_SCHEMA`.`KEY_COLUMN_USAGE` 
						  WHERE  `KEY_COLUMN_USAGE`.`CONSTRAINT_SCHEMA`='".$GLOBALS['database']."'
							AND `KEY_COLUMN_USAGE`.`TABLE_NAME`='".$table."'
							AND `KEY_COLUMN_USAGE`.`COLUMN_NAME`='".$campo."';";
				$rfktbl = mysqli_fetch_array(mysqli_query($db,$fktbl));
				//CHK IF IS THERE ANY MORE FK's IN THIS TABLE WITH THE SAME REFERENCES
				$chkMorFieldSameRef = "SELECT `COLUMN_NAME` AS `FKFieldSameRef`
				FROM `INFORMATION_SCHEMA`.`KEY_COLUMN_USAGE`
				WHERE  `TABLE_SCHEMA` = '".$GLOBALS['database']."'
					AND `TABLE_NAME` = '".$table."'
					AND `COLUMN_NAME` != '".$campo."'
					AND `REFERENCED_TABLE_NAME` = '".$rfktbl['REFTable']."'
					AND `REFERENCED_COLUMN_NAME` = '".$rfktbl['REFKey']."';";
				$ReschkMorFieldSameRef = $db->query($chkMorFieldSameRef)or die('Erro ao tentar verificar a existencia de mais FK´s com mesma ref. '.$db->error);
				//JOINS				
				if($ReschkMorFieldSameRef->num_rows > 0){
					if(in_array($campo,$moreFieldsToSameTable)==false){
						$cond .='LEFT OUTER JOIN `'.$rfktbl['REFTable'].'` ON `'.$table.'`.`'.$campo.'` = `'.$rfktbl['REFTable'].'`.`'.$rfktbl['REFKey'].'`' ;
						while($RchkFKsameRef = $ReschkMorFieldSameRef->fetch_array()){
							$moreFieldsToSameTable[] = $RchkFKsameRef[0];
						}
					}					
				}else{
					$cond .='LEFT OUTER JOIN `'.$rfktbl['REFTable'].'` ON `'.$table.'`.`'.$campo.'` = `'.$rfktbl['REFTable'].'`.`'.$rfktbl['REFKey'].'`' ; 
				} 
				//FIELDS
				$vir = ($i == $n)? "" : ",";
				$fields .=  '`'.$rfktbl['REFTable'].'`.`'.substr($rfktbl['REFKey'],2).'`'.$vir;
				//WHERE CLAUSURE
				if(isset($key)==true && empty($key)==false){
					$or = ($i == $n)? "" : " OR ";
					$where .=  '`'.$rfktbl['REFTable'].'`.`'.substr($rfktbl['REFKey'],2).'` LIKE \'%'.$key.'%\' '.$or;
				}
			}else{
				// CAMPOS
				$vir = ($i == $n)? "" : ",";
				$fields .=  '`'.$table.'`.`'.$campo.'`'.$vir;
				//WHERE CLAUSURE
				if(isset($key)==true && empty($key)==false){
					$or = ($i == $n)? "" : " OR ";
					$where .=  '`'.$table.'`.`'.$campo.'` LIKE \'%'.$key.'%\' '.$or;
				}				
			}
			//DEFINIR SE ACEITA NULL
			$attrNotNull = 'not-null="false"';
			if($res[3]=='NO'){
				$attrNotNull = 'not-null="true"';
			}
			//DEFINIR O TIPO DE INPUT
			$addClassDate = '';
			$inputType = 'text';
			if($res[1]=='date' || $res[1]=='datetime'){
				$addClassDate = ' date';
				$inputType = 'date';
			}
			//LABEL
			if($res[8]!=''){
				$label = $res[8];//POR O COMENTARIO COMO LABEL DO CAMPO
			}else{
				$label = strtoupper(substr($res[0],0,1)).substr($res[0],1,strlen($res[0]));
				if(count(explode('_',$res[0]))>1){
					$ex = explode('_',$res[0]);
					if($ex[0]=='id' || $ex[0]=='cod' || $ex[0]=='codigo'){
						$label = strtoupper(substr($ex[1],0,1)).substr($ex[1],1,strlen($ex[1]));
					}else{
						$label = strtoupper(substr($ex[0],0,1)).substr($ex[0],1,strlen($ex[0])).' '.strtoupper(substr($ex[1],0,1)).substr($ex[1],1,strlen($ex[1]));
					}
				}
			}			
			if($res[4]!='PRI' /*&& $res[5]==''*///){
				/*if(empty($fieldlist)===false){
					if(in_array((int)($i-1),$fieldlist)){
						$tbl .= '<th name="'.$res[0].'" i="'.$i.'" id="linha-'.$i.'" class="linha">'.$label.'</th>';
					}
				}else if($i < ($fieldslim+1)){
					$tbl .= '<th name="'.$res[0].'" i="'.$i.'" id="linha-'.$i.'" class="linha">'.$label.'</th>';
				}				
			}
		}*/		
		/*$tbl .= '</tr>';
		$sql = "SELECT `MT`.*,`T`.`Tabela` 
				FROM `TBLModuloTabela` `MT`, `TBLTabela` `T` 
				WHERE `MT`.`IdModulo`='1'
					AND `MT`.`IdTabela`=`T`.`IdTabela`
					AND `T`.`Tabela`='".$table."';";
		$t = mysqli_query($db,$sql) or die($db->error);
		$tech = '';
		if($t->num_rows > 0 && $_SESSION['IdTipoUtilizador'] == 3){
			$tech = $_SESSION['IdUtilizador'];
		}
		if($where != '' && $tech == ''){
			$where = 'WHERE '.$where;
		}else if($where != '' && $tech != ''){
			$where = 'WHERE '.$where.'
						AND `'.$table.'`.`IdUtilizador`=\''.$tech.'\'';
		}else if($where == '' && $tech != ''){
			$where = 'WHERE `'.$table.'`.`IdUtilizador`=\''.$tech.'\'';
		}*/
		//SQL QUERY				
		/*$sql  = 'SELECT'.$fields.'
				 FROM `'.$table.'`
				 '.$cond.'
				 '.$where.'
				 '.$orderby.'';*/
		// $tbl .= '<tr><td colspan="'.$fieldslim.'">'.$sql.'</td></tr>';
		/*$q = $db->query($sql)or die('erro ao tentar trazer os dados: '.$db->error);
		if($q->num_rows > 0){
			$n = 0;
			while($r = $q->fetch_array()){
				$n++;
				$tbl .= '<tr>';
				for($i=0; $i < mysqli_num_fields($q); $i++){//mysqli_num_fields()
					$resulti = strip_tags($r[$i]); 
					$content = (strlen($resulti) > 40)? substr($resulti,0,40).'...' : $resulti;
					if(empty($fieldlist)===false){
						if(in_array($i,$fieldlist)){
							$tbl .= '<td>'.$content.'</td>';
						}
					}else if($i < $fieldslim && $i > 0){
						$tbl .= '<td>'.$content.'</td>';
					}
				}
			}
		}else{
			$tbl .= '<tr><td colspan="'.$fieldslim.'"><b style="color:#E6222C;">Não foi encontrado nenhum resultado!!!</b></td></tr>';
		}*/
		//$tbl .= '</table>';
		//GET THE USER DATA
		/*$sql = "SELECT `U`.*,`P`.`Perfil` 
				FROM `TBLUtilizador` `U`
				LEFT OUTER JOIN `TBLPerfil` `P` ON `U`.`IdPerfil`=`P`.`IdPerfil`
				WHERE `U`.`IdUtilizador`='".$_SESSION['IdUtilizador']."'";
		$userData = mysqli_fetch_array(mysqli_query($db,$sql));*/
		#IMPRIMINDO NO ECRA
		$query_obra=$db->query("SELECT * FROM `obra` where id_obra='$id_obra_impremir';");
		$dados_obra=$query_obra->fetch_array();

		$query_folha=$db->query("SELECT *FROM `semana_folhas_pagamento` where id_folha='$id_folha_impremir';");
		$dados_folha=$query_folha->fetch_array();

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
				        <div> Data: De '. $dados_folha["inicio_folha"].' a '.$dados_folha["fim_folha"].'   </div>
				        <div> Encaregado: ' .$dados_obra["responsavel_da_obra"] .' </div>
						<br>
						<h5>Folha de registo do dia trabalho '.mb_convert_case("", MB_CASE_UPPER, "UTF-8").'</h5>

				        <div class="">
				        	<table class="table">
				        		<thead class="">
				        			<tr>
				        				<td>Nº</td>
				        				<td>Nome</td>
				        				<td>Preço Hora</td>
				        				<td>2ª</td>
				        				<td>3ª</td>
				        				<td>4ª</td>
				        				<td>5ª</td>
				        				<td>6ª</td>
				        				<td>Sabado</td>
				        				<td>Total</td>
				        				<td>Observações</td>
				        			<tr>
				        		</thead>
				        		<tbody class="">';
				        		$num=1;
				     	for($i=0; $i < count($fieldlist); $i++){

				     			echo '<tr style="text-align:center">
				     					<td>'.$num.'</td>
				     					<td>'.$fieldlist[$i]['nome_trabalhador'].'</td>
				     					<td>'.$fieldlist[$i]['preco_hora'].'</td>
				     					<td>'.$fieldlist[$i]['hora_segunda'].'</td>
				     					<td>'.$fieldlist[$i]['hora_terca'].'</td>
				     					<td>'.$fieldlist[$i]['hora_quarta'].'</td>
				     					<td>'.$fieldlist[$i]['hora_quinta'].'</td>
				     					<td>'.$fieldlist[$i]['hora_sexta'].'</td>
				     					<td>'.$fieldlist[$i]['hora_sabado'].'</td>
				     					<td>'.$fieldlist[$i]['total'].'</td>
				     					<td>'.$fieldlist[$i]['observacao'].'</td>
				     					
				     				  </tr>';
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