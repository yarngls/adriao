<?php
	$id_produto_historico = $_SESSION['id_produto_historico'];
	$designacao_produto_historico=$_SESSION['designacao_produto_historico'];
	$referencia_produto_historico=$_SESSION['referencia_produto_historico'];
	//$dados_rec = $_SESSION['dados_stock'];	
	//var_dump($id_produto_historico);
	//echo $id_produto_historico;

?>


 


	
					
	
	<input type="hidden" id="id_produto" value="<?php echo $id_produto_historico ?>">
    <div class="form-group" style="align:center">   
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#" role="tab" id="vendas" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8">Venda</span></a></li>
      <li role="presentation" class=""><a href="#" role="tab" id="requisicoes" id_produto = "<?php echo $id_produto_historico ?>" data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Requisições.</span></a></li>
      <li role="presentation" class=""><a href="#" role="tab" id="entradas" id_produto = "<?php echo $id_produto_historico ?>" class="categoriaProduto"  data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Entradas</span></a></li>
      <li role="presentation" class=""><a href="#" role="tab" id="fornecedores" id_produto = "<?php echo $id_produto_historico ?>" class="categoriaProduto"  data-toggle="tab" aria-controls="profile" aria-expanded="false"><span style="color:#23C6C8">Fornecedores</span></a></li>
      
    </ul>
    <h3> <?php echo $designacao_produto_historico . " - " . $referencia_produto_historico; ?></h3>
    <div id="myTabContent" class="tab-content" style="margin-top:4vh;">
     		
    </div>
	      
	  </div>
	</div>
    

   
               
             
   
</form>
<script type="text/javascript">
	$(document).ready(function(){

		$('.dataTables-example').dataTable({
                responsive: true,
                /*"dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }*/
            });

			$("#myTabContent").html("");
			var id_produto = $("#id_produto").val();

			$.post("",{want:"drogaria",data:"historico_vendas_produto","id_produto":id_produto},function(resp){
				$("#myTabContent").html(resp);
			});

		$("#vendas").on("click",function(){
			$("#myTabContent").html("");
			var id_produto = $("#id_produto").val();

			$.post("",{want:"drogaria",data:"historico_vendas_produto","id_produto":id_produto},function(resp){
				$("#myTabContent").html(resp);
			});
		});

		$("body").on("click", "#entradas",function(){
			$("#myTabContent").html("");
			var id_produto = $(this).attr('id_produto');

			$.post("",{want:"drogaria",data:"historico_entradas_produto","id_produto":id_produto},function(resp){
				$("#myTabContent").html(resp);
			});
		});

		$("body").on("click", "#requisicoes",function(){
			$("#myTabContent").html("");
			var id_produto = $(this).attr('id_produto');
			$.post("",{want:"drogaria",data:"historico_requisicoes_drogaria","id_produto":id_produto},function(resp){
				$("#myTabContent").html(resp);
			});
		});


		$("body").on("click", "#fornecedores",function(){
			$("#myTabContent").html("");
			var id_produto = $(this).attr('id_produto');

			$.post("",{want:"drogaria",data:"historico_fornecedores_produto","id_produto":id_produto},function(resp){
				$("#myTabContent").html(resp);
			});
		});

		$("body").on("click", "#requisicoes",function(){
			$("#myTabContent").html("");
			var id_produto = $(this).attr('id_produto');

			/*$.post("",{want:"drogaria",data:"historico_fornecedores_produto","id_produto":id_produto},function(resp){
				$("#myTabContent").html(resp);
			});*/
		});
		
	});
</script>
