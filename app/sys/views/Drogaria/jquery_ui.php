				$(function(){
					$( "#dialog-confirm" ).attr("title","Aviso");
					$( "#dialog-confirm" ).html("Desejas continuar com o registo?");
				    $( "#dialog-confirm" ).dialog({
					    resizable: false,
					    height:140,
					    modal: true,
					    buttons: {
					        "SIM": function(){	
					            $( this ).dialog("close");
					            $(function(){
					           		$("#dialog-message").attr("title","Sucesso").css("color","green");
					           		$("#dialog-message").html("Registado com sucesso");
								    $("#dialog-message" ).dialog({
								        modal: true,
								        buttons: {
									        Ok: function(){						        	
									        	$( this ).dialog( "close" );
									        }
								        }
								    });
								});
					        },
					        NÃO: function(){
					        	$( this ).dialog("close");
					        	$(function(){
					           		$("#dialog-message").attr("title","Cancelado").css("color","green");
					           		$("#dialog-message").html("<label style='color:red'>"+'O registo foi cancelado'+"</label>");
								    $("#dialog-message" ).dialog({
								      	modal: true,
								      	buttons: {
									        Ok: function() {						        	
									         	$( this ).dialog( "close" );
									        }
								      	}
								    });
								});
					        }
				      	}
				    });
				});
				.css("font-family","Calibri").css("font-size","12")