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

	public static function upgrade($UserID) {
		$con = Connection::connect();
		$query = 'UPDATE users SET Type = ? WHERE ID = ? AND Type != 0';
		$stmt = $con->prepare($query);
		$stmt->execute(array(0, $UserID));
		return $stmt;
	}
}

?>