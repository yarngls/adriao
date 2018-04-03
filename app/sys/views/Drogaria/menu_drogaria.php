<?php
	$nome = $_SESSION['nome'];
	$tipo=$_SESSION['tipo'];
	$id_user=$_SESSION['id_user'];
	$username=$_SESSION['username'];
	$dados_rec = $_SESSION['dados_stock'];	

?>




    

<form class="form-horizontal">
	
					
	

    <div class="form-group" style="align:center">
    <button class="btn btn-outline btn-primary " style="margin-left:70vw;" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-check"></i>Registar</button>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#" id="" class="info_drogaria" categoria="#" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8"> Pedido Materiais</span></a></li>
      <li role="presentation" class=""><a href="#" id="elect" class="categoriaProduto" categoria="electricidade" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8">Elect.</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaProduto" categoria="carpintaria" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Carp.</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaProduto" categoria="hidronil" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Hidronil</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaProduto" categoria="agua" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Agua</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaProduto" categoria="ppr" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">PPR</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaProduto" categoria="pvc" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">PVC</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaProduto" categoria="ferragem" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Ferragem</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaProduto" categoria="sita" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Sita</span></a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="" class="categoriaProduto" categoria="diversos" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Diversos</span></a></li>
      
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
	<div class="modal fade" id="myModal" style="margin-left:16vw;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" style="width:65vw; align:center;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Registar Produto</h4>
	      </div>
	      <div class="modal-body" style="margin-left:10vw;">
	      	<form class="form-horizontal" style=" margin-top:4vh;">
                                
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

			    <div class="col-lg-6"><input type="text" id="nome_fornecedor" placeholder="fornecedor" class="form-control"></div>
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
			          <option value="sita">sita</option>
			          <option value="diversos">diversos</option>

			      </select>
			    </div> 
			    

			    </div><div class="form-group" style="align:center"><label class="col-lg-2 control-label"></label>

			    <div class="col-lg-6" style="margin-left:6vw;">
			   
			    

			    </div>
    		</form>
	      </div>
	      <div class="modal-footer">
	         <button class="btn btn-danger btn-rounded" type="button" id="cancelar_stock"><i class="fa fa-check"> Cancelar Registo</i>
	         <button class="btn btn-info btn-rounded" type="button" id="registar_stock" style="margin-left:2vw;"><i class="fa fa-check"> Guardar Registo</i></button>
	    </div>
	  </div>
	</div>

	<!-- Fim Modal  Registar Produro-->





   

    
               
             
   
</form>
<script type="text/javascript">
	$(document).ready(function(){

		
		$("#myTabContent").html("");
		$("#myTabContent").append("<h1>Lista de pedido materiais</h1>");

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
			var nome_fornecedor = $("#nome_fornecedor").val();
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
							 "quantidade":quantidade,"nome_fornecedor":nome_fornecedor,"preco_compra":preco_compra,"preco_venda":preco_venda,"categoria":categoria};
				$.post("",{want:"drogaria",data:"registar_stock","dados":dados},function(resp){
					var res=JSON.parse(resp);
					if(res["sucesso"]=='sucesso'){
					$("#designacao").val("");
					$("#referencia").val("");
					$("#quantidade").val("");	
					$("#nome_fornecedor").val("");
					$("#preco_compra").val("");
					$("#preco_venda").val("");
					$("#categoria").val("opcao");
					$("#ganho").val("");
						alertify.alert("registado com sucesso");
					}else{
						alertify.alert("erro de inserção");
					}
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
