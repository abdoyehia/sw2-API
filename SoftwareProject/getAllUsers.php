<?php 
	header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once 'controllers/AdminController.php';

    session_start();

    if(isset($_SESSION['Username'])) {
        if($_SESSION['Type'] == 0) {
            $admin = new AdminController();

            $result = $admin->getUsersList();

            if($result->rowCount() > 0) {
                $users = array();
                $users['data'] = array();
                
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                
                    $user = array(
                        'id' => $ID,
                        'username' => $Username,
                        'password' => '****',
                        'email' => $Email,
                        'type' => $Type,
                    );

                    // push to "data"
                    array_push($users['data'], $user);
                }

                // turn it to json & output
                echo json_encode($users);
            } else {
                echo json_encode(
                    array('message' => 'No users found')
                );
            }
        } else {
            echo json_encode(
                array('message' => "You're not an Admin to show all users")
            );
        }
    } else {
        echo json_encode(
            array('message' => "Login as an admin first")
        );
    }
?>