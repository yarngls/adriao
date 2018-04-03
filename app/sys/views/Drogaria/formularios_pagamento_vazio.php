<?php
	$id_obra_registo=$_SESSION['id_obra_nova_folha'];
	$id_folha_registo=$_SESSION['id_folha_caregar'];	


?>

		
	<div class="ibox-content">
		 <button class="btn btn-outline btn-primary dim" id="guardar_folha_pagamento" style="margin-left:60vw;" type="button"><i class="fa fa-check">Guardar</i></button>
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

	        		?>
	        			<tr>
		       				<td>
		       					<input type="text" style="height:4vh; text-align:center;" id="<?php  echo 'nome'.$i?>">
		       				</td>
		       				<td>
		       					<input type="number" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'preco_hora'.$i?>">
		       				</td>
		       				<td>
		       					<input type="number" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'segunda'.$i?>">
		       				</td>
		       				<td>
		       					<input type="number" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'terca'.$i?>">
		       				</td>
		       				<td>
		       					<input type="number" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'quarta'.$i?>">
		       				</td>
		       				<td>
		       					<input type="number" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'quinta'.$i?>">
		       				</td>
		       				<td>
		       					<input type="number" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'sexta'.$i?>">
		       				</td>
		       				<td>
		       					<input type="number" class="hora_trabalho" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'sabado'.$i?>">
		       				</td>
		       				<td>
		       					<input type="number" readonly="read_only" style="width:6vw; height:4vh; text-align:center;" id="<?php  echo 'total'.$i?>">
		       				</td>
		       				<td>
		       					<input type="text" style="height:4vh; text-align:center;" id="<?php  echo 'observacao'.$i?>">
		       				</td>
		       			</tr>
	        		<?php
	        			$count++;
	        		}
	        	?>      
       			
        	    <input type="hidden" value="<?php echo $count ?>" id="contador">      
        	    <input type="hidden" value="<?php echo $id_obra_registo ?>" id="id_obra_registo">      
        	    <input type="hidden" value="<?php echo $id_folha_registo ?>" id="id_folha_registo">      
	         
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

		/*$(".hora_trabalho").change(function(){
			for(var contar=0;contar<)
		});*/

		$("#guardar_folha_pagamento").on("click",function(){
			var contador = $("#contador").val();
			for (var i=0;i<contador;i++){
				if($("#nome"+i).val()!=""){
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
					var id_folha_registo= $("#id_folha_registo").val();
					var id_obra_registo= $("#id_obra_registo").val();

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
								"id_obra_registo":id_obra_registo
								};	
					$.post("",{want:"drogaria",data:"registar_dados_dia","dados":dados},function(resp){
						var res=JSON.parse(resp);
					});				
				}
			}
			alertify.alert("Registado com sucesso");
		});

		
	});
</script>
