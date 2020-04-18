<?php
include_once 'Connection.php';

class UserInfo {
	// attributes
	public $userid;
	public $username;
	public $pass;
	public $email;
    public $type;

    public static function getUser($username, $email = null) {
        $con = Connection::connect();

        $orStatment = '';
        if($email == null) {
            $orStatment = '';
        } else {
            $orStatment = "OR Email = " . $email;
        }

        $query = "SELECT * FROM users WHERE Username = :username OR Email = :email LIMIT 1";
        $stmt = $con->prepare($query);
        $stmt->execute(array(
            ':username' => $username,
            ':email' => $email
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