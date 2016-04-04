<?php
//require_once("../../../config.php");
require_once(CLASS_DIR . "/entity/Entity.php");

class User extends Entity{

  public function __construct($data){
    $this->data['id'] = (isset($data['id'])) ? $data['id'] : "";
    $this->data['username'] = (isset($data['username'])) ? htmlspecialchars($data['username'],ENT_QUOTES) : "";
	  $this->data['password'] = (isset($data['password'])) ?htmlspecialchars($data['password'],ENT_QUOTES) : "";
    $this->data['joinDate'] = (isset($data['joinDate'])) ? $data['joinDate'] : "";
		$this->data['role'] = (isset($data['role'])) ? $data['role'] : "";
  }
}?>