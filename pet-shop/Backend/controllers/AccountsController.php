
<?php
require_once __DIR__ . "/../Models/Accounts.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class AccountsController
{
    public function read()
    {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $product = new Accounts();
            $result = $product->displayClients();
            if ($result) {

                echo json_encode($result);
            } else {
                echo json_encode(['message' => 'no account exist']);
            }
        } else {
            echo json_encode(['message' => 'change the method']);
        }
    }
}