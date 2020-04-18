<?php 
	header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    session_start();

    if(!isset($_SESSION['Username'])){
        echo json_encode(
            array('message' => 'You are not logged in to logged in to log out!')
        );
    } else {
        session_destroy();

        echo json_encode(
            array('message' => 'You logged out')
        );
    }

?>