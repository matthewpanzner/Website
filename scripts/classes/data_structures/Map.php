<?php
/*
    Map is just a glorified array with some security and debugging measures added to it.
    
Author: Matthew Panzner
*/

class Map{
  private $map;
  
  public function dump(){print_R($this->map);}
  
  public function get($key){
    if(!$this->exists($key))
      echo "Cannot get key: " . $key . " because it does not exist in map!";
    else
      return $this->map[$key];
  }
  public function insert($key, $value){
    if($this->exists($key))
      echo "Cannot add key: " . $key . " => " . $value . " because it already is in map!";
    else{
      $this->map[$key] = $value;
    }
  }
  
  public function delete($key){
    if(!$this->exists($key))
      echo "Cannot delete key: " . $key . " because it does not exist in map!";
    else
      unset($this->map[$key]);
  }
  
  public function update($key, $value){
    if($this->exists($key))
      echo "Cannot update key: " . $key . " because it already exists with value: " . $map[$key];
    else{
      $this->map[$key] = $value;
    }
  }
  private function exists($key){
    if(isset($this->map[$key]))
      return true;
    else
      return false;
  }
}
?>