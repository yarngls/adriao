<?php
	//$nome = $_SESSION['nome'];
		$dividas_um_cliente_construcoes = $_SESSION['dividas_um_cliente_construcoes'];	


?>


		<?php

			$total_dividas_um_cliente=0;
            $total_dividas_um_cliente_com_separador='';
            for($i=0;$i<count($dividas_um_cliente_construcoes);$i++){
                $total_dividas_um_cliente = $total_dividas_um_cliente+$dividas_um_cliente_construcoes[$i]['montante_divida'];
            }
           	$total_dividas_um_cliente_arredondado=ceil($total_dividas_um_cliente);
            $array_dividas_um_cliente_arredondado=str_split($total_dividas_um_cliente_arredondado);
	        if(count( $array_dividas_um_cliente_arredondado)<4){
	           $total_dividas_um_cliente_com_separador=$dividas_um_cliente_construcoes[$i]['montante_divida'].'$00';
	        }elseif (count( $array_dividas_um_cliente_arredondado)==4) {
	           $total_dividas_um_cliente_com_separador=$array_dividas_um_cliente_arredondado[0].'.'.$array_dividas_um_cliente_arredondado[1].$array_dividas_um_cliente_arredondado[2].$array_dividas_um_cliente_arredondado[3].'$00';
	        }elseif (count( $array_dividas_um_cliente_arredondado)==5) {
	           $total_dividas_um_cliente_com_separador=$array_dividas_um_cliente_arredondado[0].$array_dividas_um_cliente_arredondado[1].'.'.$array_dividas_um_cliente_arredondado[2].$array_dividas_um_cliente_arredondado[3].$array_dividas_um_cliente_arredondado[4].'$00';
	        }elseif (count( $array_dividas_um_cliente_arredondado)==6) {
	           $total_dividas_um_cliente_com_separador=$array_dividas_um_cliente_arredondado[0].$array_dividas_um_cliente_arredondado[1].$array_dividas_um_cliente_arredondado[2].'.'.$array_dividas_um_cliente_arredondado[3].$array_dividas_um_cliente_arredondado[4].$array_dividas_um_cliente_arredondado[5].'$00';
	        }elseif (count( $array_dividas_um_cliente_arredondado)==7) {
	           $total_dividas_um_cliente_com_separador=$array_dividas_um_cliente_arredondado[0].'.'.$array_dividas_um_cliente_arredondado[1].$array_dividas_um_cliente_arredondado[2].$array_dividas_um_cliente_arredondado[3].'.'.$array_dividas_um_cliente_arredondado[4].$array_dividas_um_cliente_arredondado[5].$array_dividas_um_cliente_arredondado[6].'$00';
	        }else{
	           $total_dividas_um_cliente_com_separador=$total_dividas_um_cliente.'$00';
	        }
        ?>

     
			    

        	<h3 style="margin-left:30vw; margin-botton:15vh;">Descrição da Dívida do Cliente: <?php echo $dividas_um_cliente_construcoes[0]['nome_devedor'] ?></h3>
        	<h3 style="margin-left:30vw; margin-botton:30vh;">Total Divida: <?php echo $total_dividas_um_cliente_com_separador ?></h3>
     	<table class="table" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		           
		            <th>Descrição da Divida</th>
		            <th>Montante</th>
		            <th>Responsavel</th>
		            <th>Observação</th>
		            <th>Pagar</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		
        		$total_dividas_cliente_pesquisado_com_separador='';

        		for($i=0;$i<count($dividas_um_cliente_construcoes);$i++){

                   $total_dividas_cliente_pesquisado_arredondado=ceil($dividas_um_cliente_construcoes[$i]['montante_divida']);
	                $array_total_dividas_cliente_pesquisado_arredondado=str_split($total_dividas_cliente_pesquisado_arredondado);
                  	if(count( $array_total_dividas_cliente_pesquisado_arredondado)<4){
                    	$total_dividas_cliente_pesquisado_com_separador=$dividas_um_cliente_construcoes[$i]['montante_divida'].'$00';
                  	}elseif (count( $array_total_dividas_cliente_pesquisado_arredondado)==4) {
                    	$total_dividas_cliente_pesquisado_com_separador=$array_total_dividas_cliente_pesquisado_arredondado[0].'.'.$array_total_dividas_cliente_pesquisado_arredondado[1].$array_total_dividas_cliente_pesquisado_arredondado[2].$array_total_dividas_cliente_pesquisado_arredondado[3].'$00';
                  	}elseif (count( $array_total_dividas_cliente_pesquisado_arredondado)==5) {
                    	$total_dividas_cliente_pesquisado_com_separador=$array_total_dividas_cliente_pesquisado_arredondado[0].$array_total_dividas_cliente_pesquisado_arredondado[1].'.'.$array_total_dividas_cliente_pesquisado_arredondado[2].$array_total_dividas_cliente_pesquisado_arredondado[3].$array_total_dividas_cliente_pesquisado_arredondado[4].'$00';
                  	}elseif (count( $array_total_dividas_cliente_pesquisado_arredondado)==6) {
                    	$total_dividas_cliente_pesquisado_com_separador=$array_total_dividas_cliente_pesquisado_arredondado[0].$array_total_dividas_cliente_pesquisado_arredondado[1].$array_total_dividas_cliente_pesquisado_arredondado[2].'.'.$array_total_dividas_cliente_pesquisado_arredondado[3].$array_total_dividas_cliente_pesquisado_arredondado[4].$array_total_dividas_cliente_pesquisado_arredondado[5].'$00';
                  	}elseif (count( $array_total_dividas_cliente_pesquisado_arredondado)==7) {
                    	$total_dividas_cliente_pesquisado_com_separador=$array_total_dividas_cliente_pesquisado_arredondado[0].'.'.$array_total_dividas_cliente_pesquisado_arredondado[1].$array_total_dividas_cliente_pesquisado_arredondado[2].$array_total_dividas_cliente_pesquisado_arredondado[3].'.'.$array_total_dividas_cliente_pesquisado_arredondado[4].$array_total_dividas_cliente_pesquisado_arredondado[5].$array_total_dividas_cliente_pesquisado_arredondado[6].'$00';
                  	}else{
                    	$total_dividas_cliente_pesquisado_com_separador=$dividas_um_cliente_construcoes[$i]['montante_divida'].'$00';
                  	}
        	?>
        		 <tr class="gradeC">		            	            
		            <td><?php echo $dividas_um_cliente_construcoes[$i]['descricao_divida'] ?></td>		            	            
		            <td><?php echo $total_dividas_cliente_pesquisado_com_separador?></td>
		            <input type="hidden" id='total_dividas_cliente_pesquisado_com_separador' value="<?php echo $total_dividas_cliente_pesquisado_com_separador ?>">		            	            
		            <td><?php echo $dividas_um_cliente_construcoes[$i]['responsavel_divida'] ?></td>		            	            
		            <td><?php echo $dividas_um_cliente_construcoes[$i]['observacao_divida'] ?></td>		            	            
		            <td><a href="#" class="efetuar_pagamento_devedor_construcao" id_devedor_pesquisada="<?php echo $dividas_um_cliente_construcoes[$i]['id_devedor'] ?>" id_divida_pesquisada="<?php echo $dividas_um_cliente_construcoes[$i]['id_dividas'] ?>" nome_devedor_pesquisada="<?php echo $dividas_um_cliente_construcoes[$i]['nome_devedor'] ?>" designacao_divida_pesquisada="<?php echo $dividas_um_cliente_construcoes[$i]['descricao_divida'] ?>" montante_divida_pesquisada="<?php echo $dividas_um_cliente_construcoes[$i]['montante_divida'] ?>" montante_divida_inicial="<?php echo $dividas_um_cliente_construcoes[$i]['divida_inicial'] ?>"<span><i class="fa fa-cc-visa"></i></span></a></td>		            	            
		            
		        		            
		            
		        </tr>
		    <?php
            	}
            ?>                
	         
        </tbody>                 
        </table>
   
<script type="text/javascript">
	$(document).ready(function(){

		$(".efetuar_pagamento_devedor_construcao").on("click",function(){			
			
			var id_devedor_pesquisada=$(this).attr("id_devedor_pesquisada");
			var id_divida_pesquisada=$(this).attr("id_divida_pesquisada");
			var nome_devedor_pesquisada=$(this).attr("nome_devedor_pesquisada");
			var designacao_divida_pesquisada=$(this).attr("designacao_divida_pesquisada");
			var montante_divida_pesquisada=$(this).attr("montante_divida_pesquisada");
			var montante_divida_inicial=$(this).attr("montante_divida_inicial");
			var total_dividas_cliente_pesquisado_com_separador=$("#total_dividas_cliente_pesquisado_com_separador").val();
			
			var dados={"id_devedor_pesquisada":id_devedor_pesquisada,
							"id_divida_pesquisada":id_divida_pesquisada,
							"nome_devedor_pesquisada":nome_devedor_pesquisada,
							"designacao_divida_pesquisada":designacao_divida_pesquisada,
							"montante_divida_pesquisada":montante_divida_pesquisada,
							"montante_divida_inicial":montante_divida_inicial,
							"total_dividas_cliente_pesquisado_com_separador":total_dividas_cliente_pesquisado_com_separador
						};	

			$.post("",{want:"construcoes_adriao",data:"efetuar_pagamento_devedor_construcao","dados":dados},function(resp){
				$("#myModal_descricao_Dividas_devedor-body").html("");
				$("#myModal_descricao_Dividas_devedor-body").html("<img src='img/ajax-loader.gif'>");
				setTimeout(function(){					
					$("#myModal_descricao_Dividas_devedor-body").html(resp);
				},1000);


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
