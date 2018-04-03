<?php
/**
 *---------------------------------------------------------------
 * Sa2Br.com - Edson Martins Database object
 *---------------------------------------------------------------
 *
 * @AUTHOR: Edson Martins facebook.com/proffi or propiebis@gmail.com
 * @copyright @author
 */
 
namespace BenliTech\db;
use PDO;

class DBTools{
    private $con = null; //connection
    private $database = '920242';//databaseHERE
    private $username = '920242';
    private $password = 'adriao02015';
    private $hostname = '127.0.0.1';
    
    function __construct(){  
        if($this->con == null){
            try{
                // connect to database
                if($this->con == null){
                
                    //pdo options
                    $options = array(
                        PDO::ATTR_PERSISTENT    => true,
                        PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => true
                    );
                    
                    //create instance
                    $this->con = new PDO("mysql:dbname=" . $this->database. ";host=" . $this->hostname, $this->username, $this->password, $options);
                    
                }
            }
            catch (PDOException $e){
                // trigger (big, orange) error
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }
        
      return $this->con;
    }
    
    /**
    "$db = new DBTools(); $res = $db->query('select name from tb_user where id = ?, ilha=?', 23,2);
    "if ($res !== false){}"
    */
    function query(/* $sql , array_params*/){
      // SQL statement
      $sql = func_get_arg(0);
      // parameters, if any
      $parameters = array_slice(func_get_args(),1);
      
      try{
            
            
            if ($this->con != null){            
                    // prepare SQL statement
                    $statement = $this->con->prepare($sql);                    
                    if ($statement === false){
                        // trigger (big, orange) error
                        $arr = $this->con->errorInfo();
                        trigger_error($arr[2], E_USER_ERROR);                
                        exit;
                    }

                    // execute SQL statement  
                    $results = $statement->execute($parameters);
                     // return result set's rows, if any or false if none
                        
                    if ($results !== false){  
                        $select = strpos($sql, 'SELECT'); 
                        
                        //fetch only if selecting
                        if($select !== false)
                             return $statement->fetchAll(PDO::FETCH_ASSOC); 
                            
                        return $statement->rowCount(); //affected rows (DELETE, UPDATE)
                    }
                                   
            }
            
       }catch(PDOException $e){ 
                // trigger (big, orange) error
               return false;
       }
       
       //error?
       return false; 
    }        
};