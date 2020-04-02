<?php 
	header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once 'controllers/AdminController.php';

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
?>
