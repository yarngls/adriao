<?php
	$nome = $_SESSION['nome'];
	$tipo=$_SESSION['tipo'];
	$id_user=$_SESSION['id_user'];
	$username=$_SESSION['username'];
	$informacoes_folhas = $_SESSION['informacoes_folhas_pagamento'];
	$data_por_selecionar = $_SESSION['informacoes_mes_actual_folha_pagamento'];
	$data_por_selecionar_explode = explode("-", $data_por_selecionar);
	$mes_certo_por_seleciona = $data_por_selecionar_explode[1];
	$ano_certo_por_seleciona = $data_por_selecionar_explode[0];
	$id_obra_actual=$_SESSION['id_obra_actual'];
?>




    

<form class="form-horizontal">

	<table>
		<tr>
			<td>
				<select class="form-control" id="mes_pesquisar_folha">
				<?php 
				 	if($mes_certo_por_seleciona=='01'){
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
				 	}else if($mes_certo_por_seleciona=='02'){
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
				 	}else if($mes_certo_por_seleciona=='03'){
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
					 }else if($mes_certo_por_seleciona=='04'){
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
					 }else if($mes_certo_por_seleciona=='05'){
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
				 	}else if($mes_certo_por_seleciona=='05'){
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
					}else if($mes_certo_por_seleciona=='06'){
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
				 	}else if($mes_certo_por_seleciona=='08'){
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
				    }else if($mes_certo_por_seleciona=='09'){
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
				 	}else if($mes_certo_por_seleciona=='10'){
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
				 	}else if($mes_certo_por_seleciona=='11'){
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
				 	}else if($mes_certo_por_seleciona=='12'){
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
				<select class="form-control" id="ano_pesquisar_folha">
				<?php
					if($ano_certo_por_seleciona=="2016"){
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
					}else if($ano_certo_por_seleciona=="2017"){
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
					}else if($ano_certo_por_seleciona=="2018"){
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
					}else if($ano_certo_por_seleciona=="2019"){
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
					}else if($ano_certo_por_seleciona=="2020"){
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
				<button style="width:2vw;" type="button" id="persquisar_mes_folhas" class="btn btn-w-m btn-primary"  data-toggle="modal" data-target="#myModalListarFolhas"><i class="fa fa-check"></i></button></li>
			</td>
			
		</tr>
	</table>
	<button style="margin-left:70vw;" type="button" class="btn btn-w-m btn-primary"  data-toggle="modal" data-target="#myModalCriarFolha">Nova Folha</button></li>

	 <!-- inicio do Modal para criar Folha-->
            <div class="modal fade" style="margin-top:20vh;" id="myModalCriarFolha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Criar Folha Pagamento</h4>
                  </div>
                  <div class="modal-body">
                    <table>
                        <tr>
                            <td>
                                <label class=""  style="color:#2f4050; text-size:12;" >Inicio Folha</label>
                            </td>
                            <td>
							<div class="col-lg-12">
							    	
							    	<table>
											<tbody>
												<tr>
													<td>
														<select class="form-control" id="dia_inicio_folha">
														  <option>01</option>
														  <option>02</option>
														  <option>03</option>
														  <option>04</option>
														  <option>05</option>
														  <option>06</option>
														  <option>07</option>
														  <option>08</option>
														  <option>09</option>
														  <option>10</option>
														  <option>11</option>
														  <option>12</option>
														  <option>13</option>
														  <option>14</option>
														  <option>15</option>
														  <option>16</option>
														  <option>17</option>
														  <option>18</option>
														  <option>19</option>
														  <option>20</option>
														  <option>21</option>
														  <option>22</option>
														  <option>23</option>
														  <option>24</option>
														  <option>25</option>
														  <option>26</option>
														  <option>27</option>
														  <option>28</option>
														  <option>29</option>
														  <option>30</option>
														  <option>31</option>
														</select>
													</td>
													<td>
														<select class="form-control" id="mes_inicio_folha">
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
														  <option>Dezembro</option>
														</select>
													</td>
													<td>
														<select class="form-control" id="ano_inicio_folha">
														  <option>2016</option>
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
														</select>
													</td>						
												</tr>
											</tbody>
										</table>

							    </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" style="color:#2f4050; margin-top:2vh; ">Fim da Folha </label>
                            </td>
                            <td>
                               <div class="col-lg-12">
							    	
							    	<table>
											<tbody>
												<tr>
													<td>
														<select class="form-control" id="dia_fim_folha">
														  <option>01</option>
														  <option>02</option>
														  <option>03</option>
														  <option>04</option>
														  <option>05</option>
														  <option>06</option>
														  <option>07</option>
														  <option>08</option>
														  <option>09</option>
														  <option>10</option>
														  <option>11</option>
														  <option>12</option>
														  <option>13</option>
														  <option>14</option>
														  <option>15</option>
														  <option>16</option>
														  <option>17</option>
														  <option>18</option>
														  <option>19</option>
														  <option>20</option>
														  <option>21</option>
														  <option>22</option>
														  <option>23</option>
														  <option>24</option>
														  <option>25</option>
														  <option>26</option>
														  <option>27</option>
														  <option>28</option>
														  <option>29</option>
														  <option>30</option>
														  <option>31</option>
														</select>
													</td>
													<td>
														<select class="form-control" id="mes_fim_folha">
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
														  <option>Dezembro</option>
														</select>
													</td>
													<td>
														<select class="form-control" id="ano_fim_folha">
														  <option>2016</option>
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
														</select>
													</td>						
												</tr>
											</tbody>
										</table>

							    </div>
                            </td> 
                        </tr>
                  </table>
                   
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="registar_folha" class="btn btn-primary">Registar folha</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- fim do Modal para criar folha-->

            <!-- inicio do Modal para criar Folha-->
            <div class="modal fade" style="width:100vw;" id="myModalListarFolhas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width:80vw; margin-left:18vw; height:100vh;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Lista de Folhas</h4>
                  </div>
                  <div class="modal-body" id="myModalListarFolhas-body" style="">
                    
                   
                  </div>                 
                </div>
              </div>
            </div>

            <!-- fim do Modal para criar folha-->



    <div class="form-group" style="align:center" id="area_para_folhas">   
	    <ul id="myTab" class="nav nav-tabs" role="tablist">
	      <?php
	      	   for($i=0;$i<count($informacoes_folhas);$i++){
	      	   		$array_data_inicio = explode("-",$informacoes_folhas[$i]['inicio_folha']);
	      	   		$data_inico_certo = $array_data_inicio[2] . "-" .  $array_data_inicio[1] . "-" . $array_data_inicio[0];

	      	   		$array_data_fim = explode("-",$informacoes_folhas[$i]['fim_folha']);
	      	   		$data_fim_certo = $array_data_fim[2] . "-" .  $array_data_fim[1] . "-" . $array_data_fim[0];

	      	   	?>

	      	   		<li role="presentation" class="caregar_folha_pagamento" id_folha_caregar='<?php echo $informacoes_folhas[$i]['id_folha']?>' id_obra_caregar='<?php echo $informacoes_folhas[$i]['id_obra']?>'><a href="#" id="" class="info_drogaria" categoria="#" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8"><?php echo $data_inico_certo. " a " . $data_fim_certo ?></span></a></li>
	      	   	<?php
	      	   }
	      ?>	      
	    </ul>
    <div id="myTabContentFolha" class="tab-content" style="margin-top:4vh;">
     	
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

		$("#persquisar_mes_folhas").on("click",function(){

			var mes_pesquisar_folha = $("#mes_pesquisar_folha").val();
			var ind_mes_pesquisar_folha = returnIndeceMes(mes_pesquisar_folha);
			var ano_pesquisar_folha = $("#ano_pesquisar_folha").val();
			var id_obra_actual = $("#id_obra_actual").val();
			var dados={"ind_mes_pesquisar_folha":ind_mes_pesquisar_folha,"ano_pesquisar_folha":ano_pesquisar_folha,"id_obra_actual":id_obra_actual};
			
			$.post("",{want:"drogaria",data:"persquisar_mes_folhas","dados":dados},function(resp){				
				$("#myModalListarFolhas-body").html(resp);
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
