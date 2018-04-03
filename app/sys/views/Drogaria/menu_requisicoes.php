<?php
	$nome = $_SESSION['nome'];

?>


<form class="form-horizontal">
	
		
                    <div class="form-group" style="align:center"><button class="btn btn-outline btn-primary " type="button" id="registar_requisicoes"><i class="fa fa-home"></i> Registar</button></td>
                  	
                   
                    </div>
                    <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label" style="color:white;">Obra</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#" id="#"><span style="color:#1ab394;">Funcionais</span></a></li>
                            <li><a href="#"><span style="color:#1ab394;">Criar</span></a></li>
                        </ul>
                    </li>
               
             
   
</form>
<script type="text/javascript">
	$(document).ready(function(){



		$("#registar").on("click",function(){
			$("#area_results").html("");			
			$.post("",{want:"drogaria",data:"form_registo_stock"},function(resp){
				$("#area_results").html(resp);
			});
		});

		$(".dim").on("click",function(){
			//window.location.href=""; 
			var categoria = $(this).val();
			$.post("",{want:"drogaria",data:"stock_produto","categoria":categoria},function(resp){
				$("#area_results").html("");
				$("#area_results").html(resp);
			});			
		});

	



		
	});
</script>
