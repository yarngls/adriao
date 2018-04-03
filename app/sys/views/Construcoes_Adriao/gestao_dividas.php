<?php
	$query_select_dividas=$_SESSION["query_select_dividas"];
	
	
?>




    

<form class="form-horizontal">
	
					
	

    <div class="form-group" style="align:center">
    <button class="btn btn-outline btn-primary " style="margin-left:70vw;" type="button" data-toggle="modal" data-target="#myModal_Dividas_construcoes" id="registar_divida_construcoes"><i class="fa fa-check"></i>Nova Divida</button>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#" id="todas_as_dividas" class="" categoria="#" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><span style="color:#23C6C8"> Todas Dividas</span></a></li>
     
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
				$total_dividas=0;
	                $total_divida_com_separador='';
	                for($i=0;$i<count($query_select_dividas);$i++){
	                    $total_dividas = $total_dividas+$query_select_dividas[$i][0]['total_acumulada'];
	                  }
	                 $total_dividas_arredondado=ceil($total_dividas);
	                  $array_total_dividas_arredondado=str_split($total_dividas_arredondado);
	                  if(count( $array_total_dividas_arredondado)<4){
	                    $total_divida_com_separador=$total_dividas.'$00';
	                  }elseif (count( $array_total_dividas_arredondado)==4) {
	                    $total_divida_com_separador=$array_total_dividas_arredondado[0].'.'.$array_total_dividas_arredondado[1].$array_total_dividas_arredondado[2].$array_total_dividas_arredondado[3].'$00';
	                  }elseif (count( $array_total_dividas_arredondado)==5) {
	                    $total_divida_com_separador=$array_total_dividas_arredondado[0].$array_total_dividas_arredondado[1].'.'.$array_total_dividas_arredondado[2].$array_total_dividas_arredondado[3].$array_total_dividas_arredondado[4].'$00';
	                  }elseif (count( $array_total_dividas_arredondado)==6) {
	                    $total_divida_com_separador=$array_total_dividas_arredondado[0].$array_total_dividas_arredondado[1].$array_total_dividas_arredondado[2].'.'.$array_total_dividas_arredondado[3].$array_total_dividas_arredondado[4].$array_total_dividas_arredondado[5].'$00';
	                  }elseif (count( $array_total_dividas_arredondado)==7) {
	                    $total_divida_com_separador=$array_total_dividas_arredondado[0].'.'.$array_total_dividas_arredondado[1].$array_total_dividas_arredondado[2].$array_total_dividas_arredondado[3].'.'.$array_total_dividas_arredondado[4].$array_total_dividas_arredondado[5].$array_total_dividas_arredondado[6].'$00';
	                  }else{
	                    $total_divida_com_separador=$total_dividas.'$00';
	                  }
            ?>
			<h1 style="margin-left:15vw;">Total da Divida Construções Adrião: <?php echo $total_divida_com_separador?></h1>
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

        		$total_dividas_cliente=0;
        		$total_divida_cliente_com_separador='';
        		
        		for($i=0;$i<count($query_select_dividas);$i++){

        			$total_dividas_cliente_arredondado=ceil($query_select_dividas[$i][0]['total_acumulada']);
	                $array_total_dividas_cliente_arredondado=str_split($total_dividas_cliente_arredondado);
                  	if(count( $array_total_dividas_cliente_arredondado)<4){
                    	$total_divida_cliente_com_separador=$query_select_dividas[$i][0]['total_acumulada'].'$00';
                  	}elseif (count( $array_total_dividas_cliente_arredondado)==4) {
                    	$total_divida_cliente_com_separador=$array_total_dividas_cliente_arredondado[0].'.'.$array_total_dividas_cliente_arredondado[1].$array_total_dividas_cliente_arredondado[2].$array_total_dividas_cliente_arredondado[3].'$00';
                  	}elseif (count( $array_total_dividas_cliente_arredondado)==5) {
                    	$total_divida_cliente_com_separador=$array_total_dividas_cliente_arredondado[0].$array_total_dividas_cliente_arredondado[1].'.'.$array_total_dividas_cliente_arredondado[2].$array_total_dividas_cliente_arredondado[3].$array_total_dividas_cliente_arredondado[4].'$00';
                  	}elseif (count( $array_total_dividas_cliente_arredondado)==6) {
                    	$total_divida_cliente_com_separador=$array_total_dividas_cliente_arredondado[0].$array_total_dividas_cliente_arredondado[1].$array_total_dividas_cliente_arredondado[2].'.'.$array_total_dividas_cliente_arredondado[3].$array_total_dividas_cliente_arredondado[4].$array_total_dividas_cliente_arredondado[5].'$00';
                  	}elseif (count( $array_total_dividas_cliente_arredondado)==7) {
                    	$total_divida_cliente_com_separador=$array_total_dividas_cliente_arredondado[0].'.'.$array_total_dividas_cliente_arredondado[1].$array_total_dividas_cliente_arredondado[2].$array_total_dividas_cliente_arredondado[3].'.'.$array_total_dividas_cliente_arredondado[4].$array_total_dividas_cliente_arredondado[5].$array_total_dividas_cliente_arredondado[6].'$00';
                  	}else{
                    	$total_divida_cliente_com_separador=$query_select_dividas[$i][0]['total_acumulada'].'$00';
                  	}
              		  
        	?>
        		 <tr class="gradeC">
		            <td><?php echo $query_select_dividas[$i][0]['nome_devedor'] ?></td>
		            <td><?php echo $total_divida_cliente_com_separador ?></td>	
		            <td style="width:2;">
                        <div class="dropdown profile-element"> 
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                             </span> <span class="text-muted text-xs block"><i class="fa fa-bars"></i></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs" style="background-color:#F3F3F4; text-color:#293846;">
		        		     <li><a href="#" class ="nova_divida" id_devedor_const_adriao="<?php echo $query_select_dividas[$i][0]['id_devedor'] ?>"  nome_devedor_cont_adriao="<?php echo $query_select_dividas[$i][0]['nome_devedor'] ?>" ><button type="button" class="" data-toggle="modal" data-target="#myModal_Dividas_construcoes">nova dividas</button></a></li>
		        		     <li><a href="#" class ="dividas_do_cliente" id_devedor_const_adriao="<?php echo $query_select_dividas[$i][0]['id_devedor'] ?>"  nome_devedor_cont_adriao="<?php echo $query_select_dividas[$i][0]['nome_devedor'] ?>"><button type="button" class="" data-toggle="modal" data-target="#myModal_descricao_Dividas_devedor">listar dividas</button></a></li>
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
	 

    
    <div class="modal fade" id="myModal_Dividas_construcoes" style="margin-left:16vw;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" style="width:65vw; align:center;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModal_Dividas_construcoes">Registar Dividas</h4>
		      </div>
		      <div class="modal-body">
		        	<form class="form-horizontal" style="margin-left:15vw; margin-top:4vh;  margin-top:0vh;" >
		        		<input type="hidden" id="id_devedor_hidden">
					       <div class="form-group" style="align:center;"><label class="col-lg-2 control-label"></label>

					    <div class="col-lg-6"></div>
					    </div>                          
					    <div class="form-group" style="align:center; text-color:white;"><label class="col-lg-2 control-label" style="color:#2f4050;">Nome Devedor</label>

					    <div class="col-lg-6"><input type="text" id="nome_devedor" placeholder="nome devedor" class="form-control"></div>
					    </div>
					     <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Descrição Divida</label>

					   	<div class="col-lg-6"><textarea id="descricao_divida" placehoder=' descrição da divida' class="form-control" value = '' name="descricao_divida" rows="5" cols="50" style="height:6vw;"> </textarea></div>
					     </div> 	

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Montante</label>      

					    <div class="col-lg-6"><input type="number" id="montante_divida" placeholder="montante da divida" class="form-control"></div>
					    </div>
					    
					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Responsavel pela Divida</label>

					    <div class="col-lg-6"><input type="text" id="responsavel_divida" placeholder="responsavel pela Divida" class="form-control"></div>
					    </div>

					    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Observação da Divida</label>

					    <div class="col-lg-6"><textarea id="observacao_divida" class="form-control" value = '' name="observacao" rows="5" cols="50" style="height:6vw;"> </textarea></div>
					     </div>             
					    
		    		</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" id='cancelar_divida' data-dismiss="modal">Cancelar Registo Divida</button>
		        <button type="button" class="btn btn-primary" id="registar_divida" >Registar Divida</button>
		      </div>
		    </div>
		  </div>
	</div>

	<!------------------------------------- inicio popup listar descricao das dividas de um devedor--------------------------*/-->

	<div class="modal fade" id="myModal_descricao_Dividas_devedor" style="margin-left:16vw;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" style="width:84vw; align:center;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModal_descricao_Dividas_devedor-title">Descrição da Divida do Cliente </h4>
		      </div>
		      <div class="modal-body" id="myModal_descricao_Dividas_devedor-body">
		        	
		      <div class="modal-footer">

		      </div>
		    </div>
		  </div>
	</div>


	<!--/*----------------------------------- fim popup listar descricao das dividas de um devedor--------------------------*/-*/-->
	
               
             

<script type="text/javascript">
	$(document).ready(function(){

		
	
		$(".nova_divida").on("click",function(){

			var id_devedor_const_adriao=$(this).attr("id_devedor_const_adriao");
			var nome_devedor_cont_adriao=$(this).attr("nome_devedor_cont_adriao");
			
			$("#nome_devedor").val(nome_devedor_cont_adriao);
			$("#id_devedor_hidden").val(id_devedor_const_adriao);
			$("#descricao_divida").val("");
			$("#montante_divida").val("");
			$("#responsavel_divida").val("");
			$("#observacao_divida").val("");


			
		});

		$(".dividas_do_cliente").on("click",function(){
			$("#myModal_descricao_Dividas_devedor-body").html("");
			var id_devedor_const_adriao=$(this).attr("id_devedor_const_adriao");
			var nome_devedor_cont_adriao=$(this).attr("nome_devedor_cont_adriao");
			var dados={"id_devedor":id_devedor_const_adriao,"nome_devedor":nome_devedor_cont_adriao};			
			$.post("",{want:"construcoes_adriao",data:"dividas_do_cliente","dados":dados},function(resp){			
				$("#myModal_descricao_Dividas_devedor-body").html(resp);
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

			
			
			$("#registar_divida").on("click",function(){
				var id_devedor =$("#id_devedor_hidden").val();			
				var nome_devedor=$("#nome_devedor").val();
				var descricao_divida=$("#descricao_divida").val();
				var montante_divida=$("#montante_divida").val();
				var responsavel_divida=$("#responsavel_divida").val();
				var observacao_divida=$("#observacao_divida").val();
				var estado_divida = $("#estado_divida").val();
						

				if(nome_devedor==""){				
					$("#nome_devedor").focus();
					alertify.error('insira o nome do devedor.');
				}else if(descricao_divida==""){
					$("#descricao_divida").focus();
					alertify.error('insira a descricao da divida.');
				}else if(montante_divida==""){
					$("#montante_divida").focus();
					alertify.error('insira o montante da divida.');
				}else if(responsavel_divida==""){
					$("#responsavel_divida").focus();
					alertify.error('insira o responsavel da divida.');
				}else{
					var dados = {"id_devedor":id_devedor,"nome_devedor":nome_devedor,"descricao_divida":descricao_divida,
								 "montante_divida":montante_divida,"responsavel_divida":responsavel_divida,
								 "observacao_divida":observacao_divida
								};

					//console.log(dados);		

					$.post("",{want:"construcoes_adriao",data:"registar_divida","dados":dados},function(resp){
					
							$("#nome_devedor").val("");
							$("#descricao_divida").val("");
							$("#montante_divida").val("");
							$("#responsavel_divida").val("");
							$("#observacao_divida").val("");
							alertify.alert("registado com sucesso");
						
					});				
				}

			});

		$("#cancelar_divida").on("click",function(){
			$("#nome_devedor").val("");
			$("#descricao_divida").val("");
			$("#montante_divida").val("");
			$("#responsavel_divida").val("");
			$("#observacao_divida").val("");
		});

		$("#todas_as_dividas").on("click",function(){
           $("#sub_menus").html("");
           $("#area_results").html("");
           $.post("",{want:"construcoes_adriao",data:"gestao_dividas"},function(resp){
           	 	$("#area_results").html("<img src='img/ajax-loader.gif'>");
           	 	setTimeout(function(){
                	$("#area_results").html(resp);  
           	 	},1000);
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

		
		

		$('.dataTables-example').dataTable({
            responsive: true,
            /*"dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }*/
        });

	



		
	});
</script>
