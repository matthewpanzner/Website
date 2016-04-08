<?php
//Check role privilege and any weird bugs with session
$role = null; //this should probably be replaced with a check whenever used.
if(isset($_SESSION['logged_in'])){
  if(isset($_SESSION['username'])){
    $args[0] = $_SESSION['username'];
    $dao = new DAO();
    $row = mysqli_fetch_row($dao->select("selectRoleQuery", $args));

    if(!$row){
       $_SET['controller'] = "ErrorController";
       $_SET['action'] = "onUnexpected";
      logMessage("/error.log", "Loogged in with username but no role!");
    }else{
      $role = $row[0];
    }
  }
  else{
    logMessage("/error.log", "Logged in but no username!");
    $_SET['controller'] = "LoginController";
    $_SET['action'] = "onLogout";
  }
}?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta type="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <header>
      <nav class="flex-container">
        <ul class="main-nav">
          <li class="main-nav__item"><a href="index.php?route=about">About</a></li>
          <li class="main-nav__item"><a href="index.php?controller=ArticleCategoryController&action=onGetCategories">Articles</a></li>
          <li class="main-nav__item"><a href="index.php?route=contact">Contact</a></li>
          <li class="main-nav__item"><a href="index.php?route=test">正解</a></li>
        </ul>
      </nav>
    </header>
    <section class="main">
