<?php
include_once 'models/Admin.php';

class AdminController {

	// Get all users
	public function getUsersList() {
		$usersList = Admin::getAllUsers();
		return $usersList;
	}

	// Upgrade user
	public function upgradeUser($userid) {
		$upgrade = Admin::upgrade($userid);
		return $upgrade;
	}
}

?>