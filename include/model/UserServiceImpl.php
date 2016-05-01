<?php
require_once(CLASS_DIR . "/entity/user/User.php");
require_once(CLASS_DIR . "/utils/database/DAO.php");

class UserServiceImpl{
  private $dao;
  
  public function __construct(){
    $this->dao = new DAO();    
  }
  
  private function isRegistered($user){
    $args[0] = $user->username;
		$args[1] = $user->password;
    
    if(mysqli_num_rows($this->dao->select("selectUserQuery", $args)) > 0) 
      return true;
    return false;
  }
  
  public function register($data){
		$user = new User($data);
		$args[0] = $user->username;
		$args[1] = $user->password;
    
		if($this->isRegistered($user))
			return false;
	
    $this->dao->insert("registerUserQuery", $args);
		return true;
  }
	
	public function getUser($username){
		$args[0] = $username;
		$res = $this->dao->select("selectUserByUsernameQuery", $args);
		$row = mysqli_fetch_row($res);
		$data['id'] = $row[0];
		$data['username'] = $row[1];
		$data['password'] = $row[2];
		$data['joinDate'] = $row[3];
		$data['role'] = $row[4];
		$user = new User($data);
		
		return $user;
	}
}
?>