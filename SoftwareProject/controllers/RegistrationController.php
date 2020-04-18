<?php 
include_once 'models/NormalUser.php';
include_once 'models/StoreOwner.php';
include_once 'models/UserInfo.php';

class RegistrationController {

	public function signUp($username, $password, $email, $type) {
		if(UserInfo::getUser($username, $email)->rowCount() > 0) {
			return false;
		} else {
			$user = new UserInfo();
			$user->username = $username;
			$user->pass = $password;
			$user->email = $email;
			$user->type = $type;

			$user->save();
			return true;
		}
	}
	
}

?>