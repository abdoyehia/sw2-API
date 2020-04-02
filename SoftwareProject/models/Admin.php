<?php
include_once 'UserInfo.php';
include_once 'Connection.php';

class Admin {
	public $admin;

	public function __construct() {
		$this->admin = new UserInfo();
	}

	public static function getAllUsers() {
		$con = Connection::connect();

		$query = 'SELECT * FROM users';
		$stmt = $con->prepare($query);
		$stmt->execute();
		return $stmt;
	}
}

?>