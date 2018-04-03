<?php
	$nome = $_SESSION['nome'];
	$tipo=$_SESSION['tipo'];
	$id_user=$_SESSION['id_user'];
	$username=$_SESSION['username'];


	$data_da_venda_carregada=$_SESSION['mes_ano_pagamento_maquina_actual']; 
	$array_da_venda_do_mes=$_SESSION['array_pagamento_maquina_mes_actual'];
	$numero_dias_vendas=$_SESSION['dias_pagamento'] = $num_rows;

	


	$data_recebida = explode("-", $data_da_venda_carregada);
	$mes_certo_recebida = $data_recebida[1];
	$ano_certo_recebida = $data_recebida[0];
?>




    

<form class="form-horizontal">

	
    <div id="myTabContentPagamento" class="tab-content" style="margin-top:4vh;">
    	
     		<?php
     			if($numero_dias_vendas==0){
     				?>
     					<h1>Não registo de pagamento de maquina carpintaria</h1>
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

             
   <input type="hidden" id="id_obra_actual" value="<?php echo $id_obra_actual?>">
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
