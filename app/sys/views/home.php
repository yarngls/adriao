<?php
    /* 
     * MVC - sample -benlitech
     * Home view
     */	 
    $nome = $_SESSION['nome'];
    $tipo=$_SESSION['tipo'];
    $id_user=$_SESSION['id_user'];
    $username=$_SESSION['username'];
   

?> 
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connstruções Adrião</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

     <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


      

    <style>
        /* Additional style to fix warning dialog position */
        #alertmod_table_list_2 {
            top: 900px !important;
        }
    </style>


	

<!--<div>
	<img src="img/ajax-loader.gif" class="loading-staff" id="loading-home">
</div>-->

<div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/perfil.jpg" style="width:6vw; height:5vh; " />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo  $nome ?></strong>
                             </span> <span class="text-muted text-xs block">Perfil <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li class="divider"></li>
                                <li><a href="#" id="logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li class="">
                        <a href="index.html"<i class="fa fa-home"></i> <span class="nav-label">Obra</span> <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li><a href="#" id="criar_nova_obra">Criar Obra</a></li>
                            <li> <button style="margin-left:3.8vw;" type="button" class="" data-toggle="modal" data-target="#myModalAderirObra">aderência a obra</button></li>
                        </ul>
                    </li>                   
                    <li>
                        <a href="#"><i class="fa fa-legal"></i> <span class="nav-label">Drogaria</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#" id="historico_vendas">Vendas</a></li>
                            <li><a href="#" id="historico_dividas">Dividas</a></li>
                            <li><a href="#" id="stock">Stock</a></li>
                            <li><a href="#" id="requisicoes">Requisições</a></li>
                            <li><a href="#">Anotações</a></li>
                        </ul>
                    </li>  
                    <li>
                        <a href="#"><i class="fa fa-legal"></i> <span class="nav-label">Cons. Adrião</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#" id="gestao_dividas">Gestão Dividas</a></li> 
                            <li><a href="#" id="agenda">Agenda</a></li> 

                        </ul>
                    </li>  
                    <li>
                        <a href="#"><i class="fa fa-legal"></i> <span class="nav-label">Madeira</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#" id="historico_venda_madeira">Vendas</a></li>
                            <li><a href="#" id="historico_dividas_madeira">Dividas</a></li>
                            <li><a href="#" id="stock_madeira">Stock</a></li>
                            <li><a href="#" id="requisicoes_madeira">Requisições</a></li>
                            <li><a href="#">Anotações</a></li>
                        </ul>
                    </li>         
                    
                    <li>
                        <a href="#" id="historico_aluguer_maquina"><i class="fa fa-cogs"></i> <span class="nav-label"> Maquina Carpintaria</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-car"></i> <span class="nav-label">Viaturas</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="">????</a></li>
                            <li><a href="">?????</a></li>
                            <li><a href="">????</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Estatistica</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="">????</a></li>
                            <li><a href="">????</a></li>

                        </ul>
                    </li>                   
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1" style="background-color:white;">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">               
                
                
            </ul>
            
        </nav>
        </div>
           
        <div class="row">
            <div class="col-lg-12" style="background-color:white;">

                

            <!-- inicio do Modal para aderir a obra-->
            <div class="modal fade" style="margin-top:20vh;" id="myModalAderirObra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Aderir a obra</h4>
                  </div>
                  <div class="modal-body">
                    <table>
                        <tr>
                            <td>
                                <label class=""  style="color:#2f4050; text-size:12;" >Nome acesso </label>
                            </td>
                            <td>
                                <input type="text" id="nome_acesso_aderir" style="margin-left: 2vw;" placeholder="nome acesso da obra" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" style="color:#2f4050; margin-top:2vh; ">Codigo acesso </label>
                            </td>
                            <td>
                                <input type="text" id="codigo_acesso_aderir" style="margin-left: 2vw; margin-top:2vh;" placeholder="codigo acesso da obra" class="form-control">
                            </td> 
                        </tr>
                  </table>
                   
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="aderir_obra" class="btn btn-primary">Aderir</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- fim do Modal para aderir a obra-->


            



                <div class="wrapper wrapper-content" id="area_results" style="">

                    <h1 style='margin-left:25vw;'>Notas Diarias</h1>                   
                </div>
               

                <div class="footer">
                   
                    
                </div>
            </div>
        </div>

        </div>
        <div style="color:white;">
                    <!--! area para footer -->
                        <strong>Copyright</strong> Gilson Santos &copy; 2015-2016
                    </div>
    </div>


      <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>

    <!---->

     <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    


<script>
        $(document).ready(function() {

        $("#gestao_dividas").on("click",function(){
            $("#area_results").html("");
            $("#area_results").html("<img src='img/ajax-loader.gif'>");
            $.post("",{want:"construcoes_adriao",data:"gestao_dividas"},function(resp){
                setTimeout(function(){
                    $("#area_results").html(resp);  
                },1000);
            });
            
        });


         $.post("",{want: 'agenda', data: 'caregar_agenda'}, function(resp){
                $("#area_results").html("");
                $("#area_results").html("<img src='img/ajax-loader.gif'>");
                    setTimeout(function(){
                        $("#area_results").html(resp);  
                    },1000);
            });

            $("#agenda").on("click",function(){
                $("#area_results").html("");
                $.post("",{want:"agenda",data:"caregar_agenda"},function(resp){
                    $("#area_results").html("<img src='img/ajax-loader.gif'>");
                    setTimeout(function(){
                         $("#area_results").html(resp);
                    },1000);

               });
            });

        	$('#logout').click(function(){
			         $.post("",{want: 'logout', data: ''}, function(login){
				// alertify.alert(login);
				var result = eval(login);
				if(result[0].res == 'success'){
					alertify.success('Logout bem sucedido');
					setTimeout(function(){
						window.location.href = '';
					},200);
				}else{
					alertify.error('Erro ao efectuar o logout');
				}
			});
		});


            /*setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            }, 1300);*/

            $("#requisicoes").on("click",function(){
                $("#sub_menus").html("");
                $("#area_results").html("");
               $.post("",{want:"drogaria",data:"historico_requisicoes"},function(resp){             
                    $("#area_results").html(resp);                 
                });
            }); 

            $("#historico_dividas").on("click",function(){         

                $("#sub_menus").html("");
                $("#area_results").html("");
                $.post("",{want:"drogaria",data:"historico_dividas"},function(resp){                    
                   $("#area_results").html(resp);                 
                });
                
            });

             $("#stock").on("click",function(){
                $("#sub_menus").html("");
                $("#area_results").html("");
                var categoria="electricidade";
               $.post("",{want:"drogaria",data:"menu_drogaria","categoria":categoria},function(resp){
                    $("#area_results").html(resp);                 
                });
           }); 

           $("#vendas_drogaria").on("click",function(){
                $('#lista_resultado_referencia').html("");
                $("#sub_menus").html("");
                $("#area_results").html("");
                $.post("",{want:"drogaria",data:"form_vendas"},function(resp){
                    $("#area_results").html(resp);                 
                });
           });

           $("#historico_vendas").on("click",function(){
         
                $("#area_results").html("");
                $.post("",{want:"drogaria",data:"historico_vendas"},function(resp){
                    $("#area_results").html(resp);                 
                });
           });  

           $("#historico_aluguer_maquina").on("click",function(){
                $("#area_results").html("");
                $.post("",{want:"drogaria",data:"menu_maquina_carpintaria"},function(resp){
                    $("#area_results").html(resp);                 
                });
           });  

          /*   ---------------------- Inicio funcionaidades de obra ---------------------------------*/

           $("#criar_nova_obra").on("click",function(resp){
                 $("#area_results").html("");
                 $.post("",{want:"drogaria",data:"form_registar_obra"},function(resp){
                    $("#area_results").html(resp);                 
                });
           }); 

           $("#aderir_obra").on("click",function(resp){
                var nome_acesso_aderir = $("#nome_acesso_aderir").val();
                var codigo_acesso_aderir = $("#codigo_acesso_aderir").val();

                if(nome_acesso_aderir==""){               
                    $("#nome_acesso_aderir").focus();
                    alertify.error('insira o nome acesso a obra');
                }else if(codigo_acesso_aderir==""){             
                    $("#codigo_acesso_aderir").focus();
                    alertify.error('insira o codigo acesso a obra');
                }else{
                    var dados = {"nome_acesso":nome_acesso_aderir,"codigo_acesso":codigo_acesso_aderir};

                    $.post("",{want:"drogaria",data:"aderir_obra","dados":dados},function(resp){
                            $("#area_results").html(resp);                         
                            //$("#myModalAderirObra").hide();
                            $("#nome_acesso_aderir").val("");
                            $("#codigo_acesso_aderir").val("");
                            $("#myModalAderirObra").modal('hide');
                    }) ;                   
                }
           });

          /*----------------------------  Fim funcionalidades de obra ---------------------------------*/   

          /*----------------------------  inicio funcionalidades de madeira ---------------------------------*/ 

            $("#historico_venda_madeira").on("click",function(){
                $("#area_results").html("");
                $.post("",{want:"madeira",data:"historico_venda_madeira"},function(resp){
                    $("#area_results").html(resp);
                });
                return false;
            });

            $("#stock_madeira").on("click",function(){
                $("#area_results").html("");
                $.post("",{want:"madeira",data:"stock_madeira"},function(resp){
                    $("#area_results").html(resp);
                })
                return false;
            });
          /*----------------------------  fim funcionalidades de madeira ---------------------------------*/        

        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-4625583-2', 'webapplayers.com');
        ga('send', 'pageview');

    </script>