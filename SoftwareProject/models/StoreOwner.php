<?php
include_once 'UserInfo.php';

class StoreOwner {
	public $storeOwner;

	public function __construct() {
		$this->storeOwner = new UserInfo();
	}
}

?>