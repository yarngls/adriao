<?php
	//$nome = $_SESSION['nome'];
	$dados_fornecedores= $_SESSION['dados_historico_fornecedores_produto'];	


?>

		

     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Nome Fornecedor</th>
		            <th>Preço Fornecedor</th>           
		            <th>Quantidade Fornecida</th>
		            <th>data Entrada</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php
        		for($i=0;$i<count($dados_fornecedores);$i++){
                    //$total = $dados_rec[$i]['preco_venda'] * $dados_rec[$i]['quantidade'];
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $dados_fornecedores[$i]['nome_fornecedor'] ?></td>
		            <td><?php echo $dados_fornecedores[$i]['preco_fornecedor'] ?></td>
		            <td><?php echo $dados_fornecedores[$i]['quantidade_fornecida'] ?></td>
		            <td><?php echo $dados_fornecedores[$i]['data_entrada'] ?></td>
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
