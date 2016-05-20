<?php
//require_once("../../../config.php");
require_once(CLASS_DIR . "/entity/Entity.php");

class Color extends Entity{

  public function __construct($data){
    $this->data['name'] = (isset($data['name'])) ? $data['name'] : "Black";
    $this->data['value'] = (isset($data['value'])) ? $data['value'] : "#000000";		
  }
}?>