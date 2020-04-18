<?php 
	// Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'controllers/UserController.php';

    session_start();

    $user = new UserController();

    $data = json_decode(file_get_contents("php://input"));

    $res = $user->login($data->username, $data->password);

    if($res === false) {
        echo json_encode(
          array('message' => 'Failed to login')
        );
    } else {
        
        $_SESSION['Username'] = $res['Username'];
        $_SESSION['Type'] = $res['Type'];

        echo json_encode(
          array('message' => 'You logged in')
        );

    }
?>