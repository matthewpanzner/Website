<?php
require_once("Model.php");
require_once("View.php");

class Controller{
  protected $model;
 
  public function authenticate($privilege){
    if(isset($_SESSION['logged_in'])){
      if(isset($_SESSION['username'])){
        $args[0] = $_SESSION['username'];
        $dao = new DAO();
        $row = mysqli_fetch_row($dao->select("selectRoleQuery", $args));

        if(!$row){
           $_SET['controller'] = "ErrorController";
           $_SET['action'] = "onUnexpected";
          logMessage("/error.log", "Loogged in with username but no role!");
        }else{
          $role = $row[0];
        }
      }
      else{
        logMessage("/error.log", "Logged in but no username!");
        $_SET['controller'] = "LoginController";
        $_SET['action'] = "onLogout";
      }
    }
    else{
      $role = "";
    }
    
    return ($role === $privilege);
  }
}?>