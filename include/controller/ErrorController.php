<?php
require_once(CLASS_DIR . "/core/Controller.php");

class ErrorController extends Controller{
  
  public function onUnauthorized(){
    $this->model['error']->setMsg("ERROR CODE 109182091K32M_33K21_39_002");
    
    $view = "error";
    return $view;
  }
}?>