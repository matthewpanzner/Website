<?php if(!isset($role) || $role !== "admin") header("Location: index.php");?>
    <form class="base-form" action="index.php?controller=ArticleCategoryController&action=onAdd" method="post">
        <input type="text" name="title" placeholder="title" required autofocus/>
        <input type="text" name="summary" placeholder="summary" required/>
        <input type="submit"/>
      </form>