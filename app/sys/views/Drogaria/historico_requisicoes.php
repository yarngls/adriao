<?php
	//$nome = $_SESSION['nome'];
	$historico_requisicoes = $_SESSION['historico_requisicoes'];	
	//var_dump($historico_vendas);

?>




    

<form class="form-horizontal">
	
					
	

    <div class="form-group" style="align:center">
    <button class="btn btn-outline btn-primary " style="margin-left:70vw;" type="button" data-toggle="modal" data-target="#myModal-requisicoes" id="nova_requisicao"><i class="fa fa-check"></i>Nova Requisição</button>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#" id="requisicao_diaria" class="" categoria="#" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8"> Todas requisições</span></a></li>
      <li role="presentation" class=""><a href="#" id="requisicao_mensal" class=""  role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8">Requisição Mensais</span></a></li>
      
    </ul>
    <div class="form-group"  id="area_pesquisa" style="margin-left:0.2vw;">
    <table>
				<tbody>
					<tr>
						<td>
							<select class="form-control" id="dia_requisicao">
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
							<select class="form-control" id="mes_requisicao">
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
							<select class="form-control" id="ano_requisicao">
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
							<button class="btn btn-primary dim" id="persquisar_requisicoes" style="margin-top:2vh;" type="button"><i class="fa fa-check"></i></button>
						</td>

						
					</tr>
				</tbody>
			</table>
		</div>
    <div id="myTabContent" class="tab-content" style="margin-top:4vh;">
			    

        	
     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Destino</th>		           
		            <th>+ INFO</th>

	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		
        		for($i=0;$i<count($historico_requisicoes);$i++){
                   
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $historico_requisicoes[$i]['destino_produto'] ?></td>		            
		          	            
		           <td style="width:2;">
                        <div class="dropdown profile-element"> 
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                             </span> <span class="text-muted text-xs block"><i class="fa fa-bars"></i></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs" style="background-color:#F3F3F4; text-color:#293846;">
		        		     <li><a href="#" class ="info_requisicoes" id_requisitor="<?php echo $historico_requisicoes[$i]['id_requisitor'] ?>"  nome_requisitor="<?php echo $historico_requisicoes[$i]['destino_produto'] ?>" ><button type="button" class="" data-toggle="modal" data-target="#myModal-requisicoes">nova requisição</button></a></li>
		        		     <li><a href="#" class ="listagem_requisicoes_requisitor" id_requisitor_listagem="<?php echo $historico_requisicoes[$i]['id_requisitor'] ?>"  nome_requisitor_listagem="<?php echo $historico_requisicoes[$i]['destino_produto'] ?>"><button type="button" class="" data-toggle="modal" data-target="#myModal_descricao_requisição">listar requisições</button></a></li>
		        		    </ul>
                        </div>  
                           
                    </td> 		            
		            
		        </tr>
		    <?php
            	}
            ?>                
	         
        </tbody>                 
        </table>
    </div>
	 

    
    <div class="modal fade" id="myModal-requisicoes" style="margin-left:16vw;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" style="width:65vw; align:center;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Registar Requisições</h4>
		      </div>
		      <div class="modal-body">
		      <input type="hidden" id="id_requisicoes_hidden">
		        	<form class="form-horizontal" style="margin-left:15vw; margin-top:4vh;  margin-top:0vh;" >
					       <div class="form-group" style="align:center;"><label class="col-lg-2 control-label"></label>

					    <div class="col-lg-6"></div>
					    </div>                          
					    <div class="form-group" style="align:center; text-color:white;"><label class="col-lg-2 control-label" style="color:#2f4050;">Destinatário</label>

					    <div class="col-lg-6"><input type="text" id="destino_produto" placeholder="destinatario" class="form-control"></div>
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

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Quantidade em Stock</label>

					    <div class="col-lg-6"><input type="text" readonly="readonly" id="quantidade_stock" placeholder="referência do produto" class="form-control"></div>
					    </div>


					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Quantidade</label>      

					    <div class="col-lg-6"><input type="number" id="quantidade_produto" placeholder="quantidade" class="form-control"></div>
					    </div>
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Categoria</label>

					    <div class="col-lg-6"><select class="form-control m-b" name="categoria" id="categoria">
					          <option value="opcao">--- selecione uma opção ---</option>
					          <option value="electricidade">electricidade</option>
					          <option value="carpintaria">carpintaria</option>
					          <option value="hidronil"> hidronil</option>
					          <option value="agua">agua</option>
					          <option value="ppr">ppr</option>
					          <option value="pvc">pvc</option>
					          <option value="ferragem">ferragem</option>
					          <option value="sita">sita</option>
					          <option value="diversos">diversos</option>

					      </select>
					    </div> 
					     </div>

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Responsavel</label>

					    <div class="col-lg-6"><input type="text" id="responsavel" placeholder="responsavel" class="form-control"></div>
					    </div>

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Observação</label>

					    <div class="col-lg-6"><textarea id="observacoes" class="form-control" value = '' name="observacao" rows="5" cols="50" style="height:6vw;"> </textarea></div>
					     </div>             
					    
		    		</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelar_requisicoes">Cancelar Requisição</button>
		        <button type="button" class="btn btn-primary" id="submeter_requisicao" >Registar Requisição</button>
		      </div>
		    </div>
		  </div>
	</div>


	<!------------------------------------- inicio popup listar descricao das requisições de um requisitor --------------------------*/-->

	<div class="modal fade" id="myModal_descricao_requisição" style="margin-left:16vw;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" style="width:84vw; align:center;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModal_descricao_requisição-title">Descrição da Requisição do Cliente </h4>
		      </div>
		      <div class="modal-body" id="myModal_descricao_requisição-body">
		        	
		      <div class="modal-footer">

		      </div>
		    </div>
		  </div>
	</div>


	<!--/*----------------------------------- fim popup listar descricao das requisições de um requisitor--------------------------*/-*/-->
	


	
               
             

<script type="text/javascript">
	$(document).ready(function(){



		$("#nova_requisicao").on("click",function(){
			$("#id_requisicoes_hidden").val("");
			$("#destino_produto").val("");
			$("#designacao_produto").val("");
			$("#referencia_produto").val("");
			$("#quantidade_stock").val("");
			$("#quantidade_produto").val("");
			$("#responsavel").val("");
			$("#categoria").val("opcao");
			$("#observacoes").val("");
			$("#nome_user").val();
		});	

		$("#cancelar_requisicoes").on("click",function(){
			$("#id_requisicoes_hidden").val("");
			$("#destino_produto").val("");
			$("#designacao_produto").val("");
			$("#referencia_produto").val("");
			$("#quantidade_stock").val("");
			$("#quantidade_produto").val("");
			$("#responsavel").val("");
			$("#categoria").val("opcao");
			$("#observacoes").val("");
			$("#nome_user").val();
		});

		$(".info_requisicoes").on("click",function(){
			var id_requisicoes_hidden=$(this).attr("id_requisitor");
			var nome_requisitor=$(this).attr("nome_requisitor");
			$("#id_requisicoes_hidden").val(id_requisicoes_hidden);
			$("#destino_produto").val(nome_requisitor);
			$("#designacao_produto").val("");
			$("#referencia_produto").val("");
			$("#quantidade_stock").val("");
			$("#quantidade_produto").val("");
			$("#categoria").val("opcao");
			$("#responsavel").val("");
			$("#observacoes").val("");
		});


		$(".listagem_requisicoes_requisitor").on("click",function(){
			var id_requisitor=$(this).attr("id_requisitor_listagem");
			var destino_produto=$(this).attr("nome_requisitor_listagem");

			$("#myModal_descricao_requisição-body").html("");
			var dados={"id_requisitor":id_requisitor,"destino_produto":destino_produto};
			$.post("",{want:"drogaria",data:"listagem_requisicoes_requisitor","dados":dados},function(resp){
			
				$("#myModal_descricao_requisição-body").html(resp);
			});

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
			$("#dia_requisicao").val(array_data[2]);
			var mes_certo = returnMes(array_data[1]);
			$("#mes_requisicao").val(mes_certo);
			$("#ano_requisicao").val(array_data[0]);


		});


		$("#persquisar_requisicoes").on("click",function(){
			var dia_requisicao = $("#dia_requisicao").val();
			var mes_requisicao = $("#mes_requisicao").val();
			var ind_mes = returnIndeceMes(mes_requisicao);
			var ano_requisicao = $("#ano_requisicao").val();

			var data_pesquisa = ano_requisicao+"-"+ind_mes+"-"+dia_requisicao;
			$.post("",{want:"drogaria",data:"persquisar_requisicoes","data_pesquisa":data_pesquisa},function(resp){
				
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

			
			$("#submeter_requisicao").on("click",function(){
				var id_requisitor = $("#id_requisicoes_hidden").val();
				var destino_produto=$("#destino_produto").val();
				var designacao_produto=$("#designacao_produto").val();
				var referencia_produto=$("#referencia_produto").val();
				var quantidade_stock=$("#quantidade_stock").val();
				var quantidade_produto = $("#quantidade_produto").val();
				var responsavel = $("#responsavel").val();
				var categoria = $("#categoria").val();
				var observacoes = $("#observacoes").val();
				var nome_user = $("#nome_user").val();			

				if(destino_produto==""){				
					$("#destino_produto").focus();
					alertify.error('insira o destinatário do produto.');
				}else if(designacao_produto==""){
					$("#designacao_produto").focus();
					alertify.error('insira a designação do produto.');
				}else if(referencia_produto==""){
					$("#referencia_produto").focus();
					alertify.error('insira a referência do produto.');
				}else if(quantidade_produto==""){
					$("#quantidade_produto").focus();
					alertify.error('insira a quantidade do produto.');
				}else if(categoria=="opcao"){
					$("#categoria").focus();
					alertify.error('escolhe a categoria do produto');
				}else if(responsavel==""){
					$("#responsavel").focus();
					alertify.error('insira o responsavel da requisição');
				}else if(observacoes==""){	
					$("#observacoes").focus();			
					alertify.error('para melhor controlo insira uma observação');
				}else{
					var dados = {"id_requisitor":id_requisitor,"destino_produto":destino_produto,"designacao_produto":designacao_produto,
							"referencia_produto":referencia_produto,"quantidade_stock":quantidade_stock,"quantidade_produto":quantidade_produto,
							"responsavel":responsavel,"categoria":categoria,"observacoes":observacoes,
							"id_produto_requisitado":id_produto_vendido};

							

					$.post("",{want:"drogaria",data:"registar_requisicao","dados":dados},function(resp){
						alertify.alert("registado com sucesso");
						$("#id_requisicoes_hidden").val("");
						$("#destino_produto").val("");
						$("#designacao_produto").val("");
						$("#referencia_produto").val("");
						$("#quantidade_stock").val("");
						$("#quantidade_produto").val("");
						$("#responsavel").val("");
						$("#categoria").val("opcao");
						$("#observacoes").val("");
					});				
				}

			});

		$("#requisicao_diaria").on("click",function(){
                $("#sub_menus").html("");
                $("#area_results").html("");
               $.post("",{want:"drogaria",data:"historico_requisicoes"},function(resp){
                    $("#area_results").html(resp);                 
                });
            })
			
		$("#requisicao_mensal").on("click",function(){
			$("#area_pesquisa").html("");
			$("#myTabContent").html("");
			$("#myTabContent").html("<h1> Em estudo </h1>");
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

	



		
	});
</script>
