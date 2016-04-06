<?php 
$html = "<div class='container grid grid-1-2'>\n";
if(mysqli_num_rows($this->model['categories'])){
  while($row = mysqli_fetch_row($this->model['categories'])){
    $html .= "    <div class='grid_cell'>\n";
    $html .= "      <div class='grid_cell--content'>\n";
   // $html .= "    <td><a href=index.php?controller=ArticleController&action=getArticle&id=0' style='display:block'>&nbsp;</a></td>\n";
    foreach($row as $key=>$value){
      if($key == 1)
        $html .= "        <a href='index.php?controller=ArticleController&action=onGetArticlesByCategory&c=" . $row[0] . "'>" . $value . "</a>\n";
      if($key == 2)
        $html .= "        <p>" . $row[2] . "</p>\n";
    }
    
    $html .= "     </div>\n";
    $html .= "  </div>\n";
  }
}
$html .= "</div>";
echo formatHtml($html, 4);?>