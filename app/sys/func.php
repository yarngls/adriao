<?php
 /**
  * MVC - Sample functions - benlitech
  */
    function show_head(){
    ?> 
        <html>
            <head>
                <title>BenliTech</title>
				<meta charset="UTF-8">
				<link rel="shortcut icon" type="image/x-icon" href=""/>
				<link rel="stylesheet" type="text/css" href="css/nos.css"/>
				<link rel="stylesheet" href="css/alertify.core.css"/>
				<link rel="stylesheet" href="css/alertify.default.css"/>
                <script type="text/javascript" src="js/jquery.1.9.min.js" language="javascript"></script>
				<script type="text/javascript" src="js/alertify.min.js" language="javascript"></script>
                <script type="text/javascript" src="js/nos.js" language="javascript"></script>
            </head>
            <body>			
    <?php	 
		if(isset($_SESSION['userId'])==true){
	?>
			<script type="text/javascript" language="javascript">
				$(document).ready(function(){
					setTimeout(function(){
						// $.post("",{want: 'home', data: ''}, function(login){
							// // alert(login);
							// $('body').html(login);
						// });
					},200);
				});
			</script>
	<?php
			 
		 }else{
	?>
		<script type="text/javascript" language="javascript">
			$(document).ready(function(){
				setTimeout(function(){
					$.post("",{want: 'login', data: ''}, function(login){
						// alert(login);
						$('body').html(login);
					});
				},200);
			});
		</script>
	<?php
		 } 
    }    
    function show_foot(){
    ?>
        </body>
        </html>
    <?php
    }
    
    //include controller
    function LoadController($name){
        $controller_path = dirname(__FILE__) . "/controller/";
        $controller = $controller_path . $name . "_controller.php";
        // echo $controller_path;
        if( file_exists( $controller )){
            include_once( $controller );
        }
        
    }
    
  
  
?>
  
  
  
  