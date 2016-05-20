<?php
/*
  This service handles he loading of color values from database
  
  Author: Matthew Panzner
*/
require_once(CLASS_DIR . "/utils/database/DAO.php");
require_once(CLASS_DIR . "/entity/color/Color.php");

class ColorService{
  private $dao;
    
  public function __construct(){
    $this->dao = new DAO();
  }
  public function getColors(){
    $args[0] = "Color";
    //See 1.0001.-- for up-to-date information on query
    $res = $this->dao->select("selectAllQuery", $args);
    $colors = [];
    
    while($row = mysqli_fetch_row($res)){
      $data["name"] = $row[0];
      $data["value"] = $row[1];

      $colors[count($colors)] = new Color($data);
    }
    
    return $colors;
  }
  
  public function getColor($name){
    $args[0] = $name;
    //See 1.00.19.-- for up-to-date information on query
    $row = mysqli_fetch_row($this->dao->select("selectColorByNameQuery", $args));
    $data["name"] = $row[0];
    $data["value"] = $row[1];
    
    return new Color($data);
  }
}?>