<?php
	//$nome = $_SESSION['nome'];
		$historico_requisicoes = $_SESSION['historico_requisicoes'];	


?>


		

     
			    

        	
     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Destino</th>
		            <th>Designação</th>
		            <th>Referencia</th>
		            <th>Quantidade</th> 
		            <th>Responsavel</th>
		            <th>Observação</th>
		            <th>Data</th>
		            <th>+INFO</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		
        		for($i=0;$i<count($historico_requisicoes);$i++){
                   
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $historico_requisicoes[$i]['destino_produto'] ?></td>		            
		            <td><?php echo $historico_requisicoes[$i]['designacao_produto'] ?></td>
		            <td><?php echo $historico_requisicoes[$i]['referencia_produto'] ?></td>
		            <td><?php echo $historico_requisicoes[$i]['quantidade_produto'] ?></td>        
		            <td><?php echo $historico_requisicoes[$i]['responsavel'] ?></td>		            
		            <td><?php echo $historico_requisicoes[$i]['observacao'] ?></td>		            
		            <td><?php echo $historico_requisicoes[$i]['data'] ?></td>		            
		            <td><span>...</span></td>		            
		            
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
