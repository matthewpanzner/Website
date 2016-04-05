<?php if(!isset($role) || $role !== "admin") header("Location: index.php");?>
      <form class="base-form" action="index.php?controller=ArticleController&action=onAdd" method="post">
        <input type="text" name="title" placeholder="title" required autofocus/>
        <textarea rows="5" cols="30" name="summary" placeholder="summary" required></textarea>
        <textarea rows="20" cols="64" type="text" name="content" placeholder="content" required></textarea>
        <input type="text" name="publication-date" value=<?php echo date("Y-m-d")?> readonly required/>
<?php
$html = "    <select name='category'>\n";
if(mysqli_num_rows($this->model['categories'])){
  while($row = mysqli_fetch_row($this->model['categories'])){
      $html .= "      <option value='" . $row[0] . "'>" . $row[1] . "</option>\n";
  }
}
$html .= "    </select>";
echo formatHtml($html, 4);?>
        <input type="submit"/>       
      </form>
