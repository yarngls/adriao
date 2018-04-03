<?php
	$nome = $_SESSION['nome'];
	$tipo=$_SESSION['tipo'];
	$id_user=$_SESSION['id_user'];
	$username=$_SESSION['username'];
	$dados_rec = $_SESSION['dados_stock'];	

?>




    

<form class="form-horizontal">
	
					
	

    <div class="form-group" style="align:center">
    <button class="btn btn-outline btn-primary " style="margin-left:70vw;" type="button" data-toggle="modal" data-target="#myModal_registar_madeira" id='botao_registar'><i class="fa fa-check"></i>Registar</button>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#" id="elect" class="categoriaMadeira" categoria="mogno" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8">Mogno</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaMadeira" categoria="casquinha" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Casquinha</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaMadeira" categoria="chapa_mdf" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Chapa MDF</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaMadeira" categoria="lamelado_mogno" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Lamelado Mogno</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaMadeira" categoria="lamelado_casquinha" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Lamelado Casquinha</a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaMadeira" categoria="aparite" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Aparite</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaMadeira" categoria="platex" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Platex</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaMadeira" categoria="viga" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Viga</span></a></li>
      
    </ul>
    <div id="myTabContent" class="tab-content" style="margin-top:4vh;">
     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Designação</th>
		            <th>Referencia</th>
		            <th>Stock</th>           
		            <th>Preço Venda</th>
		            <th>Total</th>
		            <th>+ Info</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php
        		for($i=0;$i<count($dados_rec);$i++){
                    $total = $dados_rec[$i]['preco_venda'] * $dados_rec[$i]['quantidade'];
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $dados_rec[$i]['designacao'] ?></td>
		            <td><?php echo $dados_rec[$i]['referencia'] ?></td>
		            <td><?php echo $dados_rec[$i]['quantidade'] ?></td>
		            <td><?php echo $dados_rec[$i]['preco_venda'] ?></td>
                    <td><?php echo $total ?></td>
		            <td style="">
                        <div class="dropdown profile-element"> 
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                             </span> <span class="text-muted text-xs block"><i class="fa fa-bars"></i></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs" style="background-color:#F3F3F4; text-color:#293846;">
                                <li><a href="#" class ="actualizar_produto" id_produto='<?php echo $dados_rec[$i]["id_produto"] ?>' referencia_produto='<?php echo $dados_rec[$i]["referencia"] ?>'><button type="button" class="" data-toggle="modal" data-target="#myModal2">atualizar</button></a></li>
                                <li><a href="#" class="entrada_produto" id_produto='<?php echo $dados_rec[$i]["id_produto"] ?>' referencia_produto='<?php echo $dados_rec[$i]["referencia"] ?>'><button type="button" class="" data-toggle="modal" data-target="#myModal2">Nova Entrada</button></a></li>
                                <li><a href="#" class="historico_produto" id_produto='<?php echo $dados_rec[$i]["id_produto"] ?>' referencia_produto='<?php echo $dados_rec[$i]["referencia"] ?>'>Historico</a></li>                               
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
	 

    


	<!-- Inicio Modal  Registar Produro-->
	<div class="modal fade" id="myModal_registar_madeira" style="margin-left:16vw;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" style="width:65vw; align:center;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Registar Produto</h4>
	      </div>
	      <div class="modal-body" id='myModal_registar_madeira-body'style="margin-left:10vw;">
	      	<form class="form-horizontal" style=" margin-top:4vh;">
                                
			    <div class="form-group" style="align:center"><label class="col-lg-2 control-label">Nº Registo</label>

			    <div class="col-lg-6"><input type="text" id="numero_registo" placeholder="nº registo" class="form-control"></div>
			    </div>
			    <div class="form-group"><label class="col-lg-2 control-label">Categoria</label>

			    <div class="col-lg-6"><select class="form-control m-b" name="categoria" id="categoria_madeira">
			          <option value="opcao_categoria">--- selecione uma opção ---</option>
			          <option value="mogno">mogno</option>
			          <option value="casquinha">casquinha</option>
			          <option value="chapa_mdf">chapa_mdf</option>
			          <option value="lamelado_mogno">lamelado_mogno</option>
			          <option value="lamelado_casquinha">lamelado_casquinha</option>
			          <option value="aparite">aparite</option>
			          <option value="ferragem">platex</option>
			          <option value="viga">viga</option>
			      </select>
			    </div> 	
			    </div>
			    <div class="form-group"><label class="col-lg-2 control-label"></label>

			   </div>
			    <div class="form-group"><label class="col-lg-2 control-label">Comprimento</label>

			    <div class="col-lg-6"><input type="number"  id="comprimento_madeira" placeholder="comprimento madeira" class="form-control"></div>
			    </div>

			    <div class="form-group"><label class="col-lg-2 control-label">Espessura</label>

			    <div class="col-lg-6"><input type="number" id="espessura_madeira" placeholder="espessura madeira" class="form-control"></div>
			    </div>

			    <div class="form-group"><label class="col-lg-2 control-label">Largura</label>

			    <div class="col-lg-6"><input type="text" id="largura_madeira" placeholder="largura madeira" class="form-control"></div>
			    </div> 
			   
			    <div class="form-group"><label class="col-lg-2 control-label">Cubagem</label>

			    <div class="col-lg-6"><input type="number" id="cubagem_madeira" placeholder="cubagem madeira" class="form-control"></div>
			    </div>
			    <div class="form-group"><label class="col-lg-2 control-label">Preço Unitário</label>

			    <div class="col-lg-6"><input type="number" id="preco_unitario" readonly="readonly" placeholder="preço unitário" class="form-control"></div>
			    </div>
			    <div class="form-group"><label class="col-lg-2 control-label">Observação</label>

			    <div class="col-lg-6"><input type="text" id="obs_madeira"  placeholder="observação registo" class="form-control"></div>
			    </div>
			    <div class="col-lg-6" style="margin-left:6vw;">
			    </div>
    		</form>
	      </div>
	      <div class="modal-footer" id='myModal_registar_madeira-footer'>
	         <button class="btn btn-danger btn-rounded" type="button" id="cancelar_stock"><i class="fa fa-check"> Cancelar Registo</i>
	         <button class="btn btn-info btn-rounded" type="button" id="registar_madeira" style="margin-left:2vw;"><i class="fa fa-check"> Guardar Registo</i></button>
	    </div>
	  </div>
	</div>

	<!-- Fim Modal  Registar Produro-->





   

    
               
             
   
</form>
<script type="text/javascript">
	$(document).ready(function(){

		
		$("#myTabContent").html("");

		$.post("",{want:"madeira",data:"listagem_stock_madeira","categoria_madeira":"mogno"},function(resp){

			$("#myTabContent").html("<img src=img/ajax-loader.gif>");
			setTimeout(function() {

                $("#myTabContent").html(resp);

            }, 1000);
			

		});

	

		$('.dataTables-example').dataTable({
                responsive: true,
                /*"dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }*/
            });

		$("body").on("click",".actualizar_produto",function(){
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
           // alert(resp);
          });       
        }
    });

		$("#registar").on("click",function(){
			$("#area_results").html("");			
			$.post("",{want:"drogaria",data:"form_registo_stock"},function(resp){
				$("#area_results").html(resp);
			});
		});

		

		$(".categoriaMadeira").on("click",function(){			
			$("#myTabContent").html("");
			var categoria = $(this).attr("categoria");

			$.post("",{want:"madeira",data:"listagem_stock_madeira","categoria_madeira":categoria},function(resp){
				$("#myTabContent").html("<img src='img/ajax-loader.gif'>");
					setTimeout(function(){
					$("#myTabContent").html(resp);
				},1000);
				
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


		$("#botao_registar").on("click",function(){		
			$("#numero_registo").val("");
			$("#categoria_madeira").val("opcao_categoria");
			$("#comprimento_madeira").val("");	
			$("#largura_madeira").val("");
			$("#espessura_madeira").val("");
			$("#cubagem_madeira").val("");
			$("#preco_unitario").val("");
			$("#obs_madeira").val("");
		});


		$("#comprimento_madeira").change(function(){
			var comprimento_madeira = $("#comprimento_madeira").val();	
			var largura_madeira = $("#largura_madeira").val();
			var espessura_madeira = $("#espessura_madeira").val();
			var cubagem_madeira = $("#cubagem_madeira").val();
			if(comprimento_madeira!="" && largura_madeira!="" && espessura_madeira!="" && cubagem_madeira!=""){
				var preco_unitario = Math.round(comprimento_madeira*largura_madeira*espessura_madeira*cubagem_madeira);
				$("#preco_unitario").val(preco_unitario);
			}else{
				$("#preco_unitario").val("");
			}
		});

		$("#largura_madeira").change(function(){
			var comprimento_madeira = $("#comprimento_madeira").val();	
			var largura_madeira = $("#largura_madeira").val();
			var espessura_madeira = $("#espessura_madeira").val();
			var cubagem_madeira = $("#cubagem_madeira").val();
			if(comprimento_madeira!="" && largura_madeira!="" && espessura_madeira!="" && cubagem_madeira!=""){
				var preco_unitario = Math.round(comprimento_madeira*largura_madeira*espessura_madeira*cubagem_madeira);
				$("#preco_unitario").val(preco_unitario);
			}else{
				$("#preco_unitario").val("");
			}
		});

		$("#espessura_madeira").change(function(){
			var comprimento_madeira = $("#comprimento_madeira").val();	
			var largura_madeira = $("#largura_madeira").val();
			var espessura_madeira = $("#espessura_madeira").val();
			var cubagem_madeira = $("#cubagem_madeira").val();
			if(comprimento_madeira!="" && largura_madeira!="" && espessura_madeira!="" && cubagem_madeira!=""){
				var preco_unitario = Math.round(comprimento_madeira*largura_madeira*espessura_madeira*cubagem_madeira);
				$("#preco_unitario").val(preco_unitario);
			}else{
				$("#preco_unitario").val("");
			}

		});

		$("#cubagem_madeira").change(function(){
			var comprimento_madeira = $("#comprimento_madeira").val();	
			var largura_madeira = $("#largura_madeira").val();
			var espessura_madeira = $("#espessura_madeira").val();
			var cubagem_madeira = $("#cubagem_madeira").val();
			if(comprimento_madeira!="" && largura_madeira!="" && espessura_madeira!="" && cubagem_madeira!=""){
				var preco_unitario = Math.round(comprimento_madeira*largura_madeira*espessura_madeira*cubagem_madeira);
				$("#preco_unitario").val(preco_unitario);
			}else{
				$("#preco_unitario").val("");
			}

		});

		$("#registar_madeira").on("click",function(){
			var numero_registo=$("#numero_registo").val();
			var categoria_madeira=$("#categoria_madeira").val();
			var comprimento_madeira = $("#comprimento_madeira").val();	
			var largura_madeira = $("#largura_madeira").val();
			var espessura_madeira = $("#espessura_madeira").val();
			var cubagem_madeira = $("#cubagem_madeira").val();
			var preco_unitario = $("#preco_unitario").val();
			var obs_madeira = $("#obs_madeira").val();

			
			
			if(numero_registo==""){				
				$("#numero_registo").focus();
				alertify.error('insira o numero da madeira.');
			}else if(categoria_madeira=="opcao_categoria"){
				$("#categoria_madeira").focus();
				alertify.error('insira a categoria da madeira.');
			}else if(comprimento_madeira==""){
				$("#comprimento_madeira").focus();
				alertify.error('insira o comprimento da madeira.');
			}else if(largura_madeira==""){
				$("#largura_madeira").focus();
				alertify.error('insira a largura da madeira.');
			}else if(espessura_madeira==""){
				$("#espessura_madeira").focus();
				alertify.error('insira a espessura da madeira.');
			}else if(cubagem_madeira==""){
				$("#preco_unitario").focus();
				alertify.error('escolhe a cubagem da madeira');
			}else{
				var dados = {"numero_registo":numero_registo,"categoria_madeira":categoria_madeira,
							 "comprimento_madeira":comprimento_madeira,"largura_madeira":largura_madeira,
							 "espessura_madeira":espessura_madeira,"cubagem_madeira":cubagem_madeira,
							 "preco_unitario":preco_unitario,"obs_madeira":obs_madeira};

				$.post("",{want:"madeira",data:"registar_madeira","dados":dados},function(resp){
					alertify.alert("Regisatdo com sucesso")
					$("#numero_registo").val("");
					$("#categoria_madeira").val("opcao_categoria");
					$("#comprimento_madeira").val("");	
					$("#largura_madeira").val("");
					$("#espessura_madeira").val("");
					$("#cubagem_madeira").val("");
					$("#preco_unitario").val("");
					$("#obs_madeira").val("");
				});				
			}

		});

		$("#cancelar_stock").on("click",function(){
			$("#designacao").val("");
			$("#referencia").val("");
			$("#quantidade").val("");	
			$("#nome_fornecedor").val("");
			$("#preco_compra").val("");
			$("#preco_venda").val("");
			$("#categoria").val("opcao");
			$("#ganho").val("");
		});

		
	});
</script>
