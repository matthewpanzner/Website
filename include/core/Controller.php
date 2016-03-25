<?php
require_once("../../config.php");
require_once("Model.php");

class Controller{
  private $model;
  
  public function __contruct($model){
    $this->model = $model;
  }
}?>