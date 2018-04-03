<?php
    /* 
     * MVC - sample -benlitech
     * Login controller
     */
     
     //name-space (DAD)
     namespace BenliTech\LoginController;
     
     
    //home object to dispatch index
    class Login{
        private $views_path; //where are the views files
         
        function __construct (){
            $this->views_path = dirname(__FILE__) . '/../views/login.php';
        }
        //PEGAR FORM LOGIN
        public function index(){          
            include $this->views_path;
        }
		//ENTRAR
		public function entrar($uname, $pw, $db){ 
			       
            //echo 'User: '.$uname.' PW: '.$pw;
			$query = $db->query('SELECT * FROM `utilizador` WHERE `username` = ? AND `password` = ?', $uname, $pw);
			// $user = $query->fetchAll();
			$userArr = array();
			$num_rows = count($query);
			if($num_rows == 1){
				$tipo=$query[0]['tipo'];
				$nome=$query[0]['nome'];
				$id_user=$query[0]['id_user'];
				$username=$query[0]['username'];
				$password=$query[0]['password'];
				$_SESSION['nome'] = $nome;
				$_SESSION['tipo'] = $tipo;
				$_SESSION['id_user'] = $id_user;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;	
				$_SESSION['userId'] = $uname;
				$userArr[] = (
					array("res"=>"success","user"=>$uname) 
				);
				echo json_encode($userArr);
			}else{
				$userArr[]= (
					array("res"=>"error")  
				);
				echo json_encode($userArr);
			}
		}
		 //LOGOUT
		public function logout(){
			session_destroy();
			$userArr = array();
			$userArr[] = (
				array("res"=>"success")  
			);
			echo json_encode($userArr);
		}
     }
     