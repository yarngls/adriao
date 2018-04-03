<?php
	$dados_update=$_SESSION["dados_update"];
	//var_dump($dados_update);
	$ganho = $dados_update[0]["preco_venda"] - $dados_update[0]["preco_compra"];
	//var_dump($dados_update);

?>


<form class="form-horizontal" style="margin-left:15vw; margin-top:4vh;">
                                
    <div class="form-group" style="align:center"><label class="col-lg-2 control-label">Designação</label>

    <div class="col-lg-6"><input type="text" id="designacao" placeholder="designação" class="form-control" value="<?php echo $dados_update[0]["designacao"];?>"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Referência</label>

    <div class="col-lg-6"><input type="text" id="referencia" placeholder="referência" class="form-control" value="<?php echo $dados_update[0]["referencia"];?>" ></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Quantidade</label>

    <div class="col-lg-6"><input type="number"  id="quantidade" placeholder="quantidade" class="form-control" value="<?php echo $dados_update[0]["quantidade"];?>"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Preço Compra</label>

    <div class="col-lg-6"><input type="number" id="preco_compra" placeholder="preço" class="form-control" value="<?php echo $dados_update[0]["preco_compra"];?>"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Preço Venda</label>

    <div class="col-lg-6"><input type="number" id="preco_venda" placeholder="preço" class="form-control" value="<?php echo $dados_update[0]["preco_venda"];?>"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Margem de Ganho</label>

    <div class="col-lg-6"><input type="number" id="ganho" readonly="readonly" placeholder="preço" class="form-control" value="<?php echo $ganho?>"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">Categoria</label>

    <div class="col-lg-6"><select class="form-control m-b" name="categoria" id="categoria">
    	<?php
    		if($dados_update[0]["categoria"] == "electricidade"){
    			?>
    				<option value="electricidade" selected="">electricidade</option>
			        <option value="carpintaria">carpintaria</option>
			        <option value="hidronil"> hidronil</option>
			        <option value="agua">agua</option>
			        <option value="ppr">ppr</option>
			        <option value="pvc">pvc</option>
			        <option value="ferragem">ferragem</option>
			        <option value="sita">sita</option>
			        <option value="diversos">diversos</option>
    			<?php
    		}else if($dados_update[0]["categoria"] == "carpintaria"){
    			?>
    				<option value="electricidade" selected="">electricidade</option>
    				<option value="carpintaria" selected="">carpintaria</option>			       
			        <option value="hidronil"> hidronil</option>
			        <option value="agua">agua</option>
			        <option value="ppr">ppr</option>
			        <option value="pvc">pvc</option>
			        <option value="ferragem">ferragem</option>
			        <option value="sita">sita</option>
			        <option value="diversos">diversos</option>
    			<?php
    		}else if($dados_update[0]["categoria"] == "hidronil"){
    			?>
    				<option value="electricidade" selected="">electricidade</option>
			        <option value="carpintaria">carpintaria</option>
    				<option value="hidronil" selected=""> hidronil</option>
			        <option value="agua">agua</option>
			        <option value="ppr">ppr</option>
			        <option value="pvc">pvc</option>
			        <option value="ferragem">ferragem</option>
			        <option value="sita">sita</option>
			        <option value="diversos">diversos</option>
    			<?php
    		}else if($dados_update[0]["categoria"] == "agua"){
    			?>
    				<option value="electricidade" selected="">electricidade</option>
			        <option value="carpintaria">carpintaria</option>
			        <option value="hidronil"> hidronil</option>
    				<option value="agua" selected="">agua</option>
			        <option value="ppr">ppr</option>
			        <option value="pvc">pvc</option>
			        <option value="ferragem">ferragem</option>
			        <option value="sita">sita</option>
			        <option value="diversos">diversos</option>
    			<?php
    		}else if($dados_update[0]["categoria"] == "ppr"){
    			?>
    				<option value="electricidade" selected="">electricidade</option>
			        <option value="carpintaria">carpintaria</option>
			        <option value="hidronil"> hidronil</option>
			        <option value="agua">agua</option>
    				<option value="ppr" selected="">ppr</option>
			        <option value="pvc">pvc</option>
			        <option value="ferragem">ferragem</option>
			        <option value="sita">sita</option>
			        <option value="diversos">diversos</option>
    			<?php
    		}else if($dados_update[0]["categoria"] == "pvc"){
    			?>
    				<option value="electricidade" selected="">electricidade</option>
			        <option value="carpintaria">carpintaria</option>
			        <option value="hidronil"> hidronil</option>
			        <option value="agua">agua</option>
			        <option value="ppr">ppr</option>
    				<option value="pvc" selected="">pvc</option>
			        <option value="ferragem">ferragem</option>
			        <option value="sita">sita</option>
			        <option value="diversos">diversos</option>
    			<?php
    		}else if($dados_update[0]["categoria"] == "ferragem"){
    			?>
    				<option value="electricidade" selected="">electricidade</option>
			        <option value="carpintaria">carpintaria</option>
			        <option value="hidronil"> hidronil</option>
			        <option value="agua">agua</option>
			        <option value="ppr">ppr</option>
			        <option value="pvc">pvc</option>
    				<option value="ferragem" selected="">ferragem</option>
    				<option value="sita" selected="">sita</option>
			        <option value="diversos">diversos</option>
    			<?php
    		}else if($dados_update[0]["categoria"] == "sita"){
    			?>
    				<option value="electricidade" selected="">electricidade</option>
			        <option value="carpintaria">carpintaria</option>
			        <option value="hidronil"> hidronil</option>
			        <option value="agua">agua</option>
			        <option value="ppr">ppr</option>
			        <option value="pvc">pvc</option>
    				<option value="ferragem">ferragem</option>
    				<option value="sita" selected="">sita</option>
			        <option value="diversos">diversos</option>
    			<?php
    		}else{
    			?>
    				<option value="electricidade" selected="">electricidade</option>
			        <option value="carpintaria">carpintaria</option>
			        <option value="hidronil"> hidronil</option>
			        <option value="agua">agua</option>
			        <option value="ppr">ppr</option>
			        <option value="pvc">pvc</option>
			        <option value="ferragem">ferragem</option>
			        <option value="sita">sita</option>
    				<option value="diversos" selected="">diversos</option>
    			<?php
    		}
    	?> 
      </select>
      <input type="hidden" value="<?php echo $dados_update[0]["id_produto"] ?>" id="id_produto">
    </div> 
    

    </div><div class="form-group" style="align:center"><label class="col-lg-2 control-label"></label>

    
     <div class="modal-footer">
	       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
   	<button type="button" class="btn btn-primary" id="atualizar_stock">Guardar</button>
	    </div>
	  </div>
    

    
</form>
<script type="text/javascript">
	$(document).ready(function(){



		$("#atualizar_stock").on("click",function(){
			var id_produto = $("#id_produto").val();
			var designacao = $("#designacao").val();
			var referencia = $("#referencia").val();
			var quantidade = $("#quantidade").val();	
			var preco_compra = $("#preco_compra").val();
			var preco_venda = $("#preco_venda").val();
			var categoria = $("#categoria").val();

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
					/*$("#designacao").val("");
					$("#referencia").val("");
					$("#quantidade").val("");	
					$("#preco_compra").val("");
					$("#preco_venda").val("");
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
