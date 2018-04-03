<?php
	$nome = $_SESSION['nome'];
	$tipo=$_SESSION['tipo'];
	$id_user=$_SESSION['id_user'];
	$username=$_SESSION['username'];
	$informacoes_folhas_pequisada=$_SESSION['informacoes_folhas_pequisada'];
	$id_obra=$_SESSION['id_obra_actual'];
?>




    

<form class="form-horizontal">

	

    <div class="form-group" style="align:center" id="area_para_folhas">   
	    <ul id="myTab" class="nav nav-tabs" role="tablist">
	      <?php
	      	   for($i=0;$i<count($informacoes_folhas_pequisada);$i++){

	      	   	$array_data_inicio = explode("-",$informacoes_folhas_pequisada[$i]['inicio_folha']);
      	   		$data_inico_certo = $array_data_inicio[2] . "-" .  $array_data_inicio[1] . "-" . $array_data_inicio[0];

      	   		$array_data_fim = explode("-",$informacoes_folhas_pequisada[$i]['fim_folha']);
      	   		$data_fim_certo = $array_data_fim[2] . "-" .  $array_data_fim[1] . "-" . $array_data_fim[0];
	      	   
	      	   	?>
	      	   		<li role="presentation" class="caregar_folha_pesuisada" id_folha_pesquisada='<?php echo $informacoes_folhas_pequisada[$i]['id_folha']?>' id_obra_pesquisada='<?php echo $informacoes_folhas_pequisada[$i]['id_obra']?>'><a href="#" id="" class="" categoria="#" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8"><?php echo $data_inico_certo . " a " . $data_fim_certo ?></span></a></li>
	      	   	<?php
	      	   }
	      ?>	      
	    </ul>.
    <div id="myTabContentFolhaCarregada" class="tab-content" style="margin-top:4vh;">
     	
    </div> 

             
   <input type="hidden" id="id_obra_actual" value="<?php echo $id_obra_actual?>">
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

	$(".caregar_folha_pesuisada").on("click",function(){
			$("#myTabContentFolha").html("");
			var id_folha_pesquisada = $(this).attr("id_folha_pesquisada");
			var id_obra_pesquisada = $(this).attr("id_obra_pesquisada");
			$.post("",{want:"drogaria",data:"caregar_folha_pagamento","id_folha_caregar":id_folha_pesquisada,"id_obra_caregar":id_obra_pesquisada},function(resp){
				$("#myTabContentFolhaCarregada").html(resp);
			});
			//alert(id_folha_pesquisada);
		});

		
	});
</script>
