<?php
	//$nome = $_SESSION['nome'];
	$dados_vendas= $_SESSION['historico_vendas_produto'];	


?>




				

     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Nome Clientssse</th>
		            <th>Designação</th>
		            <th>Refencia</th>           
		            <th>Preço Venda</th>
		            <th>Quantidade Comprada</th>
		            <th>Total Pago</th>
		            <th>Data de Venda</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php
        		for($i=0;$i<count($dados_vendas);$i++){
                    //$total = $dados_rec[$i]['preco_venda'] * $dados_rec[$i]['quantidade'];
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $dados_vendas[$i]['nome_cliente'] ?></td>
		            <td><?php echo $dados_vendas[$i]['designacao_produto'] ?></td>
		            <td><?php echo $dados_vendas[$i]['referencia_produto'] ?></td>
		            <td><?php echo $dados_vendas[$i]['preco_unitario'] ?></td>
		            <td><?php echo $dados_vendas[$i]['quantidade_a_comprar'] ?></td>  
		            <td><?php echo $dados_vendas[$i]['total_a_pagar'] ?></td>  
		            <td><?php echo $dados_vendas[$i]['data_venda'] ?></td>  
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
