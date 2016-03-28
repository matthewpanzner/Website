<?php
require_once CLASS_DIR . "/model/ErrorModel.php";
require_once CLASS_DIR . "/controller/ErrorController.php";
require_once CLASS_DIR . "/controller/UserController.php";
require_once CLASS_DIR . "/controller/LoginController.php";
require_once CLASS_DIR . "/core/View.php";

class FrontController{
  private $controller;
  
  public function __construct($controllerName, $actionName){
    $this->controller = new $controllerName();
    $this->controller->$actionName();
  }
}?>