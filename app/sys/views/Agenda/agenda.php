<?php

	$query_caregar_lembretes=$_SESSION["query_caregar_lembretes"];			
	

?>
        <!-- inicio do Modal para registar observacoes -->

            <div class="modal fade" style="margin-top:20vh;" id="myModal_lembretes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModal_lembretes_tittle">Novo Lembrete</h4>
                  </div>
                  <div class="modal-body" id='myModal_lembretes_body'>
                    <table>
                        <tr>
                            <td>
                                <label class=""  style="color:#2f4050; text-size:12;" >Notas</label>
                            </td>
                            <td>
                                <textarea id="lembrete" class='form-control' rows="5" cols="50" style="height:6vw;"> </textarea>
                            </td>
                        </tr>                                             
                  </table>
                   
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="botao_registar_lembrete" class="btn btn-primary">Registar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- fim do Modal para registar observacoes-->

            <div class="row">
                <table>
                    <tr>
                        <td>
                            <h1 style="margin-left:20vw;">NOTAS DIARIAS</h1>
                        </td>
                        <td>
                            <button class="btn btn-outline btn-primary " style="margin-left:30vw;" type="button" data-toggle="modal" data-target="#myModal_lembretes" id='botao_registar_lembrete'><i class="fa fa-check"></i>Registar</button>
                        </td>
                    </tr>
                </table>
                        
                <div class="col-lg-12">
                	<?php
                		for($contador=0;$contador<count($query_caregar_lembretes);$contador++){
                		$array_date = explode("-", $query_caregar_lembretes[$contador]["data_lembrete"]);	
                	
                	?>
                    <div class="wrapper wrapper-content animated fadeInUp" id='<?php echo $contador?>' >
                        <ul class="notes">
                            <li>
                                <div id='nota'>
                                    <small><?php echo $array_date[2]."-".$array_date[1]."-".$array_date[0]?></small>                                  
                                    <p style="margin-top:1vw;"><?php echo $query_caregar_lembretes[$contador]["lembrete"]?></p>
                                    <a href="#" class='remover_notas'  count_lembrete='<?php echo $contador ?>' id_lembrete='<?php echo $query_caregar_lembretes[$contador]["id_lembrete"]?>'><i class="fa fa-trash-o "></i></a>
                                </div>
                               
                            </li>
                        </ul>
                    </div>
                    <?php
                    	}
                    ?>

                </div>
            </div>

 <script type="text/javascript">
        $(document).ready(function() {
           $(".remover_notas").on("click",function(){
           		var count_lembrete=$(this).attr("count_lembrete");
           		var id_lembrete=$(this).attr("id_lembrete");
           		//alert(id_lembrete);
           		$.post("",{want:"agenda",data:"desactivar_lembrete","id_lembrete":id_lembrete},function(resp){
           			alertify.alert("Nota Removido com sucesso.");
           			$("#"+count_lembrete).remove();
           		});           	

           });

           $("#botao_registar_lembrete").on("click",function(){
           		var lembrete = $("#lembrete").val();
           		$.post("",{want:"agenda",data:"registar_lembrete","lembrete":lembrete},function(resp){         		         			
                   
                    window.location.href="";
                    
           		});
           });
        });

</script