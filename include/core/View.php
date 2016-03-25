<?php
require_once("Model.php");

class View{
  private $model;
  private $path;
  
  public function __construct($model, $path){
    $this->model = $model;
    include(CLASS_DIR . "/View/" . $path);
  }
 
}?>