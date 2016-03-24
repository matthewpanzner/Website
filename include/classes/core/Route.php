<?php
require_once("../../config.php");

class Route{
  public $modelName;
  public $viewName;
  public $controllerName;
  
  public function __construct($m, $v, $c){
    $this->modelName = $m;
    $this->viewName = $v;
    $this->controllerName = $c;
  }
}?>