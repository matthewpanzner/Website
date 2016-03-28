<?php
//require_once("../../../config.php");
require_once(CLASS_DIR . "/entity/Entity.php");

class User extends Entity{

  public function __construct($data){
    $this->data['id'] = (isset($data['id'])) ? $data['id'] : "";
    $this->username = (isset($data['username'])) ? $data['username'] : "";
	  $this->password = (isset($data['password'])) ? $data['password'] : "";
    $this->joinDate = (isset($data['joinDate'])) ? $data['joinDate'] : "";
  }
}?>