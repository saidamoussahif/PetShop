<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


require_once "./Models/Cart.php";

class CartController
{
 
    public function addToCart()
    {
        $data =[
            'id_product' => $_POST['id_product'],
            'id_client' => $_POST['id_client'],
            'quantity' => $_POST['quantity']
        ];
        $client = new Cart();
        if($client->addToCart($data)){
            echo json_encode(['success' => 'Product added to cart successfully']);
        }else{
            echo json_encode(['error' => 'Product failed to add to cart']);
        }
    }

    public function read($id)
    { 
        $client = new Cart();
        $res = $client->readCart($id);
        echo json_encode($res);
    }

    public function getAll()
    {
        $cartItems = new Cart();
        $cartItems = $cartItems->getAll();
        echo json_encode($cartItems);
    }

    public function delete(){
        $id = $_POST['id'];
        $cart = new Cart();
        if($cart->delete($id)){
            echo json_encode(['success' => 'Product deleted successfully']);
        }else{
            echo json_encode(['error' => 'Product failed to delete']);
        }
    }
    
}
