<?php if(!isset($role) || $role !== "admin") header("Location: index.php");?>
      <form action="index.php?controller=ArticleController&action=onAdd" method="post">
        <input type="text" name="title" placeholder="title" required/>
        <input type="text" name="summary" placeholder="summary" required/>
        <input type="text" name="content" placeholder="content" required/>
        <input type="text" name="publication-date" value=<?php echo date("Y-m-d")?> readonly required/>
<?php ?>
        <input type="text" name="category" placeholder="category" required/>       
        <input type="submit"/>
      </form>
