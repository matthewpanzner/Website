<?php 
if(mysqli_num_rows($this->model['categories'])){
  
  $html = "<div class='container grid grid-1-2'>\n";
  while($row = mysqli_fetch_row($this->model['categories'])){
    $html .= "    <div class='grid_cell'>\n";
    $html .= "      <div class='grid_cell--content'>\n";
   // $html .= "    <td><a href=index.php?controller=ArticleController&action=getArticle&id=0' style='display:block'>&nbsp;</a></td>\n";
    foreach($row as $key=>$value){
      if($key == 1)
        $html .= "        <a href='index.php?controller=ArticleController&action=onGetArticlesByCategory&c=" . $row[0] . "'>" . $value . "\n";
      if($key == 2)
        $html .= "          <p>" . $row[2] . "</p>\n        </a>\n";
    }
    
    if($role == 'admin'){
      $html .= "        <a href='#'>delete</a>  <a href='#'>edit</a>\n";
    }
    
    $html .= "     </div>\n";
    $html .= "  </div>\n";
  }
  
  if($role == 'admin'){
    $html .= "    <div class='grid_cell'>\n";
    $html .= "      <div class='grid_cell--content'>\n";
    $html .= "        <a href='#'>add</a>";
    $html .= "      </div>";
    $html .= "    </div>";
  }
  
  $html .= "</div>";
}
else
  $html = "<div class='container'>There are no article categories!</div>";

echo formatHtml($html, 4);?>