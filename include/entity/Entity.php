<?php
require_once("../../config.php");
class Entity{
  protected $data = array();
  
  public function __set($name, $value){
    $this->data[$name] = $value;
  }
  public function __get($name){
    if(array_key_exists($name, $this->data))
      return $this->data[$name];
    else{
      logMessage("error.log", "The variable " . $name . " is not set in " . $trace[0]['file'] . " on line " . $trace[0][line]);
      return null;
    }
  }
  
  public function __isset($name){
    return isset($this->data[$name]);
  }
  public function __unset($name){
    unset($this->data[$name]);
  }
}
?>