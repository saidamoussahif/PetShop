<?php
require_once "./DataBase/DB.php";
class Client extends DB
{
    public function check($email)
    {
        $query = "SELECT * FROM `client` WHERE  email='$email'";
        $log = $this->Connect()->prepare($query);
        $log->execute();
        $res = $log->fetch(PDO::FETCH_ASSOC);
        return $res;
    } 

/***************************************************************************************/

    public function signupClient($firstname, $lastname, $email, $phone, $password)
    {
        $query = "INSERT INTO `client`(`firstname`, `lastname`, `email`, `phone`, `password`) VALUES (:firstName, :lastName, :email, :phone, :password)";
        $log = $this->Connect()->prepare($query);
        $log->bindParam(':firstName', $firstname);
        $log->bindParam(':lastName', $lastname);
        $log->bindParam(':email', $email);
        $log->bindParam(':phone', $phone);
        $log->bindParam(':password', $password);
        $log->execute();
    
        return true;
    }

    /***************************************************************************************/

    public function login($data){

        $sql="SELECT * FROM `client` WHERE email=?";
        $sql=$this->connect()->prepare($sql);
         $sql->execute([$data['email']]);
         $res = $sql->fetch(PDO::FETCH_ASSOC);
         if($res){
             if(password_verify($data['password'],$res['password'])){
                 return $res;
             }else{
                 return false;
             }
         }else{
             return false;
         }
         return $res;
       
    }

    // public function getOne($id_client){
    //     $query = "SELECT  * FROM `client` WHERE id_client=?";
    //     $log = $this->Connect()->prepare($query);
        
    //     $log->execute([$id_client]);
    //     $res = $log->fetch(PDO::FETCH_ASSOC);
    //     return $res;

    // }

    /***************************************************************************************/

    public function contactUs( $data){
        $query = "INSERT INTO `message` (`name`, `number`, `email`, `message`) VALUES (:name, :number, :email, :message )";
        $log = $this->Connect()->prepare($query);
        $log->bindParam(':name', $data['name']);
        $log->bindParam(':number', $data['number']);
        $log->bindParam(':email', $data['email']);
        $log->bindParam(':message', $data['message']);
        // $log->bindParam(':id_client', $data['id_client']);
        $log->execute();
    
        return true;
    }

    
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
    /***************************************************************************************/
    
    public function displayCart($id_client)
    {
        $query = "SELECT * FROM `orders` WHERE id_client=?";
        $log = $this->Connect()->prepare($query);
        $log->execute([$id_client]);
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    
    /***************************************************************************************/
    
    public function deleteCart($id_cart)
    {
        $query = "DELETE FROM `orders` WHERE id_cart=?";
        $log = $this->Connect()->prepare($query);
        $log->execute([$id_cart]);
        return true;
    }
    
    /***************************************************************************************/
    
    public function updateCart($id_cart, $quantity)
    {
        $query = "UPDATE `orders` SET `quantity`=:quantity WHERE id_cart=:id_cart";
        $log = $this->Connect()->prepare($query);
        $log->bindParam(':quantity', $quantity);
        $log->bindParam(':id_cart', $id_cart);
        $log->execute();
        return true;
    }
    
    /***************************************************************************************/
    
    // public function displayOrders($id_client)
    // {
    //     $query = "SELECT * FROM `



















}




