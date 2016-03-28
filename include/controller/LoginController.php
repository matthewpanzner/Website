<?php

class LoginController extends Controller{
  public function onLogin(){
		$dao = new DAO();
    $args[0] = (isset($_POST['username'])) ? $_POST['username'] : "";
		$args[1] = (isset($_POST['password'])) ? $_POST['password'] : "";
		if(mysqli_num_rows($dao->select("selectUserQuery", $args)) !== 1){
	    $this->model['error'] = new ErrorModel("Could not find user and password combination!");
      return new View($this->model, "error.php");
    }
		
		$_SESSION["username"] = $args[0];
		$_SESSION["logged_in"] = true;
		$_SESSION["login_time"] = time();
		return new View(null, "home.php");
  }
  
  public function onLogout(){
    unset($_SESSION['username']);
		unset($_SESSION['login_time']);
		unset($_SESSION['logged_in']);
		session_destroy();
 
    return new View(null, "home.php");
  }
}?>