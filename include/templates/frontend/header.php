<?php
//Check role privilege and any weird bugs with session
$role = null;
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

<!DOCTYPE>
<html lang="en">
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <header class="container">
      <nav>
        <ul class="acc-nav">
<?php if(!isset($_SESSION['logged_in'])):?>
          <li><a href="index.php?route=login">Login</a></li>
          <li><a href="index.php?route=registration">Register</a></li>
<?php else: ?>
          <li><a href="index.php?controller=LoginController&action=onLogout">Logout</a></li>
<?php if(isset($role) && $role==="admin"): ?>
          <li><a href="index.php?controller=ArticleFormController&action=onLoad">Add Article</a></li>
          <li><a href="index.php?route=admin/article-category-form">Add Article Category</li>
<?php endif;?>
<?php endif;?>
        </ul>
        <ul class="main-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php?route=about">About</a></li>
          <li><a href="index.php?controller=ArticleCategoryController&action=onGetCategories">Article Categories</a></li>
          <li><a href="index.php?route=contact">Contact</a></li>
        </ul>
      </nav>
    </header>
    <section class="container">
