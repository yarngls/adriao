<?php
	//$nome = $_SESSION['nome'];
		$dados_dividas_um_cliente = $_SESSION['dados_dividas_um_cliente'];	


?>
		<?php

			$total_dividas_um_cliente_drogaria=0;
            $total_dividas_um_cliente_drogaria_com_separador='';

            for($i=0;$i<count($dados_dividas_um_cliente);$i++){
                $total_dividas_um_cliente_drogaria = $total_dividas_um_cliente_drogaria+$dados_dividas_um_cliente[$i]['total_divida'];
            }
           	$total_dividas_um_cliente_drogaria_arredondado=ceil($total_dividas_um_cliente_drogaria);
            $array_um_cliente_drogaria_arredondado=str_split($total_dividas_um_cliente_drogaria_arredondado);
	        if(count( $array_um_cliente_drogaria_arredondado)<4){
	           $total_dividas_um_cliente_drogaria_com_separador=$total_dividas_um_cliente_drogaria_arredondado.'$00';
	        }elseif (count( $array_um_cliente_drogaria_arredondado)==4) {
	           $total_dividas_um_cliente_drogaria_com_separador=$array_um_cliente_drogaria_arredondado[0].'.'.$array_um_cliente_drogaria_arredondado[1].$array_um_cliente_drogaria_arredondado[2].$array_um_cliente_drogaria_arredondado[3].'$00';
	        }elseif (count( $array_um_cliente_drogaria_arredondado)==5) {
	           $total_dividas_um_cliente_drogaria_com_separador=$array_um_cliente_drogaria_arredondado[0].$array_um_cliente_drogaria_arredondado[1].'.'.$array_um_cliente_drogaria_arredondado[2].$array_um_cliente_drogaria_arredondado[3].$array_um_cliente_drogaria_arredondado[4].'$00';
	        }elseif (count( $array_um_cliente_drogaria_arredondado)==6) {
	           $total_dividas_um_cliente_drogaria_com_separador=$array_um_cliente_drogaria_arredondado[0].$array_um_cliente_drogaria_arredondado[1].$array_um_cliente_drogaria_arredondado[2].'.'.$array_um_cliente_drogaria_arredondado[3].$array_um_cliente_drogaria_arredondado[4].$array_um_cliente_drogaria_arredondado[5].'$00';
	        }elseif (count( $array_um_cliente_drogaria_arredondado)==7) {
	           $total_dividas_um_cliente_drogaria_com_separador=$array_um_cliente_drogaria_arredondado[0].'.'.$array_um_cliente_drogaria_arredondado[1].$array_um_cliente_drogaria_arredondado[2].$array_um_cliente_drogaria_arredondado[3].'.'.$array_um_cliente_drogaria_arredondado[4].$array_um_cliente_drogaria_arredondado[5].$array_um_cliente_drogaria_arredondado[6].'$00';
	        }else{
	           $total_dividas_um_cliente_drogaria_com_separador=$total_dividas_um_cliente_drogaria_arredondado.'$00';
	        }
        ?>

		

     
			    

        	<h3 style="margin-left:30vw; margin-botton:20vh;">Descrição da Dívida do Cliente: <?php echo $dados_dividas_um_cliente[0]['nome_devedor'] ?></h3>
     		<h3 style="margin-left:30vw; margin-botton:30vh;">Total da Divida: <?php echo $total_dividas_um_cliente_drogaria_com_separador ?></h3>
     	
     	<table class="table" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		           
		            <th>Designação</th>
		            <th>Referência</th>
		            <th>Quantidade</th>
		            <th>Preço</th>
		            <th>Total Divida</th>
		            <th>Data</th>
		            <th>Responsavel</th>
		            <th>Observação</th>
		            <th>+info</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		$total_dividas_cliente_drogaria_com_separador='';

        		for($i=0;$i<count($dados_dividas_um_cliente);$i++){

        			$total_dividas_cliente_drogaria_arredondado=ceil($dados_dividas_um_cliente[$i]['total_divida']);
	                $array_total_dividas_cliente_drogaria_arredondado=str_split($total_dividas_cliente_drogaria_arredondado);
                  	if(count( $array_total_dividas_cliente_drogaria_arredondado)<4){
                    	$total_dividas_cliente_drogaria_com_separador=$total_dividas_cliente_drogaria_arredondado.'$00';
                  	}elseif (count( $array_total_dividas_cliente_drogaria_arredondado)==4) {
                    	$total_dividas_cliente_drogaria_com_separador=$array_total_dividas_cliente_drogaria_arredondado[0].'.'.$array_total_dividas_cliente_drogaria_arredondado[1].$array_total_dividas_cliente_drogaria_arredondado[2].$array_total_dividas_cliente_drogaria_arredondado[3].'$00';
                  	}elseif (count( $array_total_dividas_cliente_drogaria_arredondado)==5) {
                    	$total_dividas_cliente_drogaria_com_separador=$array_total_dividas_cliente_drogaria_arredondado[0].$array_total_dividas_cliente_drogaria_arredondado[1].'.'.$array_total_dividas_cliente_drogaria_arredondado[2].$array_total_dividas_cliente_drogaria_arredondado[3].$array_total_dividas_cliente_drogaria_arredondado[4].'$00';
                  	}elseif (count( $array_total_dividas_cliente_drogaria_arredondado)==6) {
                    	$total_dividas_cliente_drogaria_com_separador=$array_total_dividas_cliente_drogaria_arredondado[0].$array_total_dividas_cliente_drogaria_arredondado[1].$array_total_dividas_cliente_drogaria_arredondado[2].'.'.$array_total_dividas_cliente_drogaria_arredondado[3].$array_total_dividas_cliente_drogaria_arredondado[4].$array_total_dividas_cliente_drogaria_arredondado[5].'$00';
                  	}elseif (count( $array_total_dividas_cliente_drogaria_arredondado)==7) {
                    	$total_dividas_cliente_drogaria_com_separador=$array_total_dividas_cliente_drogaria_arredondado[0].'.'.$array_total_dividas_cliente_drogaria_arredondado[1].$array_total_dividas_cliente_drogaria_arredondado[2].$array_total_dividas_cliente_drogaria_arredondado[3].'.'.$array_total_dividas_cliente_drogaria_arredondado[4].$array_total_dividas_cliente_drogaria_arredondado[5].$array_total_dividas_cliente_drogaria_arredondado[6].'$00';
                  	}else{
                    	$total_dividas_cliente_drogaria_com_separador=$total_dividas_cliente_drogaria_arredondado.'$00';
                  	}
                   
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $dados_dividas_um_cliente[$i]['designacao_produto'] ?></td>		            	            
		            <td><?php echo $dados_dividas_um_cliente[$i]['referencia_produto'] ?></td>		            	            
		            <td><?php echo $dados_dividas_um_cliente[$i]['quantidade_divida'] ?></td>		            	            
		            <td><?php echo $dados_dividas_um_cliente[$i]['preco_unitario'] ?></td>		            	            
		            <td><?php echo $total_dividas_cliente_drogaria_com_separador ?></td>	
		            <td><?php echo $dados_dividas_um_cliente[$i]['data_divida'] ?></td>		            	            
		            <td><?php echo $dados_dividas_um_cliente[$i]['responsavel_divida'] ?></td>		            	            
		            <td><?php echo $dados_dividas_um_cliente[$i]['observacao_divida'] ?></td>		            	            
		            <td><a href="#" class="efetuar_pagamento_devedor" id_devedor_pesquisada="<?php echo $dados_dividas_um_cliente[$i]['id_devedor'] ?>" id_divida_pesquisada="<?php echo $dados_dividas_um_cliente[$i]['id_dividas'] ?>" nome_devedor_pesquisada="<?php echo $dados_dividas_um_cliente[$i]['nome_devedor'] ?>" designacao_divida_pesquisada="<?php echo $dados_dividas_um_cliente[$i]['designacao_produto'] ?>" referencia_devedor_pesquisada="<?php echo $dados_dividas_um_cliente[$i]['referencia_produto'] ?>" quantidade_divida_pesquisada="<?php echo $dados_dividas_um_cliente[$i]['quantidade_divida'] ?>" preco_devedor_pesquisada="<?php echo $dados_dividas_um_cliente[$i]['preco_unitario'] ?>" total_divida_pesquisada="<?php echo $dados_dividas_um_cliente[$i]['total_divida'] ?>" id_produto_divida_pesquisada="<?php echo $dados_dividas_um_cliente[$i]['id_produto_divida'] ?>"><span><i class="fa fa-cc-visa"></i></span></a></td>		            	            
		            
		        		            
		            
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
