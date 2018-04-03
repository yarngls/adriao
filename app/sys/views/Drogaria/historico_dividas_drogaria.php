<?php
	//$nome = $_SESSION['nome'];
		$historico_dividas_pesquisada = $_SESSION['historico_dividas_pesquisada'];	


?>


		

     
			    

        	
     	<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
	        <thead>
		        <tr>
		            <th>Nome Devedor</th>
		            <th>Total Divida</th>
		            <th>+info</th>
	        	</tr>
	        </thead>
	         <tbody>
        
       
        	<?php

        		
        		for($i=0;$i<count($historico_dividas_pesquisada);$i++){
                   
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $historico_dividas_pesquisada[$i]['nome_devedor'] ?></td>
		            <td><?php echo $historico_dividas_pesquisada[$i]['responsavel_divida'] ?></td>		            	            
		            <td><a href="#" class="info_devedor_pesquisada" id_devedor_pesquisada="<?php echo $historico_dividas_pesquisada[$i]['id_devedor'] ?>"><span><i class="fa fa-bars"></i></span></a></td>		            	            
		            
		        		            
		            
		        </tr>
		    <?php
            	}
            ?>                
	         
        </tbody>                 
        </table>
   
<script type="text/javascript">
	$(document).ready(function(){

		$(".info_devedor_pesquisada").on("click",function(){			
			
			var id_devedor_pesquisada=$(this).attr("id_devedor_pesquisada");
			alert(id_devedor_pesquisada);
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
