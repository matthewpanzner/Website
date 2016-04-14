<?php if(!isset($role) || $role !== "admin") header("Location: index.php");?>
      <section class="container">
        <form class="base-form" action="<?php if(isset($this->model['article'])) echo "index.php?controller=ArticleController&action=onUpdate&id=" . $this->model['article']->id; else echo "index.php?controller=ArticleController&action=onAdd"; ?>" method="post">
          <input type="text" name="title" placeholder="title" required autofocus value="<?php if(isset($this->model['article'])) echo $this->model['article']->title; ?>"/>
          <textarea rows="5" cols="30" name="summary" placeholder="summary" required value><?php if(isset($this->model['article'])) echo $this->model['article']->title; ?></textarea>
          <textarea rows="20" cols="64" name="content" placeholder="content" required><?php if(isset($this->model['article'])) echo $this->model['article']->content; ?></textarea>
          <input type="text" name="publication-date" value=<?php echo date("Y-m-d")?> readonly required/>
<?php
$html = "    <select name='category' required readonly>\n";
if(mysqli_num_rows($this->model['categories'])){
  while($row = mysqli_fetch_row($this->model['categories'])){
      $html .= "      <option value='" . $row[0] . "' ";
      if(isset($_GET['c']) && $_GET['c'] === $row[0]) $html .= "selected ";
      $html .= ">" . $row[1] . "</option>\n";
  }
}
$html .= "    </select>";
echo formatHtml($html, 4);?>
          <input type="submit"/>       
        </form>
      </section>
