<?php
require_once(CLASS_DIR . "/model/UserServiceImpl.php");

class UserController extends Controller{
  public function onRegister(){
    if(!(isset($_POST["password"]) && isset($_POST["confirm-password"]) && isset($_POST["username"]))){
      $this->model['error'] = new ErrorModel("Required Fields not all filled out!");
      return new View($this->model, "error.php");
    }
    
    $service = new UserServiceImpl();
    $data = ['username' => $_POST["username"], 'password' => $_POST['password']];
    if($service->register($data)){ 
      return new View(null, "home.php");
    }
    else{
      $this->model['error'] = new ErrorModel("Could not register user!");
      return new View($this->model, "error.php");
    }
  }
}?>