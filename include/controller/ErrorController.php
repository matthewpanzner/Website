<?php
require_once(CLASS_DIR . "/core/Controller.php");

class ErrorController extends Controller{
  public function __construct($model){echo "t"; parent::__construct($model); echo"e";}
  public function onUnauthorized(){
    $this->model->setMsg("ERROR CODE 109182091K32M_33K21_39_002");
    $view = "ErrorView";
    return $view;
  }
}?>