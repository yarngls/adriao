<?php
	//$nome = $_SESSION['nome'];
	$dados_entradas= $_SESSION['dados_historico_entradas_produto'];	


?>




				

     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Stock Encontrada</th>
		            <th>Quantidade Entrada</th>
		            <th>Stock actualizado</th>           
		            <th>Fornecedor</th>
		            <th>data Entrada</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php
        		for($i=0;$i<count($dados_entradas);$i++){
                    //$total = $dados_rec[$i]['preco_venda'] * $dados_rec[$i]['quantidade'];
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $dados_entradas[$i]['stock_encontrada'] ?></td>
		            <td><?php echo $dados_entradas[$i]['quantidade_entrada'] ?></td>
		            <td><?php echo $dados_entradas[$i]['stock_actualizado'] ?></td>
		            <td><?php echo $dados_entradas[$i]['fornecedor'] ?></td>
		            <td><?php echo $dados_entradas[$i]['data'] ?></td>  
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
