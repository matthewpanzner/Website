<?php
require_once("Model.php");

class View{
  private $model;
  private $path;
  
  public function __construct($model, $path){
    $this->model = $model;
   
    include(TEMPLATE_DIR . "/frontend/header.php");
    include(CLASS_DIR . "/view/" . $path);
    include(TEMPLATE_DIR . "/frontend/footer.php");
  }
 
}?>