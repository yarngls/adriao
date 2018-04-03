/*  */

    $(function(){
        //find object to push ilha
        $getilha = $('#getilha');        
        /*/exists?
        if( $getilha.length ){
            $( $getilha ).click(function(){
                
                $.post("", {want: 'ilha', data: 'list'}, function( ilhas ){
                    $('#ul_ilhas').remove();
                    
                    if(ilhas !== null){
                        ul = document.createElement('ul');
                        ul.id = "ul_ilhas";
                        ilhas = eval(ilhas); //convert to object (jquery);
                        for(ilha in ilhas){
                            li = document.createElement('li');
                            $(li).attr('data-id', ilhas[ilha].i); //get ilha id
                            $(li).text(ilhas[ilha].n); //ilha name
                            
                            $(ul).append( li );
                        }
                        
                        //has data
                        if(ilhas.length){
                            $(document.body).append( ul );
                        }
                    }
                    
                })
            })
        }*/		
		
	}); 
	
	
	
	