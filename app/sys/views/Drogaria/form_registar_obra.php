<?php
	$nome = $_SESSION['nome'];
    
?>




<form class="form-horizontal" style="margin-left:15vw; margin-top:4vh;  margin-top:0vh;" >
       <div class="form-group" style="align:center;"><label class="col-lg-2 control-label"></label>

    <div class="col-lg-6"></div>
    </div>                         
    
    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Dono da Obra</label>

    <div class="col-lg-6"><input type="text" id="dono_da_obra" placeholder="dono da obra" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Nome da Obra</label>

    <div class="col-lg-6"><input type="text" id="nome_da_obra" placeholder="nome da obra" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Local da Obra</label>

    <div class="col-lg-6"><input type="text" id="local_da_obra" placeholder="local da obra" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Tempo Execução</label>      

    <div class="col-lg-6"><input type="text" id="tempo_execucao" placeholder="tempo de execução" class="form-control"></div>
    </div>
   
    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Data Inicio</label>      

    <div class="col-lg-6">
    	
    	<table>
				<tbody>
					<tr>
						<td>
							<select class="form-control" id="dia_inicio_obra">
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
							<select class="form-control" id="mes_inicio_obra">
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
							<select class="form-control" id="ano_inicio_obra">
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
					</tr>
				</tbody>
			</table>

    </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Data Fim</label>      

    <div class="col-lg-6">
    	
    	<table>
				<tbody>
					<tr>
						<td>
							<select class="form-control" id="dia_fim_obra">
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
							<select class="form-control" id="mes_fim_obra">
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
							<select class="form-control" id="ano_fim_obra">
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
					</tr>
				</tbody>
			</table>

    </div>
    </div>  
   

    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Responsavel</label>

    <div class="col-lg-6"><input type="text" id="responsavel_da_obra" placeholder="responsavel" class="form-control"></div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Nome Acesso</label>

    <div class="col-lg-6"><input type="text" id="nome_acesso" placeholder="nome responsavel da obra" class="form-control"></div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label" style="color:#2f4050;">Codigo acesso</label>

    <div class="col-lg-6"><input type="text" id="codigo_acesso" placeholder="codigo acesso da obra" class="form-control"></div>
    </div>




    <div class="col-lg-6" style="margin-left:6vw;"><button class="btn btn-danger btn-rounded" type="button" id="cancelar_requisicao" style="margin-left:2vw;"><i class="fa fa-check"> Cancelar</i>
    <button class="btn btn-info btn-rounded" type="button" id="registar_obra" style="margin-left:1vw;"><i class="fa fa-check"> Registar obra</i>
    </button>
    

    </div>
    
    <input type='hidden' value="<?php echo $nome ?>" id="nome_user">
    
</form>


<script type="text/javascript">
	$(document).ready(function(){

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
			$("#dia_inicio_obra").val(array_data[2]);
			var mes_certo = returnMes(array_data[1]);
			$("#mes_inicio_obra").val(mes_certo);
			$("#ano_inicio_obra").val(array_data[0]);
			$("#dia_fim_obra").val(array_data[2]);
			var mes_certo = returnMes(array_data[1]);
			$("#mes_fim_obra").val(mes_certo);
			$("#ano_fim_obra").val(array_data[0]);
		});
		
		$("#registar_obra").on("click",function(){
			var dono_da_obra=$("#dono_da_obra").val();
			var nome_da_obra=$("#nome_da_obra").val();
			var local_da_obra=$("#local_da_obra").val();
			var tempo_execucao=$("#tempo_execucao").val();

			var mes_inicio_certo = returnIndeceMes($("#mes_inicio_obra").val());
			var data_inicio_obra = $("#ano_inicio_obra").val()+"-"+mes_inicio_certo+"-"+$("#dia_inicio_obra").val();
			
			var mes_fim_certo = returnIndeceMes($("#mes_fim_obra").val());
			var data_fim_obra = $("#ano_fim_obra").val()+"-"+mes_fim_certo+"-"+$("#dia_fim_obra").val();
			

			var responsavel_da_obra = $("#responsavel_da_obra").val();
			var nome_acesso = $("#nome_acesso").val();
			var codigo_acesso = $("#codigo_acesso").val();

			if(dono_da_obra==""){				
				$("#dono_da_obra").focus();
				alertify.error('insira o nome do dono obra');
			}else if(nome_da_obra==""){				
				$("#nome_da_obra").focus();
				alertify.error('insira o nome da obra');
			}else if(local_da_obra==""){
				$("#local_da_obra").focus();
				alertify.error('insira o local da obra');
			}else if(tempo_execucao==""){
				$("#tempo_execucao").focus();
				alertify.error('insira o tempo execução da obra');
			}else if(responsavel_da_obra==""){
				$("#responsavel_da_obra").focus();
				alertify.error('insira o nome responsavel da obra');
			}else if(nome_acesso==""){
				$("#categoria").focus();
				alertify.error('insira o nome do responsavel da obra');
			}else if(codigo_acesso==""){
				$("#codigo_acesso").focus();
				alertify.error('insira o codigo acesso da obra');
			}else{								var dados = {"dono_da_obra":dono_da_obra,"nome_da_obra":nome_da_obra,"local_da_obra":local_da_obra,
						"tempo_execucao":tempo_execucao,"data_inicio_obra":data_inicio_obra,
						"data_fim_obra":data_fim_obra,"responsavel_da_obra":responsavel_da_obra,
						"nome_acesso":nome_acesso,"codigo_acesso":codigo_acesso};

				

				$.post("",{want:"drogaria",data:"registar_obra","dados":dados},function(resp){
					var res=JSON.parse(resp);
					$("#dono_da_obra").val("");
					$("#nome_da_obra").val("");
					$("#local_da_obra").val("");
					$("#tempo_execucao").val("");

					$("#responsavel_da_obra").val("");
					$("#nome_acesso").val("");
					$("#codigo_acesso").val("");
					$.post("",{want:"drogaria",data:"data_de_hoje"},function(resp){
						var resp=JSON.parse(resp);
						var array_data = resp["data_hoje"].split("-");
						$("#dia_inicio_obra").val(array_data[2]);
						var mes_certo = returnMes(array_data[1]);
						$("#mes_inicio_obra").val(mes_certo);
						$("#ano_inicio_obra").val(array_data[0]);
						$("#dia_fim_obra").val(array_data[2]);
						var mes_certo = returnMes(array_data[1]);
						$("#mes_fim_obra").val(mes_certo);
						$("#ano_fim_obra").val(array_data[0]);
					});
					alertify.alert("Registado com sucesso");

				});			
			}

		});

		$("#cancelar_requisicao").on("click",function(){
			$("#dono_da_obra").val("");
			$("#nome_da_obra").val("");
			$("#local_da_obra").val("");
			$("#tempo_execucao").val("");

			$("#responsavel_da_obra").val("");
			$("#nome_acesso").val("");
			$("#codigo_acesso").val("");
			$.post("",{want:"drogaria",data:"data_de_hoje"},function(resp){
				var resp=JSON.parse(resp);
				var array_data = resp["data_hoje"].split("-");
				$("#dia_inicio_obra").val(array_data[2]);
				var mes_certo = returnMes(array_data[1]);
				$("#mes_inicio_obra").val(mes_certo);
				$("#ano_inicio_obra").val(array_data[0]);
				$("#dia_fim_obra").val(array_data[2]);
				var mes_certo = returnMes(array_data[1]);
				$("#mes_fim_obra").val(mes_certo);
				$("#ano_fim_obra").val(array_data[0]);
			});
		});
		
	});
</script>
