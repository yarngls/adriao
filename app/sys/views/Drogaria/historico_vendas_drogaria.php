<?php
	//$nome = $_SESSION['nome'];
		$historico_vendas = $_SESSION['historico_vendas'];	


?>


		
		<?php

    		$total_diaria=0;
    		for($i=0;$i<count($historico_vendas);$i++){
                $total_diaria = $total_diaria + $historico_vendas[$i]['total_a_pagar'];
            }
    	?>
     
		<h3 style="margin-left:30vw;"> Total da Venda:  <?php echo  $total_diaria ?>$00</h3>	    

        	
     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Nome Cliente</th>
		            <th>Designação</th>
		            <th>Referencia</th>
		            <th>Preço Venda</th>
		            <th>Quantidade Comprada</th>           
		            <th>Total Pago</th>
		            <th>Data Venda</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		
        		for($i=0;$i<count($historico_vendas);$i++){
                   
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $historico_vendas[$i]['nome_cliente'] ?></td>
		            <td><?php echo $historico_vendas[$i]['designacao_produto'] ?></td>
		            <td><?php echo $historico_vendas[$i]['referencia_produto'] ?></td>
		            <td><?php echo $historico_vendas[$i]['preco_unitario'] ?></td>		            
		            <td><?php echo $historico_vendas[$i]['quantidade_a_comprar'] ?></td>		            
		            <td><?php echo $historico_vendas[$i]['total_a_pagar'] ?></td>		            
		            <td><?php echo $historico_vendas[$i]['data_venda'] ?></td>		            
		            
		        </tr>
		    <?php
            	}
            ?>                
	         
        </tbody>                 
        </table>
   
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
