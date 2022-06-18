<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once "./Models/Client.php";

/***************************************************************************************/

class ClientController
{
    public function index()
    {
        $error = "";
        require_once __DIR__ . "/../views/client/SignUp.vue";
    }


    /***************************************************************************************/

    public function signup()
    {
        $signup = new Client();

        $email = $signup->check($_POST['email']);
        
        if ($email) {
            echo json_encode(array("message" => "Email already exist"));
            return;
        } 

        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        if ($row = $signup->signupClient($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["phone"], $password)) {
            if ($row) {

                echo json_encode(array("message" => "Register successfully","success"=>true, "data" => $row));
            } else {
                echo json_encode(array("message" => "error"));
            }
        } else {
            echo json_encode(['message' => 'Aucun User existe']);
        }
    }


    /***************************************************************************************/

    public function login()
    {
        $login = new Client();
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        if ($login->login($data)) {
            echo json_encode(['success' => 'Login successfully', 'client' => $login->login($data)]);
        } else {
            echo json_encode(['error' => 'Login failed']);
        }
    }

     /***************************************************************************************/

    // public function getOneUser($id_client){
    //     $user = new Client();
    //     $json =  json_encode($user->getOne($id_client));
    //     echo $json;
    // }

     /***************************************************************************************/

    public function contactUs(){
    //   $data = [
    //     'name' => $_POST['name'],
    //     'email' => $_POST['email'],
    //     'number' => $_POST['number'],
    //     'message' => $_POST['message'],
    //     'id_client' => $_POST['id_client']
    //   ];
      $data = json_decode(file_get_contents("php://input"));

      print_r($data);
      $client = new Client();
      $dataContact = [];
      if($data){
        $dataContact = [
                'name' => $data->name,
                'email' => $data->email,
                'number' => $data->number,
                'message' => $data->message,
                // 'id_client' => $data->id_client
        ];
      }


      if($dataContact){
        if ($client->contactUs($dataContact)) {
            echo json_encode(['success' => 'Message sent successfully']);
        } else {
            echo json_encode(['error' => 'Message failed']);
        }
    }
    }

  

    /***************************************************************************************/

        // public function AddToCart(){
        //     $data = json_decode(file_get_contents("php://input"));
        //     $client = new Client();
        //     $dataCart = [];
        //     if($data){
        //         $dataCart = [
        //                 'id_client' => $data->id_client,
        //                 'id_product' => $data->id_product,
        //                 'quantity' => $data->quantity
        //         ];
        //     }
        //     if($dataCart){
        //         if ($client->AddToCart($dataCart)) {
        //             echo json_encode(['success' => 'Product added successfully']);
        //         } else {
        //             echo json_encode(['error' => 'Product failed']);
        //         }
        //     }
        // }


        /***************************************************************************************/
    }
























