<?php
	//$nome = $_SESSION['nome'];
	$historico_maquina = $_SESSION['dados_pagamento_maquina'];	


?>

	<?php

		$total_diaria=0;
		for($i=0;$i<count($historico_maquina);$i++){
            $total_diaria = $total_diaria + $historico_maquina[$i]['total_pagar'];
        }
	?>

	<h3 style="margin-left:30vw;"> Total da Receita:  <?php echo  $total_diaria ?>$00</h3>

				
		
     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Nome Cliente</th>
		            <th>Preço por minuto</th>
		            <th>Total minuto</th>
		            <th>Total a pagar</th>
		            <th>Observacao</th>           
		            <th>data_pagamento</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		
        		for($i=0;$i<count($historico_maquina);$i++){
                   
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $historico_maquina[$i]['nome_cliente'] ?></td>
		            <td><?php echo $historico_maquina[$i]['preco_minuto'] ?></td>
		            <td><?php echo $historico_maquina[$i]['total_minuto'] ?></td>
		            <td><?php echo $historico_maquina[$i]['total_pagar'] ?></td>		            
		            <td><?php echo $historico_maquina[$i]['observacao'] ?></td>		            
		            <td><?php echo $historico_maquina[$i]['data_pagamento'] ?></td> 
		        </tr>
		    <?php
            	}
            ?>                
	         
        </tbody>                 
        </table>

  
               
             
   
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


		
	});
</script>
