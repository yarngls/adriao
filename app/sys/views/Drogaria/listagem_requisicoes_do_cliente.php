<?php
	//$nome = $_SESSION['nome'];
		$history_requisicoes_cliente = $_SESSION['history_requisicoes_cliente'];	


?>


		

     
			    

        	<h3 style="margin-left:30vw; margin-botton:20vh;">Descrição da Requisição do Cliente: <?php echo $history_requisicoes_cliente[0]['destino_produto'] ?></h3>
     	<table class="table" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		           
		            <th>Designação</th>
		            <th>Referência</th>
		            <th>Quantidade</th>
		            <th>Categoria</th>
		            <th>Data</th>
		            <th>Responsavel</th>
		            <th>Observação</th>
		            <th>+info</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		
        		for($i=0;$i<count($history_requisicoes_cliente);$i++){
                   
        	?>
        		<tr class="gradeC">
		            <td><?php echo $history_requisicoes_cliente[$i]['designacao_produto'] ?></td>		            	            
		            <td><?php echo $history_requisicoes_cliente[$i]['referencia_produto'] ?></td>		            	            
		            <td><?php echo $history_requisicoes_cliente[$i]['quantidade_produto'] ?></td>	            	            
		            <td><?php echo $history_requisicoes_cliente[$i]['categoria'] ?></td>		            	            
		            <td><?php echo $history_requisicoes_cliente[$i]['data'] ?></td>		            	            
		            <td><?php echo $history_requisicoes_cliente[$i]['responsavel'] ?></td>		            	            
		            <td><?php echo $history_requisicoes_cliente[$i]['observacao'] ?></td>		            	            
		            <td><a href="#" class="efetuar_pagamento_devedor" id_devedor_pesquisada="" id_divida_pesquisada="" nome_devedor_pesquisada="" designacao_divida_pesquisada="" referencia_devedor_pesquisada="" quantidade_divida_pesquisada="" preco_devedor_pesquisada="" total_divida_pesquisada="" id_produto_divida_pesquisada=""><span><i class="fa fa-cc-visa"></i></span></a></td>		            	            
		        </tr>
		    <?php
            	}
            ?>                
	         
        </tbody>                 
        </table>
   
<script type="text/javascript">
	$(document).ready(function(){

		$(".efetuar_pagamento_devedor").on("click",function(){			
			
			var id_devedor_pesquisada=$(this).attr("id_devedor_pesquisada");
			var id_divida_pesquisada=$(this).attr("id_divida_pesquisada");
			var nome_devedor_pesquisada=$(this).attr("nome_devedor_pesquisada");
			var designacao_divida_pesquisada=$(this).attr("designacao_divida_pesquisada");
			var referencia_devedor_pesquisada=$(this).attr("referencia_devedor_pesquisada");
			var quantidade_divida_pesquisada=$(this).attr("quantidade_divida_pesquisada");
			var preco_devedor_pesquisada=$(this).attr("preco_devedor_pesquisada");
			var total_divida_pesquisada=$(this).attr("total_divida_pesquisada");
			var id_produto_divida_pesquisada=$(this).attr("id_produto_divida_pesquisada");

			var dados={"id_devedor_pesquisada":id_devedor_pesquisada,
							"id_divida_pesquisada":id_divida_pesquisada,
							"nome_devedor_pesquisada":nome_devedor_pesquisada,
							"designacao_divida_pesquisada":designacao_divida_pesquisada,
							"referencia_devedor_pesquisada":referencia_devedor_pesquisada,
							"quantidade_divida_pesquisada":quantidade_divida_pesquisada,
							"preco_devedor_pesquisada":preco_devedor_pesquisada,
							"total_divida_pesquisada":total_divida_pesquisada,
							"id_produto_divida_pesquisada":id_produto_divida_pesquisada
						  };		
			$.post("",{want:"drogaria",data:"efetuar_pagamento_devedor","dados":dados},function(resp){
				alert(resp);
			});
		});
		
		

		$('.dataTables-example').dataTable({
                responsive: true,
                /*"dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }*/
            });


		
	});
</script>
