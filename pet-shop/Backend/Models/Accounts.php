<?php

require_once "../Backend/DataBase/DB.php";

class Accounts extends DB
{
 
    public function displayClients()
    {
        $query = "SELECT * FROM `client`";
        $log = $this->connect()->prepare($query);
        if ($log->execute()) {

            $row = $log->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        } 
    }


}


?>
