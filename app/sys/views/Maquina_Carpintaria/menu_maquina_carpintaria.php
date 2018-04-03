<?php
	//$nome = $_SESSION['nome'];
	$historico_maquina = $_SESSION['historico_maquina'];
	//var_dump($historico_vendas);
	$nome = $_SESSION['nome'];
    $tipo=$_SESSION['tipo'];
    $id_user=$_SESSION['id_user'];
    $username=$_SESSION['username'];

?>




    

<form class="form-horizontal">
	
					
	

    <div class="form-group" style="align:center">
    <button class="btn btn-outline btn-primary " style="margin-left:65vw;" type="button" data-toggle="modal" data-target="#myModal">Pagamento Maquina</button>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#" id="maquina_diaria" class="" categoria="#" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8"> Receita Maquina Diaria</span></a></li>
      <li role="presentation" class=""><a href="#" id="maquina_mensal" class=""  role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8">Receita Maquina Mensal</span></a></li>
      
    </ul>
    <div class="form-group"  id="area_pesquisa" style="margin-left:0.2vw;">
    <table>
				<tbody>
					<tr>
						<td>
							<select class="form-control" id="dia_aluguer">
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
							<select class="form-control" id="mes_aluguer">
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
							<select class="form-control" id="ano_aluguer">
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
							<button class="btn btn-primary dim" id="persquisar_pagamento_maquina" style="margin-top:2vh;" type="button"><i class="fa fa-check"></i></button>
						</td>

						<td>
							<?php

				        		$total_diaria=0;
				        		for($i=0;$i<count($historico_maquina);$i++){
				                    $total_diaria = $total_diaria + $historico_maquina[$i]['total_pagar'];
				                }
				        	?>
						</td>
					</tr>
				</tbody>
			</table>
     </div>
    <div id="myTabContent" class="tab-content" style="margin-top:4vh;">
			    
			<h3 style="margin-left:30vw;"> Total da Receita:  <?php echo  $total_diaria ?>$00</h3>

        	
     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Nome Cliente</th>
		            <th>Preço por minuto</th>
		            <th>Total minuto</th>
		            <th>Total a pagar</th>
		            <th>Observacao</th>           
		            <th>data_pagamento</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		
        		for($i=0;$i<count($historico_maquina);$i++){
                   
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $historico_maquina[$i]['nome_cliente'] ?></td>
		            <td><?php echo $historico_maquina[$i]['preco_minuto'] ?></td>
		            <td><?php echo $historico_maquina[$i]['total_minuto'] ?></td>
		            <td><?php echo $historico_maquina[$i]['total_pagar'] ?></td>		            
		            <td><?php echo $historico_maquina[$i]['observacao'] ?></td>		            
		            <td><?php echo $historico_maquina[$i]['data_pagamento'] ?></td> 
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
		        <h4 class="modal-title" id="myModalLabel">Pagamento de maquina</h4>
		      </div>
		      <div class="modal-body">
		        	<form class="form-horizontal" style=" margin-top:4vh; fonte-size:10;">
		                <div class="form-group" style="align:center;"><label class="col-lg-2 control-label"></label>

					    <div class="col-lg-6"></div>
					    </div>   

					    <div class="form-group" style="align:center; text-color:white;"><label class="col-lg-2 control-label" style="color:#2f4050;">Cliente</label>
					    <div class="col-lg-6"><input type="text" id="nome_cliente" placeholder="nome do cliente" class="form-control"></div>
					    </div>					    
					   
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Preço por minuto</label>
					    <div class="col-lg-6"><input type="text"  id="preco_minuto" placeholder="preço minuto a pagar" class="form-control"></div>
					    </div>

					     <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Total de minuto</label>

					    <div class="col-lg-6"><input type="text"  id="total_minuto" placeholder="total de minuto" class="form-control"></div>
					    </div>

					    
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Total a Pagar</label>      

					    <div class="col-lg-6"><input type="number" readonly="readonly" id="total_pagar" placeholder="total a pagar" class="form-control"></div>
					    </div>      

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Observação</label>

					    <div class="col-lg-6"><textarea id="observacao" class="form-control" value = '' name="observacao" rows="5" cols="50" style="height:6vw;"> </textarea></div>
					     </div>

					    
					    
					    <input type='hidden' value="<?php echo $nome ?>" id="id_produto">                 
					    
		    		</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-primary" id="submeter_pagamento_maquina" >Registar Pagamento</button>
		      </div>
		    </div>
		  </div>
	</div>


	
               
             

<script type="text/javascript">
	$(document).ready(function(){


		$("#preco_minuto").change(function(){
			var preco_minuto = $(this).val();
			var total_minuto=$("#total_minuto").val();
			if(preco_minuto!="" && total_minuto!=""){
				var preco_pagar=parseInt(preco_minuto)*parseInt(total_minuto);
				$("#total_pagar").val(preco_pagar);
			}else{
				$("#total_pagar").val("");
			}
		});

		$("#total_minuto").change(function(){
			var preco_minuto = 	$("#preco_minuto").val();
			var total_minuto=$("#total_minuto").val();
			if(preco_minuto!="" && total_minuto!=""){
				var preco_pagar=parseInt(preco_minuto)*parseInt(total_minuto);
				$("#total_pagar").val(preco_pagar);
			}else{
				$("#total_pagar").val("");
			}
		});


		$("#submeter_pagamento_maquina").on("click",function(){


			var nome_cliente=$("#nome_cliente").val();
			var preco_minuto=$("#preco_minuto").val();
			var total_minuto=$("#total_minuto").val();
			var total_pagar = $("#total_pagar").val();
			var observacao = $("#observacao").val();		

			if(nome_cliente==""){				
				$("#nome_cliente").focus();
				alertify.error('insira o nome do cliente');
			}else if(preco_minuto==""){
				$("#preco_minuto").focus();
				alertify.error('insira o preço por minuto');
			}else if(total_minuto==""){
				$("#total_minuto").focus();
				alertify.error('insira o total do minuto');
			}else if(observacao==""){
				$("#observacao").focus();
				alertify.error('Por melhor controlo insira uma observacao');
			}else{
				var dados = {"nome_cliente":nome_cliente,"preco_minuto":preco_minuto,
						"total_minuto":total_minuto,"total_pagar":total_pagar,
						"observacao":observacao};
			
				$.post("",{want:"maquina_carpintaria",data:"pagamento_minuto","dados":dados},function(resp){
					alert(resp);
					//var res=JSON.parse(resp);
					/*if(res["resposta"]=='1'){
						$("#destino_produto").val("");
						$("#designacao_produto").val("");
						$("#referencia_produto").val("");
						$("#quantidade_produto").val("");
						$("#categoria").val("opcao");
						$("#responsavel").val("");			
						$("#observacoes").val("");
						alertify.alert("registado com sucesso");
					}else{
						alert("erro de inserção");
					}*/
				});			
			}

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
		
		$.post("",{want:"drogaria",data:"data_de_hoje"},function(resp){
			var resp=JSON.parse(resp);
			var array_data = resp["data_hoje"].split("-");
			$("#dia_aluguer").val(array_data[2]);
			var mes_certo = returnMes(array_data[1]);
			$("#mes_aluguer").val(mes_certo);
			$("#ano_aluguer").val(array_data[0]);


		});


		$("#persquisar_pagamento_maquina").on("click",function(){
			var dia_aluguer = $("#dia_aluguer").val();
			var mes_aluguer = $("#mes_aluguer").val();
			var ind_mes = returnIndeceMes(mes_aluguer);
			var ano_aluguer = $("#ano_aluguer").val();

			var data_pesquisa = ano_aluguer+"-"+ind_mes+"-"+dia_aluguer;
			$.post("",{want:"maquina_carpintaria",data:"persquisar_pagamento_maquina","data_pesquisa":data_pesquisa},function(resp){
				
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

		$("#venda_mensal").on("click",function(){
			 $("#myTabContent").html("");
			 $("#myTabContent").html("venda Mensal");
              
		});

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

		
		$("#maquina_mensal").on("click",function(){
			$("#area_pesquisa").html("");
			$("#myTabContent").html("");
			$("#myTabContent").html("<h1> Em estudo </h1>");
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
		
		$("#maquina_diaria").on("click",function(){
                $("#area_results").html("");
                $.post("",{want:"maquina_carpintaria",data:"menu_maquina_carpintaria"},function(resp){
                    $("#area_results").html(resp);                 
                });
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

		/*$("body").on("click",".actualizar_produto",function(){
         $("#modal_actualizar").html("");
        	var  id_produto = $(this).attr("id_produto");
       		$.post("",{want:"drogaria",data:"form_update_stock","id_produto":id_produto},function(resp){
           $("#modal_actualizar").html(resp);

        });       

    	});

     $("body").on("click",".entrada_produto",function(){
       $("#modal_nova_entrada").html("");
        var  id_produto = $(this).attr("id_produto");       
        $.post("",{want:"drogaria",data:"form_nova_entrada","id_produto":id_produto},function(resp){
            $("#modal_nova_entrada").html(resp);

        });    

    });

     $("body").on("click",".info_drogaria",function(){
       $("#myTabContent").html("");
       $("#myTabContent").append("<h1>Lista pedido de materiais </h1>");
    });

      $("#actualizar_dados").on("click",function(){
      var designacao = $("#designacao").val();
      var referencia = $("#referencia").val();
      var quantidade = $("#quantidade").val();
      var preco_compra = $("#preco_compra").val();
      var preco_venda = $("#preco_venda").val();
      var categoria = $("#categoria").val();
      var id_produto = $("#id_produto").val();

       if(designacao==""){        
          $("#designacao").focus();
          alertify.error('insira a designacao do produto');
        }else if(referencia==""){
          $("#referencia").focus();
          alertify.error('insira a referencia do produto');
        }else if(quantidade==""){
          $("#quantidade").focus();
          alertify.error('insira a quantidade do produto');
        }else if(preco_compra==""){
          $("#preco_compra").focus();
          alertify.error('insira o preço de compra do produto');
        }else if(preco_venda==""){
          $("#preco_venda").focus();
          alertify.error('insira o preço de venda do produto');
        }else if(categoria=="opcao"){
          $("#categoria").focus();
          alertify.error('escolhe a categoria do produto');
        }else{
          var dados = {"id_produto":id_produto,"designacao":designacao,"referencia":referencia,
                 "quantidade":quantidade,"preco_compra":preco_compra,"preco_venda":preco_venda,
                 "categoria":categoria};
          $.post("",{want:"drogaria",data:"atualizar_stock","dados":dados},function(resp){           
            alert(resp);
          });       
        }
    });

		$("#registar").on("click",function(){
			$("#area_results").html("");			
			$.post("",{want:"drogaria",data:"form_registo_stock"},function(resp){
				$("#area_results").html(resp);
			});
		});

		

		$(".categoriaProduto").on("click",function(){
			//window.location.href=""; 
			$("#myTabContent").html("");
			var categoria = $(this).attr("categoria");
			$.post("",{want:"drogaria",data:"stock_produto","categoria":categoria},function(resp){				
				$("#myTabContent").html(resp);
			});		
		});


			$("#preco_compra").change(function(){

			var preco_compra=parseInt($(this).val());
			var preco_venda=parseInt($("#preco_venda").val());

			if(preco_compra!="" && preco_venda!="" ){
				margem_ganho = parseInt(preco_venda)-parseInt(preco_compra);
				if(parseInt(margem_ganho)<=0){
					$("#ganho").val(margem_ganho);
					$("#ganho").css("color","red");
					$("#ganho").css("border-color","red");

				}else{
					$("#ganho").val(margem_ganho);
					$("#ganho").css("color","green");
					$("#ganho").css("border-color","green");
				}
				
			}else{
				preco_compra=$("#preco_compra").val();
			}
		});


		$("#preco_venda").change(function(){

			var preco_venda=parseInt($(this).val());
			var preco_compra=parseInt($("#preco_compra").val());

			if(preco_venda!="" && preco_compra!=""){

				margem_ganho = parseInt(preco_venda)-parseInt(preco_compra);

				
				if(parseInt(margem_ganho)<=0){
					$("#ganho").val(margem_ganho);
					$("#ganho").css("color","red");
					$("#ganho").css("border-color","red");

				}else{
					$("#ganho").val(margem_ganho);
					$("#ganho").css("color","green");
					$("#ganho").css("border-color","green");
				}
			}else{
				preco_venda=$("#preco_venda").val();
			}
		});



		$("#registar_stock").on("click",function(){
			var designacao=$("#designacao").val();
			var referencia=$("#referencia").val();
			var quantidade = $("#quantidade").val();	
			var preco_compra = $("#preco_compra").val();
			var preco_venda = $("#preco_venda").val();
			var categoria = $("#categoria").val();
			var ganho = $("#ganho").val();

			if(designacao==""){				
				$("#designacao").focus();
				alertify.error('insira a designacao do produto');
			}else if(referencia==""){
				$("#referencia").focus();
				alertify.error('insira a referencia do produto');
			}else if(quantidade==""){
				$("#quantidade").focus();
				alertify.error('insira a quantidade do produto');
			}else if(preco_compra==""){
				$("#preco_compra").focus();
				alertify.error('insira a preço de compra do produto');
			}else if(preco_venda==""){
				$("#preco_venda").focus();
				alertify.error('insira a preço de venda do produto');
			}else if(categoria=="opcao"){
				$("#categoria").focus();
				alertify.error('escolhe a categoria do produto');
			}else if(parseInt(ganho)<=0){				
				alertify.error('margem de ganho é negativo ou nulo');
			}else{
				var dados = {"designacao":designacao,"referencia":referencia,
							 "quantidade":quantidade,"preco_compra":preco_compra,"preco_venda":preco_venda,"categoria":categoria};
				$.post("",{want:"drogaria",data:"registar_stock","dados":dados},function(resp){
					$("#designacao").val("");
					$("#referencia").val("");
					$("#quantidade").val("");	
					$("#preco").val("");
					$("#categoria").val("opcao");
					alert(resp);
				});				
			}

		});

		$("#cancelar_stock").on("click",function(){
			$("#designacao").val("");
			$("#referencia").val("");
			$("#quantidade").val("");	
			$("#preco").val("");
			$("#categoria").val("opcao");
		});

		/*$("#elect").on("click",function(){
			$.post("",{want:"drogaria",data:"stock_elect"},function(resp){
				$("#area_results").html("");
				$("#area_results").html(resp);
			});
		});*/

		



		/*$("#hidronil").on("click",function(){
			alert("hidronil");
		});

		$("#diversos").on("click",function(){
			alert("diversos");
		});

		$("#agua").on("click",function(){
			alert("agua");
		});

		$("#ppr").on("click",function(){
			alert("ppr");
		});

		$("#pvc").on("click",function(){
			alert("pvc");
		});*/




		
	});
</script>
