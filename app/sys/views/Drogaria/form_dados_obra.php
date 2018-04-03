<?php
	$nome = $_SESSION['nome'];
	$tipo=$_SESSION['tipo'];
	$id_user=$_SESSION['id_user'];
	$username=$_SESSION['username'];
	$dados_obras = $_SESSION['informacoes_obra'];

?>




    

<form class="form-horizontal">
		<h3> Nome da Obra: <?php echo $dados_obras[0]['nome_da_obra'] ?></h3>
	 <div class="wrapper wrapper-content" id="" style="">
            <button type="button" id="anotacoes" class="btn btn-w-m btn-primary">Anotações</button>
            <button type="button" id="folha_pagamento" class="btn btn-w-m btn-success">Folha de Pagamento</button>
            <button type="button" id="requisicao_material" class="btn btn-w-m btn-info">Requisição Materiais</button>       
      		<button type="button" id="entrada_material" class="btn btn-w-m btn-warning">Entrada de Material</button>
      		<input type="hidden" id="nome_obra_actual" value="<?php echo $dados_obras[0]['nome_da_obra'] ?>">
      </div>

    <div id="myTabContent" class="tab-content" style="margin-top:4vh;">
     	
    </div> 

             
   <input type="hidden" id="id_obra" value="<?php echo $dados_obras[0]['id_obra']?>">
</form>
<script type="text/javascript">
	$(document).ready(function(){

		
		$("#myTabContent").html("");
		$("#myTabContent").append("<h1>Anotacões importantes</h1>");

		$('.dataTables-example').dataTable({
                responsive: true,
                /*"dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }*/
            });

		
		$("#folha_pagamento").on("click",function(){
			$("#myTabContent").html("");
			var id_obra=$("#id_obra").val();
			$.post("",{want:"drogaria",data:"folhas_pagamento","id_obra":id_obra},function(resp){				
              $("#myTabContent").html(resp);
            });

		});

		$("#anotacoes").on("click",function(){
			$("#myTabContent").html("");
			$("#myTabContent").append("<h1>Anotacões importantes</h1>");

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
