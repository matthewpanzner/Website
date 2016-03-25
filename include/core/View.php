<?php
require_once("../../config.php");
require("Model.php");

class View{
  private $model;
  private $path;
  
  public function __construct($model, $path){
    $this->model = $model;
    include(CLASS_DIR . "/View/" . $path);
  }
 
}?>