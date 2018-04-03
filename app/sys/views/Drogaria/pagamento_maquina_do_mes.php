<?php
	$nome = $_SESSION['nome'];
	$tipo=$_SESSION['tipo'];
	$id_user=$_SESSION['id_user'];
	$username=$_SESSION['username'];


	$data_da_venda_carregada=$_SESSION['mes_ano_pagamento_maquina_actual']; 
	$array_da_venda_do_mes=$_SESSION['array_pagamento_maquina_mes_actual'];
	$numero_dias_vendas=$_SESSION['dias_pagamento'] = $num_rows;

	


	$data_recebida = explode("-", $data_da_venda_carregada);
	$mes_certo_recebida = $data_recebida[1];
	$ano_certo_recebida = $data_recebida[0];
?>




    

<form class="form-horizontal">

	<table>
		<tr>
			<td>
				<select class="form-control" id="mes_pesquisar_pagamento_maquina">
				<?php 
				 	if($mes_certo_recebida=='01'){
				 	?>
				 		  <option selected="">Janeiro</option>
				 		  <option>Fevereiro</option>
						  <option>Março</option>
						  <option>Abril</option>
						  <option>Maio</option>
						  <option>Junho</option>
						  <option>Julho</option>
						  <option>Agosto</option>
						  <option>Setembro</option>
						  <option>Outubro</option>
						  <option>Novembro</option>
						  <option>Dezembro</option>
				 	<?php
				 	}else if($mes_certo_recebida=='02'){
				 	?>
				 		 	 <option>Janeiro</option>
							  <option selected="">Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>
				 	<?php
				 	}else if($mes_certo_recebida=='03'){
				 	?>
				 		 	<option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option selected="">Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>
				 	<?php
					 }else if($mes_certo_recebida=='04'){
					 ?>
					 		  <option>Abril</option>
					 		  <option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option selected="">Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>
					 <?php
					 }else if($mes_certo_recebida=='05'){
				 	?>
				 		 <option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option selected="">Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>

				 	<?php
				 	}else if($mes_certo_recebida=='05'){
				 	?>
				 		  <option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option selected="">Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>
				 	<?php
					}else if($mes_certo_recebida=='06'){
					 	?>
					 		  <option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option selected="">Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>
					 	<?php
				 	}else if($mes_certo_recebida=='08'){
				 		?>
				 		 	<option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option selected="">Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>
				 		<?php
				    }else if($mes_certo_recebida=='09'){
				 		?>
				 		 	<option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option selected="">Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>
				 		<?php
				 	}else if($mes_certo_recebida=='10'){
				 		?>
				 		  <option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option selected="">Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>
				 		<?php
				 	}else if($mes_certo_recebida=='11'){
				 		?>
				 		  <option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option selected="">Novembro</option>
							  <option>Dezembro</option>
				 		<?php
				 	}else if($mes_certo_recebida=='12'){
				 		?>
				 		 <option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option selected="">Dezembro</option>
				 		<?php
				 	}
				?>	 			  
				</select>
			</td>
			<td>
				<select class="form-control" id="ano_pesquisar_pagamento_maquina">
				<?php
					if($ano_certo_recebida=="2016"){
						?>
						<option selected="">2016</option>
						<option>2017</option>
						<option>2018</option>
						<option>2019</option>
						<option>2020</option>
						<option>2021</option>
						<option>2022</option>
						<option>2023</option>
						<option>2024</option>
						<option>2025</option>
						<option>2026</option>
						<option>2027</option>
						<option>2028</option>
						<option>2029</option>
						<option>2030</option>
				  		<?php
					}else if($ano_certo_recebida=="2017"){
						?>
						<option>2016</option>
						<option selected="">2017</option>
						<option>2018</option>
						<option>2019</option>
						<option>2020</option>
						<option>2021</option>
						<option>2022</option>
						<option>2023</option>
						<option>2024</option>
						<option>2025</option>
						<option>2026</option>
						<option>2027</option>
						<option>2028</option>
						<option>2029</option>
						<option>2030</option>
				  		<?php
					}else if($ano_certo_recebida=="2018"){
						?>
						<option>2016</option>
						<option>2017</option>
						<option selected="">2018</option>
						<option>2019</option>
						<option>2020</option>
						<option>2021</option>
						<option>2022</option>
						<option>2023</option>
						<option>2024</option>
						<option>2025</option>
						<option>2026</option>
						<option>2027</option>
						<option>2028</option>
						<option>2029</option>
						<option>2030</option>
				  		<?php
					}else if($ano_certo_recebida=="2019"){
						?>
						<option>2016</option>
						<option>2017</option>
						<option>2018</option>
						<option>2019</option>
						<option selected="">2020</option>
						<option>2021</option>
						<option>2022</option>
						<option>2023</option>
						<option>2024</option>
						<option>2025</option>
						<option>2026</option>
						<option>2027</option>
						<option>2028</option>
						<option>2029</option>
						<option>2030</option>
				  		<?php
					}else if($ano_certo_recebida=="2020"){
						?>
						<option>2016</option>
						<option>2017</option>
						<option>2018</option>
						<option>2019</option>
						<option selected="">2020</option>
						<option>2021</option>
						<option>2022</option>
						<option>2023</option>
						<option>2024</option>
						<option>2025</option>
						<option>2026</option>
						<option>2027</option>
						<option>2028</option>
						<option>2029</option>
						<option>2030</option>
				  		<?php
					}

				?>				  
				</select>
			</td>
			<td>
				<button style="width:2vw;" type="button" id="persquisar_pagamento_maquina_mes" class="btn btn-w-m btn-primary"  data-toggle="modal" data-target="#myModalListarFolhas"><i class="fa fa-check"></i></button></li>
			</td>
			
		</tr>
	</table>


    <div id="myTabContentPagamento" class="tab-content" style="margin-top:4vh;">
    	
     		<?php
     			if($numero_dias_vendas==0){
     				?>
     					<h1>Não registo de pagamento de maquina carpintaria</h1>
     				<?php
     			}else{
     				?>
   					<table class="table" style="width: 20vw; height:20vh; fonte-size:9; margin-left:20vw;" role="" aria-labelledby="" cellspacing="0" cellpadding="0" border="0">
				    	<thead>
				    		<tr tr class="" role="">
					    		<td>
					    			Dia
					    		</td>
					    		<td>
					    			Total Venda
					    		</td>
					    	</tr>
				    	</thead>
				    	<tbody>				    		
			    			<?php
			    				$total=0;
			    				for($contador=1;$contador<=count($array_da_venda_do_mes);$contador++){
			     					if($array_da_venda_do_mes[$contador][0]['total']==''){
			     						?>
			     						<tr>
				     						<td>
				     							<?php
				     								echo $contador;
				     							?>
				     						</td>
				     						<td>
				     							<?php
				     								echo '0$00';
				     							?>
				     						</td>
				     					</tr>
			     						<?php

			     					}else{
			     						?>
			     						<tr>
				     						<td>
				     							<?php
				     								echo $contador;
				     							?>
				     						</td>
				     						<td>
				     							<?php
				     							$total = $total+$array_da_venda_do_mes[$contador][0]['total'];
				     								echo $array_da_venda_do_mes[$contador][0]['total']."$00"
				     							?>
				     						</td>
				     					</tr>
			     						<?php
			     					}			     					
			     				}
			     				?>
			     					<tr style="background-color:green; color:white;">
			     						<td>total Mês</td>
			     						<td>
			     						<?php echo $total.'$00'?>
			     						</td>
			     					</tr>
			     					<?php
			     			}
			    		?>
				    	</tbody>
				    	
				    </table>
    </div> 

             
   <input type="hidden" id="id_obra_actual" value="<?php echo $id_obra_actual?>">
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



		var array_mes=[{"ind":"01","mes":"Janeiro"},
						{"ind":"02","mes":"Fevereiro"},
						{"ind":"03","mes":"Março"},
						{"ind":"04","mes":"Abril"},
						{"ind":"05","mes":"Maio"},
						{"ind":"06","mes":"Junho"},
						{"ind":"07","mes":"Julho"},
						{"ind":"08","mes":"Agosto"},
						{"ind":"09","mes":"Setembro"},
						{"ind":"10","mes":"Outubro"},
						{"ind":"11","mes":"Novembro"},
						{"ind":"12","mes":"Dezembro"}
					  ];
		function returnMes(ind){
			for (var i=0;i<array_mes.length;i++){
				if(array_mes[i]["ind"]==ind){
					return array_mes[i]["mes"];
				}
			}
		}

		function returnIndeceMes(mes){
			for (var i=0;i<array_mes.length;i++){
				if(array_mes[i]["mes"]==mes){
					return array_mes[i]["ind"];
				}
			}
		}

		$("#persquisar_pagamento_maquina_mes").on("click",function(){

			var mes_pesquisar_pagamento_maquina = $("#mes_pesquisar_pagamento_maquina").val();
			var ind_mes_pesquisar_pagamento_maquina = returnIndeceMes(mes_pesquisar_pagamento_maquina);
			var ano_pesquisar_pagamento_maquina = $("#ano_pesquisar_pagamento_maquina").val();
			var dados={"ind_mes_pesquisar_pagamento_maquina":ind_mes_pesquisar_pagamento_maquina,"ano_pesquisar_pagamento_maquina":ano_pesquisar_pagamento_maquina};
			
			$.post("",{want:"drogaria",data:"persquisar_pagamento_maquina_mes","dados":dados},function(resp){				
				$("#myTabContentPagamento").html(resp);
			});
		
		});
		
		$.post("",{want:"drogaria",data:"data_de_hoje"},function(resp){
			var resp=JSON.parse(resp);
			var array_data = resp["data_hoje"].split("-");
			$("#dia_inicio_folha").val(array_data[2]);
			$("#dia_fim_folha").val(array_data[2]);
			var mes_certo = returnMes(array_data[1]);
			$("#mes_inicio_folha").val(mes_certo);
			$("#mes_fim_folha").val(mes_certo);
			$("#ano_inicio_folha").val(array_data[0]);
			$("#ano_fim_folha").val(array_data[0]);


		});

		
		/*$("#folha_pagamento").on("click",function(){
			$("#myTabContent").html("");
			var id_obra = $("#id_obra").val();

		});*/

		$("#anotacoes").on("click",function(){
			$("#myTabContent").html("");
			$("#myTabContent").append("<h1>Anotacões importantes</h1>");

		});


			
		$("#registar_folha").on("click",function(){

			var id_obra_actual = $("#id_obra_actual").val();
			
			var dia_inicio_folha = $("#dia_inicio_folha").val();
			var mes_inicio_folha = $("#mes_inicio_folha").val();
			var ind_mes_inicio = returnIndeceMes(mes_inicio_folha);
			var ano_inicio_folha = $("#ano_inicio_folha").val();

			var dia_fim_folha = $("#dia_fim_folha").val();
			var mes_fim_folha = $("#mes_fim_folha").val();
			var ind_mes_fim = returnIndeceMes(mes_fim_folha);
			var ano_fim_folha = $("#ano_fim_folha").val();

			var data_inicio_folha = ano_inicio_folha+"-"+ind_mes_inicio+"-"+dia_inicio_folha;
			var data_fim_folha = ano_fim_folha+"-"+ind_mes_fim+"-"+dia_fim_folha;

			$.post("",{want:"drogaria",data:"registar_data_folhas","data_inicio_folha":data_inicio_folha,
					  "data_fim_folha":data_fim_folha,"id_obra_actual":id_obra_actual},function(resp){			
						$("#myModalCriarFolha").modal('hide');
				/*var id_obra = id_obra_actual;
				$.post("",{want:"drogaria",data:"folhas_pagamento","id_obra":id_obra},function(resp){
              		$("#myTabContent").html(resp);
            	});*/
				alertify.alert("Registado com sucesso");
			});
		});
		
		
		$(".caregar_folha_pagamento").on("click",function(){
			$("#myTabContentFolha").html("");
			var id_folha_caregar = $(this).attr("id_folha_caregar");
			var id_obra_caregar = $(this).attr("id_obra_caregar");
			$.post("",{want:"drogaria",data:"caregar_folha_pagamento","id_folha_caregar":id_folha_caregar,"id_obra_caregar":id_obra_caregar},function(resp){
				$("#myTabContentFolha").html(resp);
			});
		});



		
	});
</script>
