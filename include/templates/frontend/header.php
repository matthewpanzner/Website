<!DOCTYPE>
<html lang="en">
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
  </head>
  <body>
    <header>
      <nav>
        <ul>
<?php if(!isset($_SESSION['logged_in'])):?>
          <li><a href="index.php?route=login">Login</a></li>
          <li><a href="index.php?route=registration">Register</a></li>
<?php else: ?>
          <li><a href="index.php?controller=LoginController&action=onLogout">Logout</a></li>
          <li><a href="index.php?route=article-form">Add Article</a></li>
<?php endif;?>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php?route=about">About</a></li>
          <li><a href="index.php?controller=ArticleController&action=onGetArticles">Articles</a></li>
          <li><a href="index.php?route=contact">Contact</a></li>
        </ul>
      </nav>
    </header>
 