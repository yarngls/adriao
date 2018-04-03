<?php
    /* 
     * MVC - sample -benlitech
     * Login view
     */
?>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

<script type="text/javascript" src="js/login.js"></script>
<!--<div id="login-header-bar"></div>
<div id="area-login">
	<div id="title-area-login">LOGIN</div>
	<form id="login-form" method="post">
		<label for="user-name">Utilizador:</label><br>		
		<img src="img/uname.png" id="uname-img" class="ltl-icon">
		<input type="text" class="login-input-box" id="user-name" name="user-name" placeholder="Digite seu utilizador."><br><br><br>
		<label for="user-pass">Password:</label><br>
		<img src="img/pw.png" id="pw-img" class="ltl-icon">
		<input type="password" class="login-input-box" id="user-pass" name="user-pass" placeholder="Digite o seu password."><br><br><br>
		<input type="button" class="submit-button" id="submit-login" value="Login">
	</form>
</div>-->
<div class="middle-box text-center loginscreen  animated fadeInDown" style="background-color:white; margin-top:-30vh; width:30vw;";>
        <div>
            <div>

                <h1 class="logo-name"><span style="margin-left:0vw; margin-top:60vh;"><img src="img/log_adriao.png"></span></h1>

            </div>
          
            <form class="m-t" role="form" action="index.html" >
                <div class="form-group">
                    <input type="text" class="form-control" style="width:20vw; margin-left:4vw;" id="user-name" name="user-name" placeholder="Digite seu utilizador" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" style="width:20vw; margin-left:4vw;" id="user-pass" name="user-pass" placeholder="Digite o seu password." required="">
                </div>
                
                <button type="button" style="width:10vw; margin-top:4vh; margin-left:-2vh;" id="submit-login" class="btn btn-primary">Login</button><br>
                <a href="#"><small>Forgot password?</small></a>
               
            </form>
           
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
