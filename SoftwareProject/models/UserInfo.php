<?php
include_once 'Connection.php';

class UserInfo {
	// attributes
	public $userid;
	public $username;
	public $pass;
	public $email;
    public $type;

    public static function getUser($username) {
        $con = Connection::connect();

        $query = 'SELECT * FROM users WHERE Username = :username LIMIT 1';
        $stmt = $con->prepare($query);
        $stmt->execute(array(
            ':username' => $username
        ));
        return $stmt;
    }

    public function save() {
        $con = Connection::connect();

        $query = 'INSERT INTO users(Username, Password, Email, Type) VALUES(:username, :password, :email, :type)';
        $stmt = $con->prepare($query);
        $stmt->execute(array(
            ':username' => $this->username,
            ':password' => $this->pass,
            ':email' => $this->email,
            ':type' => $this->type
        ));
        return $stmt;
    }
}

?>