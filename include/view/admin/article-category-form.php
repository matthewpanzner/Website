<?php if(!isset($role) || $role !== "admin") header("Location: index.php");?>
    <form action="index.php?controller=ArticleCategoryController&action=onAdd" method="post">
        <input type="text" name="title" placeholder="title" required/>
        <input type="text" name="summary" placeholder="summary" required/>
        <input type="submit"/>
      </form>