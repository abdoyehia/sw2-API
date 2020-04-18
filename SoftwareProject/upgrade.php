<?php 
	// Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'controllers/AdminController.php';

    session_start();

    if(isset($_SESSION['Username'])) {
        if($_SESSION['Type'] == 0) {

            $data = json_decode(file_get_contents("php://input"));

            $admin = new AdminController();

            $result = $admin->upgradeUser($data->UserID);

            if($result->rowCount() > 0) {
                echo json_encode(
                    array('message' => 'Upgraded')
                );
            } else {
                echo json_encode(
                    array('message' => 'Not upgraded')
                );
            }
        } else {
            echo json_encode(
                array('message' => "You're not an Admin to upgrade users")
            );
        }
    } else {
        echo json_encode(
            array('message' => "Login as an admin first")
        );
    }
?>