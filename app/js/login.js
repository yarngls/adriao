/*  */
$(document).ready(function(){
	//LOGIN
	$('#submit-login').click(function(){
		if($('#user-name').val()==""){
			$('#user-name').focus();
			alertify.error('Entre o seu utilizador');
		}else if($('#user-pass').val()==""){
			$('#user-pass').focus();
			alertify.error('Entre o seu password');
		}else{
			$.post("",{want: 'entrar', data: $('#user-name').val()+'&'+$('#user-pass').val()}, function(login){				
				var result = JSON.parse(login);
				if(result[0].res == 'success'){
					alertify.success('Login bem sucedido '+result[0].user);
					setTimeout(function(){
						window.location.href = '';
					},200);
				}else{
					alertify.error('Erro ao efectuar o login');
				}
			});
		}				
	});
	//LOGIN USING ENTER
	$('#user-name,#user-pass').keypress(function(e){
		if (e.which == '13'){
			if($('#user-name').val()==""){
				$('#user-name').focus();
				alertify.error('Entre o seu utilizador');
			}else if($('#user-pass').val()==""){
				$('#user-pass').focus();
				alertify.error('Entre o seu password');
			}else{
				$.post("",{want: 'entrar', data: $('#user-name').val()+'&'+$('#user-pass').val()}, function(login){
					
					var result = JSON.parse(login);
					if(result[0].res == 'success'){
						alertify.success('Login bem sucedido');
						setTimeout(function(){
						window.location.href = '';
					},200);
					}else{
						alertify.error('Erro ao efectuar o login');
					}
				});
			}
		}
	});
});
	
	
	
	