<?php
require_once __DIR__ . "/../Models/Product.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class ProductController
{
    public function read()
    {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $product = new Product();
            $result = $product->read();
            if ($result) {

                echo json_encode($result);
            } else {
                echo json_encode(['message' => 'no product exist']);
            }
        } else {
            echo json_encode(['message' => 'change the method']);
        }
    }
    /***************************************************************************************/
    
    public function readSingle($id)
    {    
            $rdv = new Product();
            // die(md5($id));
            $rslt = $rdv->readSingle($id);
            
            if ($rslt) {

                echo json_encode($rslt);
            } else {
                echo json_encode(['message' => 'No product exist']);
            }
    }
    /***************************************************************************************/

    public function readBycategoryName()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $product = new Product();

            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            $host = explode('/', $actual_link);

            $urlParametre = end($host);


            $results = $product->readBycategoryName($urlParametre);

            if ($results) {
 
                echo json_encode($results);
            } else {
                echo json_encode(['message' => 'there is no product in this category yet']);
            }
        }
    }

    /***************************************************************************************/
    public function countProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $product = new Product();
            $result = $product->countProduct();
            if ($result) {

                echo json_encode($result);
            } else {
                echo json_encode(['message' => 'no product exist']);
            }
        } else {
            echo json_encode(['message' => 'change the method']);
        }
    }
    /***************************************************************************************/

    public function create()
    {

        $product = new Product();
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        // $folder =  dirname(__DIR__). "/../../src/uploads_images/" . $filename;
        $folder =  "C:/xampp/htdocs/fil-rouge/pet-shop/src/uploads_images/" . $filename;
        move_uploaded_file($tempname, $folder);
        // $image = $_FILES['image'];
        // var_dump($image);
        // $extention = pathinfo($image["name"], PATHINFO_EXTENSION);
        // $new_name = uniqid('', true) . '.' . $extention;
        // $target = "../../src/uploads_images" . $new_name;
        // move_uploaded_file($image['tmp_name'], $target);

        $data = array( 
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity'],
            'image' => $filename,
            'details' => $_POST['details'],
            'category_name' => $_POST['category_name']
        );
    
        if ($product->create($data)) {
            echo json_encode(['message' => 'Product created']);
        } else {
            echo json_encode(['message' => 'Product not created']);
        }
    }

    /***************************************************************************************/

    public function update()
    {
        $product = new Product();
        $image = $_FILES['image'];
        $extention = pathinfo($image["name"], PATHINFO_EXTENSION);
        $new_name = uniqid('', true) . '.' . $extention;
        $target = "C:\xampp\htdocs\fil-rouge\pet-shop\public\uploads/" . $new_name;
        move_uploaded_file($image['tmp_name'], $target);

        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $image = $new_name;
        $details = $_POST['details'];
        $category_name = $_POST['category_name'];
        $id = $_POST['id'];

        if ($product->update($name, $price, $quantity, $image, $details, $category_name, $id)) {
            echo json_encode(['message' => 'Product updated']);
        } else {
            echo json_encode(['message' => 'Product not updated']);
        }
    }

    /***************************************************************************************/

    public function delete($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $product = new Product();
            // $id = $_POST['id'];
            if ($product->delete($id)) {
                echo json_encode(['message' => 'Product deleted']);
            } else {
                echo json_encode(['message' => 'Product not deleted']);
            }
        }
    }
}
