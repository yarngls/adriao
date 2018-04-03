<?php
	//$nome = $_SESSION['nome'];
    
?>



<span style="margin-left:70vw;"><button type="button" class="btn btn-w-m btn-success">Listar Vendas</button></span>
<form class="form-horizontal" style="margin-left:15vw; margin-top:4vh;  margin-top:0vh;" >


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

    <div class="col-lg-6" style="margin-left:6vw;"><button class="btn btn-danger btn-rounded" type="button" id="cancelar_requisicao" style="margin-left:2vw;"><i class="fa fa-check"> Cancelar</i>
    <button class="btn btn-info btn-rounded" type="button" id="submeter_venda" style="margin-left:1vw;"><i class="fa fa-check"> Registar Venda</i>
    </button>
    

    </div>
    
    <input type='hidden' value="<?php echo $nome ?>" id="id_produto">
    
</form>


<script type="text/javascript">
	$(document).ready(function(){

		
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
					alert(resp);
					/*var res=JSON.parse(resp);
					if(res["resposta"]=='1'){
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

		$("#cancelar_requisicao").on("click",function(){
			$("#destino_produto").val("");
			$("#designacao_produto").val("");
			$("#referencia_produto").val("");
			$("#quantidade_produto").val("");
			$("#categoria").val("opcao");
			$("#responsavel").val("");			
			$("#observacoes").val("");
		});
		
	});
</script>
