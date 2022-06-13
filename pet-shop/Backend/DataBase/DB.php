<?php 

class DB{
    protected $host ='localhost';
    protected $dbname='fil-rouge';
    protected $username='root';
    protected $password='';
    
    public function Connect(){

        try{
            
            $conn=new PDO("mysql:host=localhost;dbname=fil-rouge","root",""); 
            return $conn; 
           }
           catch (PDOException $e){
            echo $e->getMessage();
            }
           
    }
}
?>