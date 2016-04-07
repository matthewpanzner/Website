<?php 
if(mysqli_num_rows($this->model['articles'])){ //Needs to be changed to do in controller
  $html = "<div class='container grid grid-1-3'>\n";
  while($row = mysqli_fetch_row($this->model['articles'])){
    $html .= "    <div class='grid_cell'>\n";
    $html .= "      <div class='grid_cell--content'>\n";
    
    foreach($row as $key=>$value){

      if($key === 1)
        $html .= "      <a href='index.php?controller=ArticleController&action=onGetArticle&id=" . $row[0] . "'><h1>" . htmlspecialchars_decode($value) . " </h1></a>\n";
      else if($key === 2  || $key === 4)
        $html .= "      <p>" . htmlspecialchars_decode($value) . "</p>\n";
    }
    $html .= "    </div>\n";
    $html .= "  </div>\n";
  }
  $html .= "</div>";
}
else
  $html = "<div class='container'>There are no articles!</div>"; 

echo formatHtml($html, 4);?>