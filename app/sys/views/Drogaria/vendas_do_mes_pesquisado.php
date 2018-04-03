<?php
	$nome = $_SESSION['nome'];
	$tipo=$_SESSION['tipo'];
	$id_user=$_SESSION['id_user'];
	$username=$_SESSION['username'];

	$array_da_venda_do_mes=$_SESSION['array_venda_pesquisado'];
	$numero_dias_vendas=$_SESSION['dias_vendas_pesquisado'];

	
?>




    

<form class="form-horizontal">

	<div id="myTabContentVendas" class="tab-content" style="margin-top:4vh;">
    	
     		<?php
     			if($numero_dias_vendas==0){
     				?>
     					<h1>Não existe vendas para este mês</h1>
     				<?php
     			}else{
     				?>
   					<table class="table" style="width: 20vw; height:20vh; fonte-size:9; margin-left:20vw;" role="" aria-labelledby="" cellspacing="0" cellpadding="0" border="0">
				    	<thead>
				    		<tr tr class="" role="">
					    		<td>
					    			Dia
					    		</td>
					    		<td>
					    			Total Venda
					    		</td>
					    	</tr>
				    	</thead>
				    	<tbody>				    		
			    			<?php
			    				$total=0;
			    				for($contador=1;$contador<=count($array_da_venda_do_mes);$contador++){
			     					if($array_da_venda_do_mes[$contador][0]['total']==''){
			     						?>
			     						<tr>
				     						<td>
				     							<?php
				     								echo $contador;
				     							?>
				     						</td>
				     						<td>
				     							<?php
				     								echo '0$00';
				     							?>
				     						</td>
				     					</tr>
			     						<?php

			     					}else{
			     						?>
			     						<tr>
				     						<td>
				     							<?php
				     								echo $contador;
				     							?>
				     						</td>
				     						<td>
				     							<?php
				     							$total = $total+$array_da_venda_do_mes[$contador][0]['total'];
				     								echo $array_da_venda_do_mes[$contador][0]['total']."$00"
				     							?>
				     						</td>
				     					</tr>
			     						<?php
			     					}			     					
			     				}
			     				?>
			     					<tr style="background-color:green; color:white;">
			     						<td>total Mês</td>
			     						<td>
			     						<?php echo $total.'$00'?>
			     						</td>
			     					</tr>
			     					<?php
			     			}
			    		?>
				    	</tbody>
				    	
				    </table>
    </div>        
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
