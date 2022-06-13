<?php

require_once "../Backend/DataBase/DB.php";

class Orders extends DB
{
    public function read()
    {
        
            $query = "SELECT * FROM `orders`";
            $log = $this->connect()->prepare($query);
           $log->execute();
           if( $log->rowCount() > 0){

                $row = $log->fetchAll(PDO::FETCH_ASSOC);
                return $row ;
            }else{
                return false ; 
            }
            }
            

    
            /***************************************************************************************/
            
    public function delete($id)
    {
        $sql = "DELETE FROM `orders` WHERE id = ? ";

        $log = $this->connect()->prepare($sql);
        return $log->execute([$id]);
    }
      
   



    
  




   
}







?>