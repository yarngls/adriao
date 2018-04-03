<?php
    /* 
     * MVC - sample -benlitech
     * Home controller
     */
     
     //name-space (DAD)
     namespace BenliTech\HomeController;
     
     
     //home object to dispatch index
     class Home{
         private $views_path; //where are the views files
         
         function __construct (){
            $this->views_path = dirname(__FILE__) . '/../views/home.php';
         }
         
         public function index($data){ 
         
            include $this->views_path;
         }
     }
     
     
