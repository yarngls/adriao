
<?php
	$nome_user=@$_SESSION['nome_user'];
	$dados_pagamento=$_SESSION['dados_pagamento'];
	$historico_pagamento=$_SESSION['historico_pagamento'];

	
?>
<form class="form-inline" style="width:80vw; margin-top:4vh; font-size:12">
	

		<table  class="area_pagamento" style="margin-top:4vw; margin-left:20vw; font-size:12">
		<tbody>
			<tr class="area_campos">
				<td> 

					<label class='control-label'>Nº do recibo</label>
				</td>
				<td> 
					<input type='text'  style="width:18vw; margin-left:6vw;" class="form-control input-sm" id="numero_recibo_pagamento" name='' placeholder=''>
				</td>			
			</tr>
			<tr class="area_campos">
				<td> 

					<label class='control-label' style="margin-top:2vw;">Nome Cliente</label>
				</td>
				<td> 
					<input type='text' readonly='readonly' value="<?php echo $dados_pagamento['nome_devedor_pesquisada'] ?>" style="width:18vw; margin-left:6vw;" class="form-control input-sm" id="nome_cliente_pagamento" name='' placeholder=''>
				</td>			
			</tr>			
			
					
			<tr class="area_campos">
				<td> 

					<label class='control-label' style="margin-top:2vw;">Montante Divida Inicial</label>
				</td>
				<td> 
					<input type='text' readonly='readonly' value="<?php echo $dados_pagamento['montante_divida_inicial'] ?>" class="form-control input-sm" style="margin-top:2vw; width:18vw; margin-left:6vw;" id='montante_em_divida_inicial' name='' placeholder=''>
				</td>			
			</tr>
			<tr class="area_campos">
				<td> 

					<label class='control-label' style="margin-top:2vw;">Montante da Divida Actual</label>
				</td>
				<td> 
					<input type='text' readonly='readonly' value="<?php echo $dados_pagamento['total_dividas_cliente_pesquisado_com_separador'] ?>" class="form-control input-sm" style="margin-top:2vw; width:18vw; margin-left:6vw;" id='montante_em_divida_pagamento' name='' placeholder=''>
					<input type="hidden" value="<?php echo $dados_pagamento['montante_divida_pesquisada']?>"id='montante_em_divida_pagamento_hidden'>
				</td>			
			</tr>

			<tr class="area_campos">
			    <td>
					<label style="margin-top:2vw;">Descrição da Divida:</label>
				</td>
				<td>
					<textarea id="descricao_da_divida_pagamento" readonly='readonly' style="margin-top:2vw; width:18vw; margin-left:6vw;" class='form-control' name="" rows="5" cols="29" style="height:6vw;"> <?php echo $dados_pagamento['designacao_divida_pesquisada'] ?> </textarea>
				</td>                                 
			</tr>

			<tr class="area_campos">
				<td> 

					<label class='control-label' style="margin-top:2vw;">Montante à Pagar</label>
				</td>
				<td> 
					<input type='number' class="form-control input-sm" style="margin-top:2vw; width:18vw; margin-left:6vw;" id='montante_a_pagar_pagamento' name='' placeholder=''>
				</td>			
			</tr>
			<tr>
				<td>
					<label class="control-label" id="tipo_pagamento" style="margin-top:2vw;">Tipo de Pagamento</label>
				</td>
				<td>
					<table style="margin-top:2vw; margin-left:6vw;">
						<tr>
							<td>
								<input type="radio" class="control-checkbox" name="tipo_contrato" id="a_vista" value="a_vista">
			  					à vista
							</td>
							
							<td>
								<input type="radio" name="tipo_contrato" style="margin-left:2vw;" id="banco" value="banco">
			  					Banco
							</td>
							<td id="outro_tipo_cliente"> 
								<!--<span><input style="margin-left: 3.5vw;" type='text' class='form-control' id='outro_cliente' name='outro_cliente' placeholder='outro'></span>-->
							</td>
						</tr>
						
					</table>				
				</td>
			</tr>
				

		</tbody>
		<tfoot>
			<tr class="area_campos">				
				<td style="margin-top:4vw;">
					<button type="button"  class="btn btn-w-m btn-default" style="margin-top:4vw;" id="">Cancelar</button>
				</td>
				<td>
					<button type="submit" style="margin-left:4vw; margin-top:4vw;" class="btn btn-w-m btn-info" id="guardar_pagamento_normal">guardar</button>
				</td>
				<td>				
					<input type="hidden" id="nome_user" value="<?php echo $nome_user?>">
					<input type="hidden" id="dividas_carregada" value="<?php echo $nome_user?>">
					<input type="hidden" id="id_devedor_pesquisada" value="<?php echo $dados_pagamento['id_devedor_pesquisada']?>">
					<input type="hidden" id="id_divida_pesquisada" value="<?php echo $dados_pagamento['id_divida_pesquisada']?>">
				</td>								
			</tr>
		</tfoot>

	</table>
	<table id="histotico_pag">
		<tr>
		 	<td>
				<label style="margin-left:0.5vw; color:red; font-size:12; margin-top:6vh;">Divida Inicial: <?php echo $dados_pagamento['montante_divida_inicial'].'$00'?></label>
			</td>					
		</tr>
		<tr>
			<td>
				<label style="margin-left:10vw; color:green; font-size:12; ">Historico do Pagamento:</label>
				
			</td>	
		</tr>
		<tr>
			<td>
				<div id="pagamentos_antes">
					<table class='table' style="font-size:12">
						<thead>
							<tr>
								<td>Nº Recibo</td>
								<td>Montante</td>
								<td>Tipo Pagamento</td>
								<td>Nº Doc. Banco</td>
								<td>Data Pagamento</td>
							</tr>
						</thead>
						<?php
					
							
							for($i=0;$i<count($historico_pagamento);$i++){							
								
							echo "<tr>
									<td>".$historico_pagamento[$i]['numero_recibo_pagamento']."</td>
									<td>".$historico_pagamento[$i]['montante_a_pagar_pagamento'].'$00'."</td>
									<td>".$historico_pagamento[$i]['tipo_pagamento']."</td>
									<td>".$historico_pagamento[$i]['numero_doc_banco']."</td>
									<td>".$historico_pagamento[$i]['data_pagamento']."</td>
									
								 </tr>";	
						
									  
								
							}
						

						?>

					</table>
					<label style="margin-left:0.5vw; color:red; font-size:12; margin-top:0;">Montante ainda por pagar: <?php echo $dados_pagamento['total_dividas_cliente_pesquisado_com_separador']?></label>
				</div>
				<!---<textarea id="pagamentos_antes" class='form-control' name="" rows="5" cols="50" style="height:6vw;"> </textarea>-->
			</td> 			
		</tr>
		<input type='hidden' id='cond_ordem_pagamento'>
	</table>
	
		
</form>
<script type="text/javascript" language="javascript">

	$(document).ready(function(){



		var tipo_pagamento="";
		
		   
		$("#banco").on("click",function(){

			var numero_doc_banco="";
			tipo_pagamento='banco';
			var campo= "<span>"+"<input style='margin-left: 3.5vw;' type='text' class='form-control' id='numero_doc_banco' name='numero_doc_banco' placeholder='nº documento'>"+"</span>";
			$("#outro_tipo_cliente").html(campo);
			$("#outro_cliente").change(function(){
				numero_doc_banco=$(this).val();
			});
		});

		$("#a_vista").on("click",function(){
			$("#numero_doc_banco").remove();
			tipo_pagamento='a_vista';
		});	


		var listaMeses=[{ind:"01",mes:"Janeiro"},{ind:"02",mes:"Fevereiro"},{ind:"03",mes:"Março"},{ind:"04",mes:"Abril"},
								{ind:"05",mes:"Maio"},{ind:"06",mes:"Junho"},{ind:"07",mes:"Julho"},{ind:"08",mes:"Agosto"},
								{ind:"09",mes:"Setembro"},{ind:"10",mes:"Outubro"},{ind:"11",mes:"Novembro"},{ind:"12",mes:"Dezembro"}];

		function funcMes(mes){
		    for(var i=0;i<listaMeses.length;i++){
				if(mes==listaMeses[i].mes){
				    return listaMeses[i].ind;
				}
			}
		}

		function funcMes2(ind){
		    for(var i=0;i<listaMeses.length;i++){
				if(ind==listaMeses[i].ind){
				    return listaMeses[i].mes;
				}
			}
		}

		

		$("#montante_pagar").on("keyup",function(){
			var por_pagar=parseInt($("#por_pagar").val());
			var inserida=parseInt($("#montante_pagar").val())
			var mes=$("#mes_referencia").val();
			var ano_referencia=$("#ano_referencia").val();
			if(mes=="opcao"){
           		alertify.alert(" Escolhe o mes à pagar.");
				$("#montante_pagar").val("");
			}else if(ano_referencia=="opcao"){
				alertify.alert(" Escolhe o ano do pagamento.");
				$("#montante_pagar").val("");
			}else if(inserida>por_pagar){
				$("#montante_pagar").val(por_pagar);
	           	alertify.alert(" Valor inserido " + inserida + " é superior ao valar por pagar.");
			}
		});


		function verificarNumeroRecibo(numeroRecibo){
			$.post("",{want:"dividas",data:"verificarNumeroRecibo","numeroRecibo":numeroRecibo},function(resposta){
				var res=JSON.parse(resposta);
				
				if(res['valor']>0){
					$("#condOrdem_pagamento").val("true");
				}else{
					$("#condOrdem_pagamento").val("false");
				}
			});
		}


		$("#ordem_pagamento").on('keyup',function(){
			var ordem_pagamentoUp=$(this).val();
			setTimeout(function(){
				//alert('ola');
				verificarNumeroRecibo(ordem_pagamentoUp);
				
			},200);
		});

		$("#guardar_pagamento_normal").on("click",function(){

			var numero_doc_banco = $("#numero_doc_banco").val();
			var numero_recibo_pagamento=$("#numero_recibo_pagamento").val();	
			var nome_cliente_pagamento=$("#nome_cliente_pagamento").val();	
			var montante_em_divida_pagamento=$("#montante_em_divida_pagamento").val();	
			var descricao_da_divida_pagamento=$("#descricao_da_divida_pagamento").val();	
			var montante_a_pagar_pagamento=$("#montante_a_pagar_pagamento").val();
			var montante_em_divida=$("#montante_em_divida_pagamento_hidden").val();
			
			var id_devedor_pesquisada = $("#id_devedor_pesquisada").val();
			var id_divida_pesquisada = $("#id_divida_pesquisada").val();
			
			
			var nome_user=$("#nome_user").val();	
			
			if(numero_recibo_pagamento==""){
	           	alertify.error(" Insire o numero do recibo.");				   
			}else if(nome_cliente_pagamento==" "){				
	           	alertify.error("Insira o nome do cliente");				   
			}else if(montante_em_divida_pagamento==""){
				alertify.error(" Insira o montante em divida.");    				
			}else if(descricao_da_divida_pagamento==""){
				alertify.error(" Insira a discrição da divida."); 
				
			}else if(montante_a_pagar_pagamento==''){
				alertify.error(" Insira o montante a pagar.");	
			}else if(tipo_pagamento==''){ 
				alertify.error(" Escolhe o tipo de pagamento.");
			}else if(tipo_pagamento=='banco' && numero_doc_banco==''){
				alertify.error(" Insira o numero do documento bancario.");
				
			}else if(parseInt(montante_em_divida)<parseInt(montante_a_pagar_pagamento) || montante_a_pagar_pagamento<0){
				alertify.error(" Valor do montante a pagar é superior a divida ou é negativo.");
			}else{
				
	        	dados_pagamento={
				 "numero_recibo_pagamento":numero_recibo_pagamento,
				 "nome_cliente_pagamento":nome_cliente_pagamento,
				 "montante_em_divida":montante_em_divida,
				 "descricao_da_divida_pagamento":descricao_da_divida_pagamento,
				 "montante_a_pagar_pagamento":montante_a_pagar_pagamento,
				 "tipo_pagamento":tipo_pagamento,
				 "numero_doc_banco":numero_doc_banco,
				 "id_devedor_pesquisada":id_devedor_pesquisada,
				 "id_divida_pesquisada":id_divida_pesquisada,
				 "nome_user":nome_user
				
				}

				$.post("",{want:"construcoes_adriao",data:"ordem_pagamento","dados_pagamento":dados_pagamento},function(resp){
					alertify.alert(resp);
					$("#myModal_descricao_Dividas_devedor-body").html("");
					var dados={"id_devedor":id_devedor_pesquisada,"nome_devedor":nome_cliente_pagamento};			
					$.post("",{want:"construcoes_adriao",data:"dividas_do_cliente","dados":dados},function(resp){			
						$("#myModal_descricao_Dividas_devedor-body").html(resp);
					});

				});
			}
			return false;
		});


		



	});	
</script>