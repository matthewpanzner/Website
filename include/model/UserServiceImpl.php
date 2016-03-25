<?php
require_once("../../config.php");
require_once(CLASS_DIR . "/model/user/User.php");
require_once(CLASS_DIR . "/utils/database/DAO.php");

class UserServiceImpl{
  private $dao;
  
  __construct($data){
    $this->user = new User();
    $this->dao = new DAO();    
  }
  
  public function isUserRegistered($user){
    $user = new User($user);
    $args[0] = $this->username;
		$args[1] = $this->password;
    
    if($this->dao->select("selectUserQuery", $args) > 0) 
      return true;
    return false;
  }
  
  public function register($data){
		$args[0] = $this->username;
		$args[1] = $this->password;
    
		if(isUserRegistered($data))
			return false;
	
    $this->dao->insert("registerUserQuery", $args);
		return true;
  }
}
?>