<?php
session_start();
require_once "../include/config.php";
require_once CORE_DIR . "/FrontController.php";

if(isset($_GET['controller'])){
  if(isset($_GET['action']))
    $frontController = new FrontController($_GET['controller'], $_GET['action']);
}else if(isset($_GET['route'])){
  $view = new View(null, $_GET['route'] . ".php");
}else{
  $view = new View(null, "home.php");
}?>
