<?php 
	// Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'controllers/RegistrationController.php';

    $user = new RegistrationController();

    $data = json_decode(file_get_contents("php://input"));

    if($data->type < 1 || $data->type > 2) {
        echo json_encode(
          array('message' => 'Invalid data')
        );
    } else {
        if($user->signUp($data->username, $data->password, $data->email, $data->type)) {
            echo json_encode(
              array('message' => 'User Created')
            );
        } else {
            echo json_encode(
              array('message' => 'User Not Created')
            );
        }
    }
?>