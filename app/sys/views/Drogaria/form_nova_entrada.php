<?php
	$dados_produto=$_SESSION['dados_produto'];
	
?>

<!--<script type="text/javascript" src="js/head.js" language="javascript"></script>-->
<!--<script type="text/javascript" src="js/cliente.js" language="javascript"></script>
<link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="css_bootstrap/bootstrap.min.css" rel="stylesheet">-->
<form class="form-horizontal" style="margin-left:15vw; margin-top:4vh;">
                                
    <div class="form-group" style="align:center"><label class="col-lg-2 control-label">Designação</label>

    <div class="col-lg-6"><input type="text" id="designacao" value="<?php echo $dados_produto[0]['designacao'] ?>" placeholder="designação" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Referência</label>

    <div class="col-lg-6"><input type="text" id="referencia" value="<?php echo $dados_produto[0]['referencia'] ?>" placeholder="referência" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Quantidade em Stock</label>

    <div class="col-lg-6"><input type="number" readonly="readonly"  id="quantidade_stock" value="<?php echo $dados_produto[0]['quantidade'] ?>" placeholder="quantidade" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Preço Venda</label>

    <div class="col-lg-6"><input type="number" id="preco_venda" value="<?php echo $dados_produto[0]['preco_venda'] ?>" placeholder="preço venda" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Categoria</label>
    
    <div class="col-lg-6"><input type="text" id="categoria" value="<?php echo $dados_produto[0]['categoria'] ?>" placeholder="categoria" class="form-control">
    </div>
     </div>
     <div class="form-group"><label class="col-lg-2 control-label">Nome Fornecedor</label>

    <div class="col-lg-6"><input type="text" id="nome_fornecedor"  placeholder="nome fornecedor" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Preço Fornecedor</label>

    <div class="col-lg-6"><input type="number" id="preco_fornecedor" value="" placeholder="preço fornecedor" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Quantidade a entrar</label>

    <div class="col-lg-6"><input type="number" id="quantidade_entrada" value="" placeholder="quantida a entrar" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Stock Actualizado</label>

    <div class="col-lg-6"><input type="number" id="stock_actual" readonly="readonly" value="" placeholder="stock actualizaado" class="form-control"></div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">Margem de Ganho</label>

    <div class="col-lg-6"><input type="number" id="ganho" readonly="readonly" placeholder="margem de ganho" class="form-control"></div>
    </div>
     <div class="modal-footer">
	       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
   		   <button type="button" class="btn btn-primary" id="registar_nova_entrada">Guardar</button>
	    </div>
	  </div>

    <input type="hidden" value="<?php echo $dados_produto[0]['quantidade'] ?>" id="stock_encontrado">   
    <input type="hidden" value="<?php echo $dados_produto[0]['id_produto'] ?>" id="id_produto">   
    

    
</form>
<script type="text/javascript">
	$(document).ready(function(){


		$("#quantidade_entrada").on("change",function(){

			var quantidade_entrada = $(this).val(); 
			if(isNaN(quantidade_entrada)){
			 	$("#stock_actual").val("");
			}else{
				var stock_encontrado = parseInt($("#quantidade_stock").val());
				var quantidade_entrada = parseInt($(this).val());

				var stock_actualizado = stock_encontrado+quantidade_entrada;
				$("#stock_actual").val(stock_actualizado);
			}
		});

		$("#preco_fornecedor").change(function(){

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



		$("#registar_nova_entrada").on("click",function(){

			var designacao=$("#designacao").val();
			var referencia=$("#referencia").val();
			var quantidade = $("#quantidade_stock").val();
			var preco_venda = $("#preco_venda").val();
			var categoria = $("#categoria").val();
			var nome_fornecedor = $("#nome_fornecedor").val();
			var preco_fornecedor = $("#preco_fornecedor").val();
			var quantidade_entrada = $("#quantidade_entrada").val();
			var stock_actual = $("#stock_actual").val();
			var id_produto = $("#id_produto").val();

			if(designacao==""){				
				$("#designacao").focus();
				alertify.error('insira a designacao do produto');
			}else if(referencia==""){
				$("#referencia").focus();
				alertify.error('insira a referencia do produto');
			}else if(quantidade==""){
				$("#quantidade_stock").focus();
				alertify.error('insira a quantidade do produto');
			}else if(preco_venda==""){
				$("#preco_venda").focus();
				alertify.error('insira a preço de venda do produto');
			}else if(categoria==""){
				$("#categoria").focus();
				alertify.error('escolhe a categoria do produto');
			}else if(nome_fornecedor==""){
				$("#nome_fornecedor").focus();
				alertify.error('insira o fornecedor do produto');
			}else if(preco_fornecedor==""){
				$("#preco_fornecedor").focus();
				alertify.error('insira o preço do fornecedor');
			}else if(quantidade_entrada==""){
				$("#quantidade_entrada").focus();
				alertify.error('insira a quantidade de entrada');
			}else if(quantidade_entrada==""){
				$("#quantidade_entrada").focus();
				alertify.error('insira a quantidade de entrada');
			}else if(parseInt(ganho)<=0){				
				alertify.error('margem de ganho é negativo ou nulo');
			}else{
				var dados = {"designacao":designacao,"referencia":referencia,
							 "quantidade":quantidade,"preco_venda":preco_venda,"categoria":categoria,
							 "nome_fornecedor":nome_fornecedor,"preco_fornecedor":preco_fornecedor,
							 "quantidade_entrada":quantidade_entrada,"stock_actual":stock_actual,
							 "id_produto":id_produto};

				$.post("",{want:"drogaria",data:"registar_nova_entrada","dados":dados},function(resp){
					/*$("#designacao").val("");
					$("#referencia").val("");
					$("#quantidade").val("");	
					$("#preco").val("");
					$("#categoria").val("opcao");*/
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
		
	});
</script>
