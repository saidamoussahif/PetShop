<?php

require_once "./DataBase/DB.php";

 class Admin extends DB{

   public function login($data){

       $sql="SELECT * FROM `admin` WHERE email=?";
       $sql=$this->connect()->prepare($sql);
        $sql->execute([$data['email']]);
        $res = $sql->fetch(PDO::FETCH_ASSOC);
        if($res){
            if(password_verify($data['password'],$res['password'])){
                unset($res['password']);
                return $res;
            }else{
                return false;
            }
        }else{
            return false;
        }
      
   }

     /***************************************************************************************/

    public function signup($email,$password){
        $sql="INSERT INTO `admin`(`email`, `password`) VALUES (?,?)";
        $sql=$this->connect()->prepare($sql);
        $sql->execute([$email,$password]);
        if($sql){
            return true;
        }else{
            return false;
        }
    }
 }