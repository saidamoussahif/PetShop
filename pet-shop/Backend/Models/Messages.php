<?php

require_once "../Backend/DataBase/DB.php";

class Messages extends DB
{
    public function getMessageByClient()
    {
        
        $query = "SELECT COUNT(*) as number FROM message WHERE id_client=?";
        $log = $this->connect()->prepare($query);
        if ($log->execute([$_SESSION['id']])) {
            $row = $log->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
                
            /***************************************************************************************/
            
    public function delete($id)
    {
        $sql = "DELETE FROM `message` WHERE id = ? ";

        $log = $this->connect()->prepare($sql);
        return $log->execute([$id]);
    }
      
   



    
  




   
}







?>