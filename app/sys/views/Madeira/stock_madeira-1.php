<?php
$dados_rec = $_SESSION['dados_stock'];
$categoria_impremir=$_SESSION['categoria_impremir'];

?>
      <!-- inicio modal para actualzar dados do produto.  id="myModal2" 
            dados que preenche este modal vem de sys/views/Drogaria/form_update_stock.php 
            atraves do click do botão actuaizar da tabela stock. tambem utilizada
            para nova gerar nova entrada de produto-->

      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog"  style="width:65vw; align:center; font-size:12">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Actualizar Produto</h4>
            </div>
            <div class="modal-body" id="modal_actualizar">
              ...
            </div>
            <!--<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="actualizar_dados">Guardar</button>
            </div>-->
          </div>
        </div>
      </div>
      <!-- fim modal para actualzar dados do produto -->


       <!-- inicio do Modal para criar Folha-->
        <div class="modal fade" style="width:100vw;" id="myModalPDF_stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width:80vw; margin-left:18vw; height:100vh;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalPDF_stock">Lista de Folhas</h4>
              </div>
              <div class="modal-body" id="myModalPDF_stock-body" style="">
                
               
              </div>                 
            </div>
          </div>
        </div>

        <!-- fim do Modal para criar folha-->




      <h1 style="margin-left:30vw;;">Stock Madeira</h1>
      <div style="float:right">

        <button class="btn btn-outline btn-primary dim" id_categoria_impremir="<?php echo $categoria_impremir ?>" id="impremir_stock" style="margin-left:2vw;" type="button"><i class="fa fa-print"></i></button>
        <button class="btn btn-outline btn-primary dim" id_categoria_exel="<?php echo $categoria_impremir ?>" id="gerar_exel_stock" style="margin-left:2vw;" type="button"><i class="fa fa-file-excel-o"></i></button> 
      
      </div>
      <div id="myTabContent" class="tab-content" style="margin-top:4vh;">
       
      </div>
      <?php
                $total_em_stock=0;
                $total_em_stock_com_separador=0;
                for($i=0;$i<count($dados_rec);$i++){
                        $total_em_stock = $total_em_stock+($dados_rec[$i]['preco_venda'] * $dados_rec[$i]['quantidade']);
                  }
                  $total_em_stock_arredondado=ceil($total_em_stock);
                  $array_total_em_stock_arredondado=str_split($total_em_stock_arredondado);
                  if(count( $array_total_em_stock_arredondado)<4){
                    $total_em_stock_com_separador=$total_em_stock.'$00';
                  }elseif (count( $array_total_em_stock_arredondado)==4) {
                    $total_em_stock_com_separador=$array_total_em_stock_arredondado[0].'.'.$array_total_em_stock_arredondado[1].$array_total_em_stock_arredondado[2].$array_total_em_stock_arredondado[3].'$00';
                  }elseif (count( $array_total_em_stock_arredondado)==5) {
                    $total_em_stock_com_separador=$array_total_em_stock_arredondado[0].$array_total_em_stock_arredondado[1].'.'.$array_total_em_stock_arredondado[2].$array_total_em_stock_arredondado[3].$array_total_em_stock_arredondado[4].'$00';
                  }elseif (count( $array_total_em_stock_arredondado)==6) {
                    $total_em_stock_com_separador=$array_total_em_stock_arredondado[0].$array_total_em_stock_arredondado[1].$array_total_em_stock_arredondado[2].'.'.$array_total_em_stock_arredondado[3].$array_total_em_stock_arredondado[4].$array_total_em_stock_arredondado[5].'$00';
                  }elseif (count( $array_total_em_stock_arredondado)==7) {
                    $total_em_stock_com_separador=$array_total_em_stock_arredondado[0].'.'.$array_total_em_stock_arredondado[1].$array_total_em_stock_arredondado[2].$array_total_em_stock_arredondado[3].'.'.$array_total_em_stock_arredondado[4].$array_total_em_stock_arredondado[5].$array_total_em_stock_arredondado[6].'$00';
                  }else{
                    $total_em_stock_com_separador=$total_em_stock.'$00';
                  }
              ?>
        <h3 style="margin-left:30vw;"> Total em Stock:   <?php echo  $total_em_stock_com_separador ?></h3>
          <table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12; margin-top:2vh;" >
              <thead>
                <tr>
                    <th>Designação</th>
                    <th>Referencia</th>
                    <th>Stock</th>           
                    <th>Preço Venda</th>
                    <th>Total</th>
                    <th>+ Info</th>
                </tr>
              </thead>
               <tbody>
            
           
              <?php
                for($i=0;$i<count($dados_rec);$i++){
                        $total = $dados_rec[$i]['preco_venda'] * $dados_rec[$i]['quantidade'];
              ?>
                 <tr class="gradeC">
                    <td><?php echo $dados_rec[$i]['designacao'] ?></td>
                    <td><?php echo $dados_rec[$i]['referencia'] ?></td>
                    <td><?php echo $dados_rec[$i]['quantidade'] ?></td>
                    <td><?php echo $dados_rec[$i]['preco_venda'] ?></td>
                    <td><?php echo $total ?></td>
                    <td style="width:2;">
                        <div class="dropdown profile-element"> 
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                             </span> <span class="text-muted text-xs block"><i class="fa fa-bars"></i></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs" style="background-color:#F3F3F4; text-color:#293846;">
                                <li><a href="#" class ="actualizar_produto" id_produto='<?php echo $dados_rec[$i]["id_produto"] ?>' designacao_produto='<?php echo $dados_rec[$i]["designacao"] ?>' referencia_produto='<?php echo $dados_rec[$i]["referencia"] ?>'><button type="button" class="" data-toggle="modal" data-target="#myModal2">atualizar</button></a></li>
                                <li><a href="#" class="entrada_produto" id_produto='<?php echo $dados_rec[$i]["id_produto"] ?>' designacao_produto='<?php echo $dados_rec[$i]["designacao"] ?>' referencia_produto='<?php echo $dados_rec[$i]["referencia"] ?>'><button type="button" class="" data-toggle="modal" data-target="#myModal2">Nova Entrada</button></a></li>
                                <li><a href="#" class="historico_produto" id_produto='<?php echo $dados_rec[$i]["id_produto"] ?>' designacao_produto='<?php echo $dados_rec[$i]["designacao"] ?>' referencia_produto='<?php echo $dados_rec[$i]["referencia"] ?>'>Historico</a></li>                               
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


   

    <!-- Page-Level Scripts -->

<script>
	$(document).ready(function(){
		
       
		$('.dataTables-example').dataTable({
            /*responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }*/
        });

    $("#impremir_stock").on("click",function(){
      var id_categoria_impremir=$(this).attr("id_categoria_impremir");
      $.post("",{want:"drogaria",data:"impremir_stock","id_categoria_impremir":id_categoria_impremir},function(resp){
           //alert(resp);
           $("#myModalPDF_stock").html(resp);

      }); 
    });

    $("body").on("click",".actualizar_produto",function(){
         $("#modal_actualizar").html("");
        var  id_produto = $(this).attr("id_produto");
        var  designacao_produto = $(this).attr("designacao_produto");
        var  referencia_produto= $(this).attr("referencia_produto");
        $.post("",{want:"drogaria",data:"form_update_stock","id_produto":id_produto},function(resp){
           $("#modal_actualizar").html(resp);

        });       

    });

     $("body").on("click",".entrada_produto",function(){
       $("#modal_actualizar").html("");
        var  id_produto = $(this).attr("id_produto");  
        var  designacao_produto = $(this).attr("designacao_produto");
        var  referencia_produto= $(this).attr("referencia_produto");     
        $.post("",{want:"drogaria",data:"form_nova_entrada","id_produto":id_produto},function(resp){
            $("#modal_actualizar").html(resp);

        });    

    }); 

     $("body").on("click",".historico_produto",function(){
        $("#area_results").html("");
        var  id_produto = $(this).attr("id_produto");
        var  designacao_produto = $(this).attr("designacao_produto");
        var  referencia_produto= $(this).attr("referencia_produto"); 
        $.post("",{want:"drogaria",data:"historico_produto","id_produto":id_produto,
                        "designacao_produto":designacao_produto,"referencia_produto":referencia_produto},function(resp){
           $("#area_results").html(resp);
        });   

    });

    $("#actualizar_dados").on("click",function(){
      var designacao = $("#designacao").val();
      var referencia = $("#referencia").val();
      var quantidade = $("#quantidade").val();
      var preco_compra = $("#preco_compra").val();
      var preco_venda = $("#preco_venda").val();
      var categoria = $("#categoria").val();
      var id_produto = $("#id_produto").val();

       if(designacao==""){        
          $("#designacao").focus();
          alertify.error('insira a designacao do produto');
        }else if(referencia==""){
          $("#referencia").focus();
          alertify.error('insira a referencia do produto');
        }else if(quantidade==""){
          $("#quantidade").focus();
          alertify.error('insira a quantidade do produto');
        }else if(preco_compra==""){
          $("#preco_compra").focus();
          alertify.error('insira o preço de compra do produto');
        }else if(preco_venda==""){
          $("#preco_venda").focus();
          alertify.error('insira o preço de venda do produto');
        }else if(categoria=="opcao"){
          $("#categoria").focus();
          alertify.error('escolhe a categoria do produto');
        }else{
          var dados = {"id_produto":id_produto,"designacao":designacao,"referencia":referencia,
                 "quantidade":quantidade,"preco_compra":preco_compra,"preco_venda":preco_venda,
                 "categoria":categoria};
          $.post("",{want:"drogaria",data:"atualizar_stock","dados":dados},function(resp){           
            alert(resp);
          });       
        }
    });

        /*$("body").on("click",".crud",function(){  

           var id_produto = $(this).attr("id_produto");
           //alert(id_produto);
           $.post("",{want:"drogaria",data:"form_update_stock","id_produto":id_produto},function(resp){
                $("#area_results").html("");
                $("#area_results").html(resp);
           });

        });*/

	});   
</script>
