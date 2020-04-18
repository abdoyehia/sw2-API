<?php 
include_once 'models/UserInfo.php';
include_once 'models/NormalUser.php';
include_once 'models/StoreOwner.php';
include_once 'models/Admin.php';

class UserController {
	public function login($username, $password) {
		$statment = UserInfo::getUser($username);
		$user = $statment->fetch();

		if($statment->rowCount() < 1) {
			return false;
		} else {
			if($user['Password'] != $password) {
				return false;
			} else {
				return $user;
			}
		}
	}
}

?>