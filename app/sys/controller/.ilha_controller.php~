<?php
    /**
     * MVC samples - benlitech
     * Ilha Controller
     */
     
     
     namespace BenliTech\IlhaController;
     
     
     class Ilhas{
            private $ilhas = Array();
            
            function __construct(){
                $tmp_ilhas = Array( 
                                    Array("n" => "Santo Antão", 'i' => 1), 
                                    Array("n" => "São Vicente", 'i' => 2), 
                                    Array("n" => "São Nicolau", 'i' => 3), 
                                    Array("n" => "Sal", 'i' => 4), 
                                    Array("n" => "Boa Vista", 'i' => 5), 
                                    Array("n" => "Maio", 'i' => 6), 
                                    Array("n" => "Santiago", 'i' => 7), 
                                    Array("n" => "Fogo", 'i' => 8), 
                                    Array("n" => "Brava", 'i' => 9)
                            );
                                    
                //copiar ilhas
                $this->ilhas = $tmp_ilhas;
            }
            
            
            //give ilha
            function getIlhas(){
                return json_encode($this->ilhas);
            }
     }
