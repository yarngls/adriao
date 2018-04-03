<?php
	
	$id_obra_caregar_existente=$_SESSION['id_obra_nova_folha'];
	$id_folha_caregar_existente=$_SESSION['id_folha_caregar'];
	$dados_trabalhador_registado=$_SESSION['dados_trabalhador_registado'];
	//var_dump($dados_trabalhador_registado);	


?>

	  <!-- inicio do Modal para criar Folha-->
        <div class="modal fade" style="width:100vw;" id="myModalPDF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width:80vw; margin-left:18vw; height:100vh;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalPDF">Lista de Folhas</h4>
              </div>
              <div class="modal-body" id="myModalPDF-body" style="">
                
               
              </div>                 
            </div>
          </div>
        </div>

        <!-- fim do Modal para criar folha-->
		
	<div class="ibox-content">
	<div style="float:right;">
		 <button class="btn btn-outline btn-primary dim" id="guardar_folha_pagamento_existente" style="margin-left:2vw;" type="button"><i class="fa fa-save"></i></button>
		 <button class="btn btn-outline btn-primary dim" id_obra_impremir="<?php echo $id_obra_caregar_existente ?>" id_folha_impremir="<?php $id_folha_caregar_existente ?>" id="impremir_folha_pagamento_existente" style="margin-left:2vw;" type="button"><i class="fa fa-print"></i></button>
		 <button class="btn btn-outline btn-primary dim" id_obra_impremir="<?php echo $id_obra_caregar_existente ?>" id_folha_impremir="<?php $id_folha_caregar_existente ?>" id="calcular_folha_pagamento_existente" style="margin-left:2vw;" type="button"><i class="fa fa-calculator"></i></button>
		 <button class="btn btn-outline btn-primary dim" id_obra_exel="<?php echo $id_obra_caregar_existente ?>" id_folha_exel="<?php $id_folha_caregar_existente ?>" id_obra id="exel_folha_pagamento_existente" style="margin-left:2vw;" type="button"><i class="fa fa-file-excel-o"></i></button>
		
	</div>
     	<table class="dataTable" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th style="height:6vh; text-align:center;">Nome Trabalhador</th>
		            <th style="height:6vh; text-align:center;">Preço Hora</th>
		            <th style="height:6vh; text-align:center;">Segunda-feira</th>           
		            <th style="height:6vh; text-align:center;">Terça-feira</th>
		            <th style="height:6vh; text-align:center;">Quarta-Feira</th>
		            <th style="height:6vh; text-align:center;">Quinta-Feira</th>
		            <th style="height:6vh; text-align:center;">Sexta-Feira</th>
		            <th style="height:6vh; text-align:center;">Sabado</th>
		            <th style="height:6vh; text-align:center;">Total </th>
		            <th style="height:6vh; text-align:center;">Observação</th>
	        	</tr>
	        	<tr>
	        		
	        	</tr>
	        </thead>
	        <tbody style="background-color:#F3F3F4; margin-top:4vh;"> 
	        	<?php 
	        		$count=0;
	        		for($i=0;$i<25;$i++){
	        			if($i<count($dados_trabalhador_registado)){
	        				?>
	        				<tr>
			       				<td>
			       					<input type="text" value="<?php echo $dados_trabalhador_registado[$i]['nome_trabalhador'] ?>" style="height:4vh; text-align:center;" id="<?php  echo 'nome'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' value="<?php echo $dados_trabalhador_registado[$i]['preco_hora'] ?>" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'preco_hora'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' value="<?php echo $dados_trabalhador_registado[$i]['hora_segunda'] ?>" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'segunda'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' value="<?php echo $dados_trabalhador_registado[$i]['hora_terca'] ?>" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'terca'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' value="<?php echo $dados_trabalhador_registado[$i]['hora_quarta'] ?>" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'quarta'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' value="<?php echo $dados_trabalhador_registado[$i]['hora_quinta'] ?>" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'quinta'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' value="<?php echo $dados_trabalhador_registado[$i]['hora_sexta'] ?>" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'sexta'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' value="<?php echo $dados_trabalhador_registado[$i]['hora_sabado'] ?>" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'sabado'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" readonly="read_only" value="<?php echo $dados_trabalhador_registado[$i]['total'] ?>" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'total'.$i?>">
			       				</td>
			       				<td>
			       					<input type="text" value="<?php echo $dados_trabalhador_registado[$i]['observacao'] ?>" style="height:4vh; text-align:center;" id="<?php  echo 'observacao'.$i?>">
			       				</td>
			       				  <input type="hidden" value="<?php echo $dados_trabalhador_registado[$i]['id_trabalhador'] ?>" id="<?php  echo 'id_trabalhador'.$i?>"> 
		       				</tr>
	        		<?php
	        			$count++;
	        		}else{
	        			?>
	        				<tr>
			       				<td>
			       					<input type="text" style="height:4vh; text-align:center;" id="<?php  echo 'nome'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'preco_hora'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'segunda'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'terca'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'quarta'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'quinta'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'sexta'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" indece_alterado='<?php echo $i ?>' class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'sabado'.$i?>">
			       				</td>
			       				<td>
			       					<input type="number" readonly="read_only" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'total'.$i?>">
			       				</td>
			       				<td>
			       					<input type="text" style="height:4vh; text-align:center;" id="<?php  echo 'observacao'.$i?>">
			       				</td>
			       				<input type="hidden" value="<?php echo '0' ?>" id="<?php  echo 'id_trabalhador'.$i?>"> 
		       				</tr>
	        		<?php
	        			$count++;
	        		}
	        	}
	        			
	        	?>      
       			
        	    <input type="hidden" value="<?php echo $count ?>" id="contador">      
        	    <input type="hidden" value="<?php echo $id_obra_caregar_existente ?>" id="id_obra_caregar_existente">      
        	    <input type="hidden" value="<?php echo $id_folha_caregar_existente ?>" id="id_folha_caregar_existente">      
	         
        	</tbody>                 
        </table>

    </div>  

   
               
             
   
</form>
<script type="text/javascript">
	$(document).ready(function(){

		
		

		$('.dataTables-example').dataTable({
            responsive: true,
            /*"dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }*/
        });

		$("#calcular_folha_pagamento_existente").on("click",function(){
			var id_obra_caregar_existente=$("#id_obra_caregar_existente").val();
			var id_folha_caregar_existente=$("#id_folha_caregar_existente").val();

			var dados={'id_obra_caregar_existente':id_obra_caregar_existente,'id_folha_caregar_existente':id_folha_caregar_existente};

			$.post("",{want:"drogaria",data:"calcular_folha_pagamento_existente","dados":dados},function(resposta){       		     
		    	
		    	$("#myModalPDF-body").html(resposta);
		    });


		});

		$("#impremir_folha_pagamento_existente").on('click',function(){

			var contador = $("#contador").val();
			for (var i=0;i<contador;i++){
				if($("#nome"+i).val()!=""){
					var id_trabalhador=$("#id_trabalhador"+i).val();
					var nome_trabalhador = $("#nome"+i).val();
					var preco_hora = $("#preco_hora"+i).val();
					var hora_segunda = $("#segunda"+i).val();
					var hora_terca = $("#terca"+i).val();
					var hora_quarta= $("#quarta"+i).val();
					var hora_quinta= $("#quinta"+i).val();
					var hora_sexta= $("#sexta"+i).val();
					var hora_sabado= $("#sabado"+i).val();
					var total= $("#total"+i).val();
					var observacao= $("#observacao"+i).val();
					var id_folha_registo= $("#id_folha_caregar_existente").val();
					var id_obra_registo= $("#id_obra_caregar_existente").val();

					var dados ={"nome_trabalhador":nome_trabalhador,
								"preco_hora":preco_hora,
								"hora_segunda":hora_segunda,
								"hora_terca":hora_terca,
								"hora_quarta":hora_quarta,
								"hora_quinta":hora_quinta,
								"hora_sexta":hora_sexta,
								"hora_sabado":hora_sabado,
								"total":total,
								"observacao":observacao,
								"id_folha_registo":id_folha_registo,
								"id_obra_registo":id_obra_registo,
								"id_trabalhador":id_trabalhador
								};	
					$.post("",{want:"drogaria",data:"actualizar_registar_dados_dia","dados":dados},function(resp){
						var res=JSON.parse(resp);
					});			
				}
			}		

			var id_folha_impremir=$("#id_folha_caregar_existente").val();
			var id_obra_impremir=$("#id_obra_caregar_existente").val();
			var dados={'id_folha_impremir':id_folha_impremir,'id_obra_impremir':id_obra_impremir};
			 $.post("",{want:"drogaria",data:"impremir_folha_pagamento_existente","dados":dados},function(resposta){       
		     
		       $("#myModalPDF-body").html(resposta);
		      });
		});


		$(".hora_trabalho").change(function(){
			var indece_alterado = $(this).attr("indece_alterado");
			var preco_hora=parseFloat($("#preco_hora"+indece_alterado).val());
			var segunda = parseFloat($("#segunda"+indece_alterado).val());
			var terca = parseFloat($("#terca"+indece_alterado).val());
			var quarta = parseFloat($("#quarta"+indece_alterado).val());
			var quinta = parseFloat($("#quinta"+indece_alterado).val());
			var sexta = parseFloat($("#sexta"+indece_alterado).val());
			var sabado = parseInt($("#sabado"+indece_alterado).val());

						
			if(isNaN(sabado)){
				var valor_acumulado=0;
			}else{
				var valor_acumulado = preco_hora*(segunda+terca+quarta+quinta+sexta+sabado);
				$("#total"+indece_alterado).val(valor_acumulado);
			}
				
			
		});
		

		$("#guardar_folha_pagamento_existente").on("click",function(){
			var contador = $("#contador").val();
			for (var i=0;i<contador;i++){
				if($("#nome"+i).val()!=""){
					var id_trabalhador=$("#id_trabalhador"+i).val();
					var nome_trabalhador = $("#nome"+i).val();
					var preco_hora = $("#preco_hora"+i).val();
					var hora_segunda = $("#segunda"+i).val();
					var hora_terca = $("#terca"+i).val();
					var hora_quarta= $("#quarta"+i).val();
					var hora_quinta= $("#quinta"+i).val();
					var hora_sexta= $("#sexta"+i).val();
					var hora_sabado= $("#sabado"+i).val();
					var total= $("#total"+i).val();
					var observacao= $("#observacao"+i).val();
					var id_folha_registo= $("#id_folha_caregar_existente").val();
					var id_obra_registo= $("#id_obra_caregar_existente").val();

					var dados ={"nome_trabalhador":nome_trabalhador,
								"preco_hora":preco_hora,
								"hora_segunda":hora_segunda,
								"hora_terca":hora_terca,
								"hora_quarta":hora_quarta,
								"hora_quinta":hora_quinta,
								"hora_sexta":hora_sexta,
								"hora_sabado":hora_sabado,
								"total":total,
								"observacao":observacao,
								"id_folha_registo":id_folha_registo,
								"id_obra_registo":id_obra_registo,
								"id_trabalhador":id_trabalhador
								};	
					$.post("",{want:"drogaria",data:"actualizar_registar_dados_dia","dados":dados},function(resp){
						var res=JSON.parse(resp);
					});			
				}
			}
			alertify.alert("registado com sucesso");
			
		});

		
	});
</script>
