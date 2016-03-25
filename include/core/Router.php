<?php
require_once("Route.php");

class Router{
  private $route;
  
  public function __construct(){
    $this->route['/'] = new Route('Model', 'Controller', 'View');
  }
  
  public function getRoute($route){
    $route = strtolower($route);
    return $this->route[$route];
  }
}
?>