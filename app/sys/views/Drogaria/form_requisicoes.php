<?php
	$nome = $_SESSION['nome'];
    
?>




<form class="form-horizontal" style="margin-left:15vw; margin-top:4vh;  margin-top:0vh;" >
       <div class="form-group" style="align:center;"><label class="col-lg-2 control-label"></label>

    <div class="col-lg-6"></div>
    </div>                          
    <div class="form-group" style="align:center; text-color:white;"><label class="col-lg-2 control-label" style="color:#2f4050;">Destinatário</label>

    <div class="col-lg-6"><input type="text" id="destino_produto" placeholder="destinatario" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Designação</label>

    <div class="col-lg-6"><input type="text" id="designacao_produto" placeholder="designação" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Referência</label>

    <div class="col-lg-6"><input type="text" id="referencia_produto" placeholder="referência" class="form-control"></div>
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

    <div class="col-lg-6" style="margin-left:6vw;"><button class="btn btn-danger btn-rounded" type="button" id="cancelar_requisicao" style="margin-left:2vw;"><i class="fa fa-check"> Cancelar</i>
    <button class="btn btn-info btn-rounded" type="button" id="submeter_pedido" style="margin-left:1vw;"><i class="fa fa-check"> Submeter</i>
    </button>
    

    </div>
    
    <input type='hidden' value="<?php echo $nome ?>" id="nome_user">
    
</form>


<script type="text/javascript">
	$(document).ready(function(){

		
		
		
		$("#submeter_pedido").on("click",function(){
			var destino_produto=$("#destino_produto").val();
			var designacao_produto=$("#designacao_produto").val();
			var referencia_produto=$("#referencia_produto").val();
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
				var dados = {"destino_produto":destino_produto,"designacao_produto":designacao_produto,
						"referencia_produto":referencia_produto,"quantidade_produto":quantidade_produto,
						"responsavel":responsavel,"categoria":categoria,"observacoes":observacoes,
						"nome_user":nome_user};

						

				$.post("",{want:"requisicoes",data:"registar_requisicao","dados":dados},function(resp){
					
					var res=JSON.parse(resp);
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
		
	});
</script>
