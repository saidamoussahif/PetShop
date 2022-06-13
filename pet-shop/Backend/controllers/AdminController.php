<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


require_once "./Models/Admin.php";

class AdminController
{
 
    public function login()
    {
        $login = new Admin();
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        if ($login->login($data)) {
            echo json_encode(['success' => 'Login successfully', 'admin' => $login->login($data)]);
        } else {
            echo json_encode(['error' => 'Login failed']);
        }
    }
    // public function signup()
    // {



    //     // $data = json_decode(file_get_contents("php://input"));
    //      $signup = new Admin();
    //     $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //     // if ($password != null) {
    //         if ($row = $signup->SignUp($_POST["email"],$password)) {
    //             if ($row) {
                
    //                 echo json_encode(array("message" => "Connecte", "data" => $row));
    //             } else {
    //                 echo json_encode(array("message" => "erreur"));
    //             }
    //         } else {
    //             echo json_encode(['message' => 'Aucun Patient existe']);
    //         }
    //     // }
    // }
}
