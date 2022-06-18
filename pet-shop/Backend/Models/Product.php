<?php

require_once "../Backend/DataBase/DB.php";

class Product extends DB
{

    public function readBycategoryName($category_name)
    {

        $query = "SELECT * FROM `product` WHERE product.category_name = ?";

        $log = $this->connect()->prepare($query);
        if ($log->execute([$category_name])) {

            $row = $log->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } else { 
            return false;
        }
    }
    /***************************************************************************************/

    public function read()
    {

        $query = "SELECT * FROM `product`";
        $log = $this->connect()->prepare($query);
        if ($log->execute()) {

            $row = $log->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
    /***************************************************************************************/
    public function readSingle($id)
    {
        $query = "SELECT * FROM `product` WHERE id = ? ";
        $log = $this->connect()->prepare($query);
        $log->bindParam(1, $id);
        if ($log->execute()) {

            $row = $log->fetch(PDO::FETCH_OBJ);
            return $row;
        } else {
            return false; 
        }
    }

    
    /***************************************************************************************/
 
    public function create($data)
    {
        $query = "INSERT INTO `product`( `name`, `price`, `quantity`, `image`, `details`,`category_name`) VALUES ('$data[name]','$data[price]','$data[quantity]','$data[image]','$data[details]','$data[category_name]')";

        $log = $this->connect()->prepare($query);
        if ($log->execute()) {

            return true;
        } else {
            return false;
        }
    }
    /***************************************************************************************/

    public function update($name, $price, $quantity, $image, $details, $category_name, $id)
    {
        $query = "UPDATE `product` SET `name`='$name',`price`='$price',`quantity`='$quantity',`image`='$image',`details`='$details',`category_name`='$category_name' WHERE id = $id";
        $log = $this->connect()->prepare($query);
        if ($log->execute()) {

            return true;
        } else {
            return false;
        }
    }

    /***************************************************************************************/

    public function delete($id)
    {
        $sql = "DELETE FROM `product` WHERE id = ? ";

        $log = $this->connect()->prepare($sql);
        return $log->execute([$id]);
    }

    public function GetOneProduct($id)
    {
        $query = "SELECT * FROM product WHERE id = $id";
        $log = $this->connect()->prepare($query);
        $log->execute();
        $res = $log->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    
    
}
 