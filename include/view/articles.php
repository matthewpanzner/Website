<?php 
$html = "  <div class='container grid grid-1-3'>\n";
if(mysqli_num_rows($this->model['articles'])){ //Needs to be changed to do in controller
  while($row = mysqli_fetch_row($this->model['articles'])){
    $html .= "    <div class='grid_cell'>\n";
    $html .= "      <div class='grid_cell--content'>\n";
    
    foreach($row as $key=>$value){

      if($key === 1)
        $html .= "      <a href='index.php?controller=ArticleController&action=onGetArticle&id=" . $row[0] . "'><h1>" . htmlspecialchars_decode($value) . " </h1></a>\n";
      else if($key === 2  || $key === 4)
        $html .= "      <p>" . htmlspecialchars_decode($value) . "</p>\n";
    }
    
    if($role == 'admin'){
      $html .= "        <a href='index.php?controller=ArticleController&action=onDelete&id=" . $row[0] . "'>delete</a>  <a href='#'>edit</a>\n";
    }
    
    $html .= "    </div>\n";
    $html .= "  </div>\n";
  }
}

if($role == 'admin'){
  $html .= "    <div class='grid_cell'>\n";
  $html .= "      <div class='grid_cell--content'>\n";
  $html .= "        <a href='#'>add</a>";
  $html .= "      </div>";
  $html .= "    </div>";
}

$html .= "</div>";

echo formatHtml($html, 4);?>