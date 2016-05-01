<?php
/*
    This holds the SQLQuery class which is a glorified string.  The reason for this is for
      possible changes, or to change into an application context like Spring uses.
      
 Author: Matthew Panzner
*/

require_once 'QueryFactories.php';

//Basic SQL getter setter class
class SQLQuery{
  private $query = "";
  
  public function getQuery(){
    return $this->query;
  }
  public function setQuery($query){
    $this->query = $query;
  }
}
?>