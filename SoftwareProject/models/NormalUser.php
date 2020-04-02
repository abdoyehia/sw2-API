<?php
include_once 'UserInfo.php';

class NormalUser {
	public $normal;

	public function __construct() {
		$this->normal = new UserInfo();
	}
}

?>