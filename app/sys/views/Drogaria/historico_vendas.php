<?php
	//$nome = $_SESSION['nome'];
	$historico_vendas = $_SESSION['historico_vendas'];	
	//var_dump($historico_vendas);

?>




    

<form class="form-horizontal">
	
					
	

    <div class="form-group" style="align:center">
    <button class="btn btn-outline btn-primary " style="margin-left:70vw;" type="button" data-toggle="modal" data-target="#myModal">Nova Venda</button>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#" id="venda_diaria" class="" categoria="#" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8"> Venda Diaria</span></a></li>
      <li role="presentation" class=""><a href="#" id="venda_mensal" class=""  role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8">Venda Mensal</span></a></li>
      
    </ul>
    <div class="form-group"  id="area_pesquisa" style="margin-left:0.2vw;">
    <table>
				<tbody>
					<tr>
						<td>
							<select class="form-control" id="dia_venda">
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
							<select class="form-control" id="mes_venda">
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
							<select class="form-control" id="ano_venda">
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
						<td>
							<button class="btn btn-primary dim" id="persquisar_venda" style="margin-top:2vh;" type="button"><i class="fa fa-check"></i></button>
						</td>

						<td>
							<?php

				        		$total_diaria=0;
				        		for($i=0;$i<count($historico_vendas);$i++){
				                    $total_diaria = $total_diaria + $historico_vendas[$i]['total_a_pagar'];
				                }

				        	?>
						</td>
					</tr>
				</tbody>
			</table>
	</div>
			
    <div id="myTabContent" class="tab-content" style="margin-top:4vh;">
			    
    	<h3 style="margin-left:30vw;"> Total da Venda:  <?php echo  $total_diaria ?>$00</h3>
        	
     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Nome Cliente</th>
		            <th>Designação</th>
		            <th>Referencia</th>
		            <th>Preço Venda</th>
		            <th>Quantidade Comprada</th>           
		            <th>Total Pago</th>
		            <th>Data Venda</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		
        		for($i=0;$i<count($historico_vendas);$i++){
                   
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $historico_vendas[$i]['nome_cliente'] ?></td>
		            <td><?php echo $historico_vendas[$i]['designacao_produto'] ?></td>
		            <td><?php echo $historico_vendas[$i]['referencia_produto'] ?></td>
		            <td><?php echo $historico_vendas[$i]['preco_unitario'] ?></td>		            
		            <td><?php echo $historico_vendas[$i]['quantidade_a_comprar'] ?></td>		            
		            <td><?php echo $historico_vendas[$i]['total_a_pagar'] ?></td>		            
		            <td><?php echo $historico_vendas[$i]['data_venda'] ?></td>		            
		            
		        </tr>
		    <?php
            	}
            ?>                
	         
        </tbody>                 
        </table>
    </div>
	 

    
    <div class="modal fade" id="myModal" style="margin-left:16vw;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" style="width:65vw; align:center;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Registar Venda</h4>
		      </div>
		      <div class="modal-body">
		        	<form class="form-horizontal" style=" margin-top:4vh; fonte-size:10;">
		                <div class="form-group" style="align:center;"><label class="col-lg-2 control-label"></label>

					    <div class="col-lg-6"></div>
					    </div>                          
					    <div class="form-group" style="align:center; text-color:white;"><label class="col-lg-2 control-label" style="color:#2f4050;">Cliente</label>

					    <div class="col-lg-6"><input type="text" id="nome_cliente" placeholder="nome do cliente" class="form-control"></div>
					    		
					    </div>
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Descrição Produto</label>

					    <div class="col-lg-6"><input type="text" id="designacao_produto" placeholder="descrição do produto" class="form-control"></div>
					    </div> 
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;"> </label>

					    <div class="col-lg-6"><ul id='lista_resultado_pesquisa'> </ul></div>
					    </div>
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Referência do Produto</label>

					    <div class="col-lg-6"><input type="text" id="referencia_produto" placeholder="referência do produto" class="form-control"></div>
					    </div> 
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;"> </label>

					    <div class="col-lg-6"><ul id='lista_resultado_referencia'> </ul> </div>
					    </div>
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Preço Venda</label>

					    <div class="col-lg-6"><input type="text" readonly="readonly" id="preco_unitario" placeholder="preço venda" class="form-control"></div>
					    </div>

					     <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Quantidade em Stock</label>

					    <div class="col-lg-6"><input type="text" readonly="readonly" id="quantidade_stock" placeholder="referência do produto" class="form-control"></div>
					    </div>

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Quantidade a comprar</label>      

					    <div class="col-lg-6"><input type="number" id="quantidade_a_comprar" placeholder="quantidade comprada" class="form-control"></div>
					    </div> 
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Total a Pagar</label>      

					    <div class="col-lg-6"><input type="number" id="total_a_pagar" placeholder="total a pagar" class="form-control"></div>
					    </div>      

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Observação</label>

					    <div class="col-lg-6"><textarea id="observacoes" class="form-control" value = '' name="observacao" rows="5" cols="50" style="height:6vw;"> </textarea></div>
					     </div>

					    
					    
					    <input type='hidden' value="<?php echo $nome ?>" id="id_produto">                 
					    
		    		</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar Venda</button>
		        <button type="button" class="btn btn-primary" id="submeter_venda" ><i class="fa fa-floppy-o"></i>Registar Venda</button>
		      </div>
		    </div>
		  </div>
	</div>


	
               
             

<script type="text/javascript">
	$(document).ready(function(){


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
		
		$.post("",{want:"drogaria",data:"data_de_hoje"},function(resp){
			var resp=JSON.parse(resp);
			var array_data = resp["data_hoje"].split("-");
			$("#dia_venda").val(array_data[2]);
			var mes_certo = returnMes(array_data[1]);
			$("#mes_venda").val(mes_certo);
			$("#ano_venda").val(array_data[0]);


		});


		$("#persquisar_venda").on("click",function(){
			var dia_venda = $("#dia_venda").val();
			var mes_venda = $("#mes_venda").val();
			var ind_mes = returnIndeceMes(mes_venda);
			var ano_venda = $("#ano_venda").val();

			var data_pesquisa = ano_venda+"-"+ind_mes+"-"+dia_venda;
			$.post("",{want:"drogaria",data:"pesquisa_venda","data_pesquisa":data_pesquisa},function(resp){
				
				$("#myTabContent").html("");
			 	$("#myTabContent").html(resp);
			});
		});

		$("#venda_diaria").on("click",function(){
			 $("#area_results").html("");
                $.post("",{want:"drogaria",data:"historico_vendas"},function(resp){
                    $("#area_results").html(resp);                 
                });
		});

		/*$("#venda_mensal").on("click",function(){
			 $("#myTabContent").html("");
			 $("#myTabContent").html("venda Mensal");
              
		});*/

		$("#designacao_produto").on("keyup",function(){
			$('#lista_resultado_referencia').html("");
			$('#lista_resultado_referencia').hide("");
			$('#referencia_produto').val("");
			if($(this).val()==""){
				$('#lista_resultado_pesquisa').hide();
				$('#referencia_produto').val("");
				$('#lista_resultado_referencia').html("");
				$('#lista_resultado_referencia').hide("");

			}else{
				$('#lista_resultado_pesquisa').html("");
				var designacao = $(this).val();
				$.post("",{want:"drogaria",data:"listar_designacao_produtos","designacao":designacao},function(resp){
					var res=JSON.parse(resp);
					if(res["resultado"].length>0){
						for (i=0;i<res["resultado"].length;i++)	{
							var designacao_prod=res["resultado"][i].designacao;
							var lista_id="<li class='designacao_prod' opcao='"+designacao_prod+"'>"+designacao_prod+"</li>";					
							$('#lista_resultado_pesquisa').show().append(lista_id);
						}
					}else{
						
					}
				});				
			}

		});

			

			/*$('body').on("change","#designacao_produto",function(){
				designacao_inserida = $(this).val();*/
				

			$("body").on("click",".designacao_prod",function(){
				var opcao= $(this).attr('opcao'); 
				$('#designacao_produto').val(opcao);
				$('#lista_resultado_pesquisa').hide()
			});

			$('body').on("click","#referencia_produto",function(){

				if($("#designacao_produto").val()==""){
					alert("insira o referencia produto");
				}else{
					var designacao_inserida = $("#designacao_produto").val();

						$('#lista_resultado_referencia').html("");
						//var referencia_produto = $(this).val();*/
						$.post("",{want:"drogaria",data:"listar_referencia_produto","designacao_inserida":designacao_inserida},function(resp){
							var res=JSON.parse(resp);
							if(res["resultado"].length>0){
								for (i=0;i<res["resultado"].length;i++)	{
									var referencia_prod=res["resultado"][i].referencia;
									var lista_referencia="<li class='referencia_prod' opcao_ref='"+referencia_prod+"'>"+referencia_prod+"</li>";					
									$('#lista_resultado_referencia').show().append(lista_referencia);
								}
							}else{
								
							}
						});				
					//}					
				}

			});

			var id_produto_vendido="";

			$("body").on("click",".referencia_prod",function(){
				var opcao_ref= $(this).attr('opcao_ref'); 
				$('#referencia_produto').val(opcao_ref);
				$('#lista_resultado_referencia').hide()
				$('#lista_resultado_referencia').html("")

				var designacao_para_stock = $("#designacao_produto").val();
				var referencia_para_stock = $("#referencia_produto").val();
				
				$.post("",{want:"drogaria",data:"listar_preco_stock","designacao_para_stock":designacao_para_stock,"referencia_para_stock":referencia_para_stock},function(resp){
					
					var res=JSON.parse(resp);
					$("#preco_unitario").val(res["resultado"][0].preco_venda);
					$("#quantidade_stock").val(res["resultado"][0].quantidade);
					id_produto_vendido = res["resultado"][0].id_produto;

				});
			});

			
			$("#quantidade_a_comprar").on("change",function(){
				var quantidade_a_comprar = $(this).val();
				var preco_venda = $("#preco_unitario").val();
				var total_pagar = parseInt(quantidade_a_comprar)*parseInt(preco_venda);

				$("#total_a_pagar").val(total_pagar);
			});
			

			//$('#lista_resultado_pesquisa').show().append(res);
		/*$("#caregar_table").html("");
		$('#lista_resultado_cliente').html("");
		var pesquisa = $(this).val();
		//alert(pesquisa);			/
		if(pesquisa.length > 0){
			$.post("",{want:"cliente",data:"historico_pagamento","pesquisa":pesquisa},function(lista){
			var res=JSON.parse(lista);	
				if(res["resultado"].length>0){
					for (i=0;i<res["resultado"].length;i++)	{
						var nome=res["resultado"][i].nome_cliente;
						var lista_id="<li class='lista_nome' area='"+nome+"'>"+nome+"</li>";					
						$('#lista_resultado_cliente').show().append(lista_id);
					}					
				}else{
					$(function(){
		           		$("#dialog-message").attr("title","Aviso").css("color","green");
		           		$("#dialog-message").html("<label style='color:red'>"+'Não existe este cliente.'+"</label>").css("font-family","Calibri").css("font-size","12");
					    $("#dialog-message" ).dialog({
					      	modal: true,
					      	buttons: {
						        Ok: function() {						        	
						         	$( this ).dialog( "close" );
						         	$("#area_dados").val("");
						        }
					      	}
					    });
					});
				}
			});
		}else{
			$('#lista_resultado_cliente').html('').hide();			
		}*/
	//});

		
		$("#submeter_venda").on("click",function(){

			var nome_cliente=$("#nome_cliente").val();
			var designacao_produto=$("#designacao_produto").val();
			var referencia_produto=$("#referencia_produto").val();
			var preco_unitario = $("#preco_unitario").val();
			var quantidade_stock = $("#quantidade_stock").val();
			var quantidade_a_comprar = $("#quantidade_a_comprar").val();
			var total_a_pagar = $("#total_a_pagar").val();
			var observacoes = $("#observacoes").val();			

			if(nome_cliente==""){				
				$("#nome_cliente").focus();
				alertify.error('insira o nome do cliente');
			}else if(designacao_produto==""){
				$("#designacao_produto").focus();
				alertify.error('insira a designação do produto.');
			}else if(referencia_produto==""){
				$("#referencia_produto").focus();
				alertify.error('insira a referência do produto.');
			}else if(preco_unitario==""){
				$("#preco_unitario").focus();
				alertify.error('insira o preço de venda');
			}else if(quantidade_a_comprar==""){
				$("#quantidade_a_comprar").focus();
				alertify.error('escolhe a quantidade a comprar');
			}else if(total_a_pagar==""){
				$("#total_a_pagar").focus();
				alertify.error('insira o responsavel da requisiçãototal por pagar');
			}else{
				var dados = {"nome_cliente":nome_cliente,"designacao_produto":designacao_produto,
						"referencia_produto":referencia_produto,"preco_unitario":preco_unitario,
						"quantidade_stock":quantidade_stock,"quantidade_a_comprar":quantidade_a_comprar,"total_a_pagar":total_a_pagar,
						"observacoes":observacoes,"id_produto_vendido":id_produto_vendido};
			
				$.post("",{want:"drogaria",data:"vendas","dados":dados},function(resp){
					var res=JSON.parse(resp);
					if(res["sucesso"]=='sucesso'){
						$("#nome_cliente").val("");
						$("#designacao_produto").val("");
						$("#referencia_produto").val("");
						$("#preco_unitario").val("");
						$("#quantidade_stock").val("");
						$("#quantidade_a_comprar").val("");
					    $("#total_a_pagar").val("");
						$("#observacoes").val("");	
						$("#area_results").html("");
		                $.post("",{want:"drogaria",data:"historico_vendas"},function(resp){
		                    $("#area_results").html(resp);                 
		                });					
						alertify.alert("registado com sucesso");
					}else{
						alertify.alert("erro de inserção");
					}
				});				
			}

		});

		$("#cancelar_requisicao").on("click",function(){
			$("#destino_produto").val("");
			$("#designacao_produto").val("");
			$("#referencia_produto").val("");
			$("#quantidade_produto").val("");
			$("#categoria").val("opcao");
			$("#responsavel").val("");			
			$("#observacoes").val("");
		});
		
		/*$("#myTabContent").html("");
		$("#myTabContent").append("<h1>Lista de pedido materiais</h1>");

		*/$('.dataTables-example').dataTable({
                responsive: true,
                /*"dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }*/
            });


		$("#venda_diaria").on("click",function(){
			 $("#area_results").html("");
                $.post("",{want:"drogaria",data:"historico_vendas"},function(resp){
                    $("#area_results").html(resp);                 
                });
		});


		$("#venda_mensal").on("click",function(){

			$("#area_pesquisa").html("");
			$("#myTabContent").html("");
			$.post("",{want:"drogaria",data:"vendas_do_mes"},function(reppp){
				//alert(reppp);
				$("#myTabContent").html(reppp);
			});
		});



		
	});
</script>
