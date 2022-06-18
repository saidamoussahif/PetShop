<?php

require_once "./DataBase/DB.php";

 class Cart extends DB{
    /***************************************************************************************/
    public function addToCart($data){
        
        $query = "INSERT INTO `mycartitems` (`id_client`, `id_product`, `quantity`) VALUES (:id_client, :id_product, :quantity)";
        $log = $this->Connect()->prepare($query);
        $log->bindParam(':id_client', $data['id_client']);
        $log->bindParam(':id_product', $data['id_product']);
        $log->bindParam(':quantity', $data['quantity']);
        if($log->execute()){
            return true;
        }else{  
            return false;
        }
        
    }
    public function readCart($id_client)
    {

        $query = "SELECT c.id,p.name,p.price,p.quantity,p.image,p.details,c.quantity FROM product p,mycartitems c where c.id_product=p.id and c.id_client=?";
        $log = $this->Connect()->prepare($query);
        $log->execute([$id_client]);
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }
    public function getAll()
    {

        $query = "SELECT * FROM `mycartitems`";
        $log = $this->Connect()->prepare($query);
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }
    public function delete($id)
    {
        $query = "DELETE FROM `mycartitems` WHERE `id` = ?";
        $log = $this->Connect()->prepare($query);
        $log->execute([$id]);
        if($log->rowCount()){
            return true;
        }else{
            return false;
        }
    }

 }

 

