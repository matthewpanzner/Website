<?php 
$html = "<div class='grid grid-1-2'>\n";
if(mysqli_num_rows($this->model['categories'])){
  while($row = mysqli_fetch_row($this->model['categories'])){
    $html .= "  <div class='grid_cell'>\n";
    $html .= "    <div class='grid_cell--content article_cell grid-shadow'>\n";
   // $html .= "    <td><a href=index.php?controller=ArticleController&action=getArticle&id=0' style='display:block'>&nbsp;</a></td>\n";
    foreach($row as $key=>$value){
      if($key == 1){
        $html .= "      <div class='article_cell-title'>\n";
        $html .= "        <a href='index.php?controller=ArticleController&action=onGetArticlesByCategory&c=" . $row[0] . "'><h1>" . $value . "</h1></a>\n";
        $html .= "      </div>\n";
        $html .= "      <div class='article_cell-body'>\n";
      }
      if($key == 2)
        $html .= "        <p>" . $row[2] . "</p>\n";
    }
    
    if($role == 'admin'){
      $html .= "          <a id='article-delete' href='index.php?controller=ArticleCategoryController&action=onDelete&id=" . $row[0] . "'>delete</a>\n";
      $html .= "          <a id='article-edit' href='#'>edit</a>\n";
    }
    
    $html .= "      </div>\n";
    $html .= "    </div>\n";
    $html .= "  </div>\n";
  }
}
else{
  $html = "There are no articles!";
}

if($role == 'admin'){
  $html .= "    <div class='grid_cell'>\n";
  $html .= "      <div class='grid_cell--content grid-shadow'>\n";
  $html .= "        <a href='index.php?route=admin/article-category-form'>add</a>";
  $html .= "      </div>";
  $html .= "    </div>";
}

$html .= "</div>";
echo formatHtml($html, 4);?>