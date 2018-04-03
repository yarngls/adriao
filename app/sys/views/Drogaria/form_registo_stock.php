<?php

?>


<form class="form-horizontal" style="margin-left:15vw; margin-top:4vh;">
                                
    <div class="form-group" style="align:center"><label class="col-lg-2 control-label">Designação</label>

    <div class="col-lg-6"><input type="text" id="designacao" placeholder="designação" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Referência</label>

    <div class="col-lg-6"><input type="text" id="referencia" placeholder="referência" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Quantidade</label>

    <div class="col-lg-6"><input type="number"  id="quantidade" placeholder="quantidade" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Fornecedor</label>

    <div class="col-lg-6"><input type="text" id="fornecedor" placeholder="fornecedor" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Preço Compra</label>

    <div class="col-lg-6"><input type="number" id="preco_compra" placeholder="preço compra" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Preço Venda</label>

    <div class="col-lg-6"><input type="number" id="preco_venda" placeholder="preço venda" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Margem de Ganho</label>

    <div class="col-lg-6"><input type="number" id="ganho" readonly="readonly" placeholder="margem de ganho" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Categoria</label>

    <div class="col-lg-6"><select class="form-control m-b" name="categoria" id="categoria">
          <option value="opcao">--- selecione uma opção ---</option>
          <option value="electricidade">electricidade</option>
          <option value="carpintaria">carpintaria</option>
          <option value="hidronil"> hidronil</option>
          <option value="agua">agua</option>
          <option value="ppr">ppr</option>
          <option value="pvc">pvc</option>
          <option value="ferragem">ferragem</option>
          <option value="diversos">diversos</option>

      </select>
    </div> 
    

    </div><div class="form-group" style="align:center"><label class="col-lg-2 control-label"></label>

    <div class="col-lg-6" style="margin-left:6vw;"><button class="btn btn-danger btn-rounded" type="button" id="cancelar_stock"><i class="fa fa-check"> Cancelar</i>
    <button class="btn btn-info btn-rounded" type="button" id="registar_stock" style="margin-left:2vw;"><i class="fa fa-check"> Guardar</i>
                            </button>
    

    </div>
    

    
</form>
<script type="text/javascript">
	$(document).ready(function(){


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
		
	});
</script>
