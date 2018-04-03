<?php
	//$nome = $_SESSION['nome'];
	$array_divida_acumulada = $_SESSION['array_divida_acumulada'];	
	//var_dump($array_divida_acumulada);

?>




    

<form class="form-horizontal">
	
					
	

    <div class="form-group" style="align:center">
    <button class="btn btn-outline btn-primary " style="margin-left:70vw;" type="button" data-toggle="modal" data-target="#myModal_Dividas" id="registar_nova_divida"><i class="fa fa-check"></i>Nova Divida</button>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#" id="divida_diaria" class="" categoria="#" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8"> Divida Diaria</span></a></li>
      <li role="presentation" class=""><a href="#" id="divida_mensal" class=""  role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8">Divida Mensal</span></a></li>
      <li role="presentation" class=""><a href="#" id="divida_total" class=""  role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8">Divida Total</span></a></li>
      
    </ul>
    <div class="form-group"  id="area_pesquisa" style="margin-left:0.2vw;">
    <table>
				<tbody>
					<tr>
						<td>
							<select class="form-control" id="dia_divida">
							  <option>01</option>
							  <option>02</option>
							  <option>03</option>
							  <option>04</option>
							  <option>05</option>
							  <option>06</option>
							  <option>07</option>
							  <option>08</option>
							  <option>09</option>
							  <option>10</option>
							  <option>11</option>
							  <option>12</option>
							  <option>13</option>
							  <option>14</option>
							  <option>15</option>
							  <option>16</option>
							  <option>17</option>
							  <option>18</option>
							  <option>19</option>
							  <option>20</option>
							  <option>21</option>
							  <option>22</option>
							  <option>23</option>
							  <option>24</option>
							  <option>25</option>
							  <option>26</option>
							  <option>27</option>
							  <option>28</option>
							  <option>29</option>
							  <option>30</option>
							  <option>31</option>
							</select>
						</td>
						<td>
							<select class="form-control" id="mes_divida">
							  <option>Janeiro</option>
							  <option>Fevereiro</option>
							  <option>Março</option>
							  <option>Abril</option>
							  <option>Maio</option>
							  <option>Junho</option>
							  <option>Julho</option>
							  <option>Agosto</option>
							  <option>Setembro</option>
							  <option>Outubro</option>
							  <option>Novembro</option>
							  <option>Dezembro</option>
							</select>
						</td>
						<td>
							<select class="form-control" id="ano_divida">
							  <option>2016</option>
							  <option>2017</option>
							  <option>2018</option>
							  <option>2019</option>
							  <option>2020</option>
							  <option>2021</option>
							  <option>2022</option>
							  <option>2023</option>
							  <option>2024</option>
							  <option>2025</option>
							  <option>2026</option>
							  <option>2027</option>
							  <option>2028</option>
							  <option>2029</option>
							  <option>2030</option>
							</select>
						</td>
						<td>
							<button class="btn btn-primary dim" id="persquisar_divida" style="margin-top:2vh;" type="button"><i class="fa fa-check"></i></button>
						</td>

						
					</tr>
				</tbody>
			</table>
			<?php
				$total_dividas_drogaria=0;
                $total_dividas_drogaria_com_separador='';
                for($i=0;$i<count($array_divida_acumulada);$i++){
                    $total_dividas_drogaria = $total_dividas_drogaria+$array_divida_acumulada[$i][0]['total_acumulada'];
                  }
                  $total_dividas_drogaria_arredondado=ceil($total_dividas_drogaria);
                  $array_total_dividas_drogaria_arredondado=str_split($total_dividas_drogaria_arredondado);
                  if(count($array_total_dividas_drogaria_arredondado)<4){
                    $total_dividas_drogaria_com_separador=$total_dividas_drogaria.'$00';
                  }elseif (count( $array_total_dividas_drogaria_arredondado)==4) {
                    $total_dividas_drogaria_com_separador=$array_total_dividas_drogaria_arredondado[0].'.'.$array_total_dividas_drogaria_arredondado[1].$array_total_dividas_drogaria_arredondado[2].$array_total_dividas_drogaria_arredondado[3].'$00';
                  }elseif (count( $array_total_dividas_drogaria_arredondado)==5) {
                    $total_dividas_drogaria_com_separador=$array_total_dividas_drogaria_arredondado[0].$array_total_dividas_drogaria_arredondado[1].'.'.$array_total_dividas_drogaria_arredondado[2].$array_total_dividas_drogaria_arredondado[3].$array_total_dividas_drogaria_arredondado[4].'$00';
                  }elseif (count( $array_total_dividas_drogaria_arredondado)==6) {
                    $total_dividas_drogaria_com_separador=$array_total_dividas_drogaria_arredondado[0].$array_total_dividas_drogaria_arredondado[1].$array_total_dividas_drogaria_arredondado[2].'.'.$array_total_dividas_drogaria_arredondado[3].$array_total_dividas_drogaria_arredondado[4].$array_total_dividas_drogaria_arredondado[5].'$00';
                  }elseif (count( $array_total_dividas_drogaria_arredondado)==7) {
                    $total_dividas_drogaria_com_separador=$array_total_dividas_drogaria_arredondado[0].'.'.$array_total_dividas_drogaria_arredondado[1].$array_total_dividas_drogaria_arredondado[2].$array_total_dividas_drogaria_arredondado[3].'.'.$array_total_dividas_drogaria_arredondado[4].$array_total_dividas_drogaria_arredondado[5].$array_total_dividas_drogaria_arredondado[6].'$00';
                  }else{
                    $total_dividas_drogaria_com_separador=$total_dividas_drogaria.'$00';
                  }
            ?>
			<h1 style="margin-left:10vw;">Total da Divida Drogaria Maria Teresa: <?php echo $total_dividas_drogaria_com_separador?></h1>
		</div>
    <div id="myTabContent" class="tab-content" style="margin-top:4vh;">
			    

        	
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

        		$total_dividas_um_cliente_drogaria=0;
        		$total_dividas_um_cliente_drogaria_com_separador='';
        		
        		for($i=0;$i<count($array_divida_acumulada);$i++){

        			$total_dividas_um_cliente_drogaria_arredondado=ceil($array_divida_acumulada[$i][0]['total_acumulada']);
	                $array_total_dividas_um_cliente_drogaria=str_split($total_dividas_um_cliente_drogaria_arredondado);
                  	if(count( $array_total_dividas_um_cliente_drogaria)<4){
                    	$total_dividas_um_cliente_drogaria_com_separador=$total_dividas_um_cliente_drogaria_arredondado.'$00';
                  	}elseif (count( $array_total_dividas_um_cliente_drogaria)==4) {
                    	$total_dividas_um_cliente_drogaria_com_separador=$array_total_dividas_um_cliente_drogaria[0].'.'.$array_total_dividas_um_cliente_drogaria[1].$array_total_dividas_um_cliente_drogaria[2].$array_total_dividas_um_cliente_drogaria[3].'$00';
                  	}elseif (count( $array_total_dividas_um_cliente_drogaria)==5) {
                    	$total_dividas_um_cliente_drogaria_com_separador=$array_total_dividas_um_cliente_drogaria[0].$array_total_dividas_um_cliente_drogaria[1].'.'.$array_total_dividas_um_cliente_drogaria[2].$array_total_dividas_um_cliente_drogaria[3].$array_total_dividas_um_cliente_drogaria[4].'$00';
                  	}elseif (count( $array_total_dividas_um_cliente_drogaria)==6) {
                    	$total_dividas_um_cliente_drogaria_com_separador=$array_total_dividas_um_cliente_drogaria[0].$array_total_dividas_um_cliente_drogaria[1].$array_total_dividas_um_cliente_drogaria[2].'.'.$array_total_dividas_um_cliente_drogaria[3].$array_total_dividas_um_cliente_drogaria[4].$array_total_dividas_um_cliente_drogaria[5].'$00';
                  	}elseif (count( $array_total_dividas_um_cliente_drogaria)==7) {
                    	$total_dividas_um_cliente_drogaria_com_separador=$array_total_dividas_um_cliente_drogaria[0].'.'.$array_total_dividas_um_cliente_drogaria[1].$array_total_dividas_um_cliente_drogaria[2].$array_total_dividas_um_cliente_drogaria[3].'.'.$array_total_dividas_um_cliente_drogaria[4].$array_total_dividas_um_cliente_drogaria[5].$array_total_dividas_um_cliente_drogaria[6].'$00';
                  	}else{
                    	$total_dividas_um_cliente_drogaria_com_separador=$total_dividas_um_cliente_drogaria_arredondado.'$00';
                  	}
              		  
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $array_divida_acumulada[$i][0]['nome_devedor'] ?></td>
		            <td><?php echo $total_dividas_um_cliente_drogaria_com_separador ?></td>	
		            <td style="width:2;">
                        <div class="dropdown profile-element"> 
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                             </span> <span class="text-muted text-xs block"><i class="fa fa-bars"></i></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs" style="background-color:#F3F3F4; text-color:#293846;">
		        		     <li><a href="#" class ="info_devedor" id_devedor_histotico_divida="<?php echo $array_divida_acumulada[$i][0]['id_devedor'] ?>"  nome_devedor_histotico_divida="<?php echo $array_divida_acumulada[$i][0]['nome_devedor'] ?>" ><button type="button" class="" data-toggle="modal" data-target="#myModal_Dividas">nova dividas</button></a></li>
		        		     <li><a href="#" class ="listagem_dividas_do_cliente" id_devedor_histotico_divida="<?php echo $array_divida_acumulada[$i][0]['id_devedor'] ?>"  nome_devedor_histotico_divida="<?php echo $array_divida_acumulada[$i][0]['nome_devedor'] ?>"><button type="button" class="" data-toggle="modal" data-target="#myModal_descricao_Dividas">listar dividas</button></a></li>
		        		    </ul>
                        </div>  
                           
                    </td>          
		            
		        </tr>
		    <?php
            	}
            ?>                
	         
        </tbody>                 
        </table>
    </div>
	 

    
    <div class="modal fade" id="myModal_Dividas" style="margin-left:16vw;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" style="width:65vw; align:center;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModal_Dividas">Registar Dividas</h4>
		      </div>
		      <div class="modal-body">
		        	<form class="form-horizontal" style="margin-left:15vw; margin-top:4vh;  margin-top:0vh;" >
		        		<input type="hidden" id="id_devedor_hidden">
					       <div class="form-group" style="align:center;"><label class="col-lg-2 control-label"></label>

					    <div class="col-lg-6"></div>
					    </div>                          
					    <div class="form-group" style="align:center; text-color:white;"><label class="col-lg-2 control-label" style="color:#2f4050;">Nome Devedor</label>

					    <div class="col-lg-6"><input type="text" id="destino_produto_dividas" placeholder="nome devedor" class="form-control"></div>
					    </div>
					     <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Descrição Produto</label>

					    <div class="col-lg-6"><input type="text" id="designacao_produto_dividas" placeholder="descrição do produto" class="form-control"></div>
					    </div> 
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;"> </label>

					    <div class="col-lg-6"><ul id='lista_resultado_pesquisa_dividas'> </ul></div>
					    </div>
					     <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Referência do Produto</label>

					    <div class="col-lg-6"><input type="text" id="referencia_produto_dividas" placeholder="referência do produto" class="form-control"></div>
					    </div> 
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;"> </label>

					    <div class="col-lg-6"><ul id='lista_resultado_referencia_dividas'> </ul> </div>
					    </div>

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Quantidade em Stock</label>

					    <div class="col-lg-6"><input type="text" readonly="readonly" id="quantidade_stock_dividas" placeholder="quantidade em stock" class="form-control"></div>
					    </div>


					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Quantidade</label>      

					    <div class="col-lg-6"><input type="number" id="quantidade_produto_dividas" placeholder="quantidade" class="form-control"></div>
					    </div>
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Categoria</label>

					    <div class="col-lg-6"><select class="form-control m-b" name="categoria" id="categoria_dividas">
					          <option value="opcao">--- selecione uma opção ---</option>
					          <option value="electricidade">electricidade</option>
					          <option value="carpintaria">carpintaria</option>
					          <option value="hidronil"> hidronil</option>
					          <option value="agua">agua</option>
					          <option value="ppr">ppr</option>
					          <option value="pvc">pvc</option>
					          <option value="ferragem">ferragem</option>
					          <option value="sita">sita</option>
					          <option value="diversos">diversos</option>

					      </select>
					    </div> 
					     </div>

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Responsavel pela Divida</label>

					    <div class="col-lg-6"><input type="text" id="responsavel_divida" placeholder="responsavel pela Divida" class="form-control"></div>
					    </div>

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Observação da Divida</label>

					    <div class="col-lg-6"><textarea id="observacoes_divida" class="form-control" value = '' name="observacao" rows="5" cols="50" style="height:6vw;"> </textarea></div>
					     </div>             
					    
		    		</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" id='cancelar_divida' data-dismiss="modal">Cancelar Registo Divida</button>
		        <button type="button" class="btn btn-primary" id="submeter_divida" >Registar Divida</button>
		      </div>
		    </div>
		  </div>
	</div>

	<!------------------------------------- inicio popup listar descricao das dividas de um devedor--------------------------*/-->

	<div class="modal fade" id="myModal_descricao_Dividas" style="margin-left:16vw;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" style="width:84vw; align:center;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModal_descricao_Dividas-title">Descrição da Divida do Cliente </h4>
		      </div>
		      <div class="modal-body" id="myModal_descricao_Dividas-body">
		        	
		      <div class="modal-footer">

		      </div>
		    </div>
		  </div>
	</div>


	<!--/*----------------------------------- fim popup listar descricao das dividas de um devedor--------------------------*/-*/-->
	
               
             

<script type="text/javascript">
	$(document).ready(function(){
		
		$(".info_devedor").on("click",function(){
			var id_devedor_histotico_divida=$(this).attr("id_devedor_histotico_divida");
			var nome_devedor_histotico_divida=$(this).attr("nome_devedor_histotico_divida");
			$("#destino_produto_dividas").val(nome_devedor_histotico_divida);
			$("#id_devedor_hidden").val(id_devedor_histotico_divida);
			$("#designacao_produto_dividas").val("");
			$("#referencia_produto_dividas").val("");
			$("#quantidade_stock_dividas").val("");
			$("#quantidade_produto_dividas").val("");
			$("#responsavel_divida").val("");
			$("#categoria_dividas").val("opcao");
			$("#observacoes_divida").val("");			
			
		});

		$(".listagem_dividas_do_cliente").on("click",function(){
			$("#myModal_descricao_Dividas-body").html("");
			var id_devedor_histotico_divida=$(this).attr("id_devedor_histotico_divida");
			var nome_devedor_histotico_divida=$(this).attr("nome_devedor_histotico_divida");
			var dados={"id_devedor_histotico_divida":id_devedor_histotico_divida,"nome_devedor_histotico_divida":nome_devedor_histotico_divida};
			
			$.post("",{want:"drogaria",data:"listagem_dividas_do_cliente","dados":dados},function(resp){
			
				$("#myModal_descricao_Dividas-body").html(resp);
			});
		});

		$("#registar_nova_divida").on("click",function(){
			$("#id_devedor_hidden").val("");
			$("#destino_produto_dividas").val("");
			$("#designacao_produto_dividas").val("");
			$("#referencia_produto_dividas").val("");
			$("#quantidade_stock_dividas").val("");
			$("#quantidade_produto_dividas").val("");
			$("#responsavel_divida").val("");
			$("#categoria_dividas").val("opcao");
			$("#observacoes_divida").val("");
			
		});


		$(".info_devedor").on("click",function(){
			var id_devedor_histotico_divida=$(this).attr("id_devedor_histotico_divida");
			var nome_devedor_histotico_divida=$(this).attr("nome_devedor_histotico_divida");
			$("#destino_produto_dividas").val(nome_devedor_histotico_divida);
			$("#id_devedor_hidden").val(id_devedor_histotico_divida);	
			
		});

		var array_mes=[{"ind":"01","mes":"Janeiro"},
						{"ind":"02","mes":"Fevereiro"},
						{"ind":"03","mes":"Março"},
						{"ind":"04","mes":"Abril"},
						{"ind":"05","mes":"Maio"},
						{"ind":"06","mes":"Junho"},
						{"ind":"07","mes":"Julho"},
						{"ind":"08","mes":"Agosto"},
						{"ind":"09","mes":"Setembro"},
						{"ind":"10","mes":"Outubro"},
						{"ind":"11","mes":"Novembro"},
						{"ind":"12","mes":"Dezembro"}
					  ];
		function returnMes(ind){
			for (var i=0;i<array_mes.length;i++){
				if(array_mes[i]["ind"]==ind){
					return array_mes[i]["mes"];
				}
			}
		}

		function returnIndeceMes(mes){
			for (var i=0;i<array_mes.length;i++){
				if(array_mes[i]["mes"]==mes){
					return array_mes[i]["ind"];
				}
			}
		}
		
		$.post("",{want:"drogaria",data:"data_de_hoje"},function(resp){
			var resp=JSON.parse(resp);
			var array_data = resp["data_hoje"].split("-");
			$("#dia_divida").val(array_data[2]);
			var mes_certo = returnMes(array_data[1]);
			$("#mes_divida").val(mes_certo);
			$("#ano_divida").val(array_data[0]);


		});


		$("#persquisar_divida").on("click",function(){
			var dia_divida = $("#dia_divida").val();
			var mes_divida = $("#mes_divida").val();
			var ind_mes = returnIndeceMes(mes_divida);
			var ano_divida = $("#ano_divida").val();

			var data_divida = ano_divida+"-"+ind_mes+"-"+dia_divida;

			$.post("",{want:"drogaria",data:"persquisar_divida","data_divida":data_divida},function(resp){
				
				$("#myTabContent").html("");
			 	$("#myTabContent").html(resp);
			});
		});

		

		/*$("#venda_diaria").on("click",function(){
			 $("#area_results").html("");
                $.post("",{want:"drogaria",data:"historico_vendas"},function(resp){
                    $("#area_results").html(resp);                 
                });
		});*/

		/*$("#venda_mensal").on("click",function(){
			 $("#myTabContent").html("");
			 $("#myTabContent").html("venda Mensal");
              
		});*/

		$("#designacao_produto_dividas").on("keyup",function(){
			$('#lista_resultado_referencia_dividas').html("");
			$('#lista_resultado_referencia_dividas').hide("");
			$('#referencia_produto_dividas').val("");
			if($(this).val()==""){
				$('#lista_resultado_pesquisa_dividas').hide();
				$('#referencia_produto_dividas').val("");
				$('#lista_resultado_referencia_dividas').html("");
				$('#lista_resultado_referencia_dividas').hide("");

			}else{
				$('#lista_resultado_pesquisa_dividas').html("");
				var designacao = $(this).val();
				$.post("",{want:"drogaria",data:"listar_designacao_produtos","designacao":designacao},function(resp){
					var res=JSON.parse(resp);
					if(res["resultado"].length>0){
						for (i=0;i<res["resultado"].length;i++)	{
							var designacao_prod=res["resultado"][i].designacao;
							var lista_id="<li class='designacao_prod' opcao='"+designacao_prod+"'>"+designacao_prod+"</li>";					
							$('#lista_resultado_pesquisa_dividas').show().append(lista_id);
						}
					}else{
						
					}
				});				
			}

		});



			

			/*$('body').on("change","#designacao_produto",function(){
				designacao_inserida = $(this).val();*/
				

			$("body").on("click",".designacao_prod",function(){
				var opcao= $(this).attr('opcao'); 
				$('#designacao_produto_dividas').val(opcao);
				$('#lista_resultado_pesquisa_dividas').hide()
			});

			$('body').on("click","#referencia_produto_dividas",function(){

				if($("#designacao_produto_dividas").val()==""){
					alertify.error("insira o referencia produto");
				}else{
					var designacao_inserida = $("#designacao_produto_dividas").val();

						$('#lista_resultado_referencia_dividas').html("");
						//var referencia_produto = $(this).val();*/
						$.post("",{want:"drogaria",data:"listar_referencia_produto","designacao_inserida":designacao_inserida},function(resp){
							var res=JSON.parse(resp);
							if(res["resultado"].length>0){
								for (i=0;i<res["resultado"].length;i++)	{
									var referencia_prod=res["resultado"][i].referencia;
									var lista_referencia="<li class='referencia_prod' opcao_ref='"+referencia_prod+"'>"+referencia_prod+"</li>";					
									$('#lista_resultado_referencia_dividas').show().append(lista_referencia);
								}
							}else{
								
							}
						});				
					//}					
				}

			});

			var id_produto_divida="";
			var preco_unitario_prod_divida="";

			$("body").on("click",".referencia_prod",function(){

				var opcao_ref= $(this).attr('opcao_ref'); 
				$('#referencia_produto_dividas').val(opcao_ref);
				$('#lista_resultado_referencia_dividas').hide()
				$('#lista_resultado_referencia_dividas').html("")

				var designacao_para_stock = $("#designacao_produto_dividas").val();
				var referencia_para_stock = $("#referencia_produto_dividas").val();
				
				$.post("",{want:"drogaria",data:"listar_preco_stock","designacao_para_stock":designacao_para_stock,"referencia_para_stock":referencia_para_stock},function(resp){
					
					var res=JSON.parse(resp);
					$("#preco_unitario").val(res["resultado"][0].preco_venda);
					$("#quantidade_stock_dividas").val(res["resultado"][0].quantidade);
					id_produto_divida = res["resultado"][0].id_produto;
					preco_unitario_prod_divida=res["resultado"][0].preco_venda;

				});
			});

			
			$("#submeter_divida").on("click",function(){

			var destino_produto_dividas=$("#destino_produto_dividas").val();
			var id_devedor_divida=$("#id_devedor_hidden").val();
			var designacao_produto_dividas=$("#designacao_produto_dividas").val();
			var referencia_produto_dividas=$("#referencia_produto_dividas").val();
			var quantidade_stock_dividas=$("#quantidade_stock_dividas").val();
			var quantidade_produto_dividas = $("#quantidade_produto_dividas").val();
			var responsavel_divida = $("#responsavel_divida").val();
			var categoria_dividas = $("#categoria_dividas").val();
			var observacoes_divida = $("#observacoes_divida").val();
			var nome_user = $("#nome_user").val();			

			if(destino_produto_dividas==""){				
				$("#destino_produto_dividas").focus();
				alertify.error('insira o nome do devedor.');
			}else if(designacao_produto_dividas==""){
				$("#designacao_produto_dividas").focus();
				alertify.error('insira a designação do produto.');
			}else if(referencia_produto_dividas==""){
				$("#referencia_produto_dividas").focus();
				alertify.error('insira a referência do produto.');
			}else if(quantidade_produto_dividas==""){
				$("#quantidade_produto_dividas").focus();
				alertify.error('insira a quantidade do produto.');
			}else if(categoria_dividas=="opcao"){
				$("#categoria_dividas").focus();
				alertify.error('escolhe a categoria do produto');
			}else if(responsavel_divida==""){
				$("#responsavel_divida").focus();
				alertify.error('insira o responsavel da divida');
			}else if(observacoes_divida==""){	
				$("#observacoes_divida").focus();			
				alertify.error('para melhor controlo insira uma observação');
			}else{
				var dados = {"destino_produto_dividas":destino_produto_dividas,"id_devedor_divida":id_devedor_divida,"designacao_produto_dividas":designacao_produto_dividas,
						"referencia_produto_dividas":referencia_produto_dividas,"quantidade_stock_dividas":quantidade_stock_dividas,"quantidade_produto_dividas":quantidade_produto_dividas,
						"responsavel_divida":responsavel_divida,"categoria_dividas":categoria_dividas,"observacoes_divida":observacoes_divida,
						"preco_unitario_prod_divida":preco_unitario_prod_divida,"id_produto_divida":id_produto_divida};

				//console.log(dados);		

				$.post("",{want:"drogaria",data:"registar_divida","dados":dados},function(resp){
				
					var res=JSON.parse(resp);
					
					if(res["sucesso"]=='sucesso'){
						$("#id_devedor_hidden").val("");
						$("#destino_produto_dividas").val("");
						$("#designacao_produto_dividas").val("");
						$("#referencia_produto_dividas").val("");
						$("#quantidade_stock_dividas").val("");
						$("#quantidade_produto_dividas").val("");
						$("#responsavel_divida").val("");
						$("#categoria_dividas").val("opcao");
						$("#observacoes_divida").val("");
						alertify.alert("registado com sucesso");
					}else{
						alertify.alert("erro de inserção");
					}
				});				
			}

		});

		$("#cancelar_divida").on("click",function(){
			$("#destino_produto_dividas").val("");
			$("#designacao_produto_dividas").val("");
			$("#referencia_produto_dividas").val("");
			$("#quantidade_stock_dividas").val("");
			$("#quantidade_produto_dividas").val("");
			$("#responsavel_divida").val("");
			$("#categoria_dividas").val("opcao");
			$("#observacoes_divida").val("");
		});

		$("#divida_diaria").on("click",function(){
                $("#sub_menus").html("");
                $("#area_results").html("");
               $.post("",{want:"drogaria",data:"historico_dividas"},function(resp){
                    $("#area_results").html(resp);                 
                });
            })
			
		$("#divida_mensal").on("click",function(){
			$("#area_pesquisa").html("");
			$("#myTabContent").html("");
			$("#myTabContent").html("<h1> Em estudo Divida Mensal</h1>");
		});

		$("#divida_total").on("click",function(){
			$("#area_pesquisa").html("");
			$("#myTabContent").html("");
			$("#myTabContent").html("<h1> Em estudo divida Total </h1>");
		});

		$("#info_devedor").on("click",function(){			
			
			var id_devedor=$(this).attr("id_devedor");
			alert(id_devedor);
		});
		
		
		

		
		
		/*$("#myTabContent").html("");
		$("#myTabContent").append("<h1>Lista de pedido materiais</h1>");

		*/$('.dataTables-example').dataTable({
                responsive: true,
                /*"dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }*/
            });

	



		
	});
</script>
