<?php
require_once __DIR__ . "/../Models/Messages.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
class MessageController
{

    /***************************************************************************************/

   
    /***************************************************************************************/

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $message = new Messages();
            $id = $_POST['id'];
            if ($message->delete($id)) {
                echo json_encode(['message' => 'order deleted']);
            } else {
                echo json_encode(['message' => 'order not deleted']);
            }
        }
    }
}
