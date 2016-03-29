<?php 
$html = "<table>\n";
if(mysqli_num_rows($this->model['categories'])){
  $html .= "  <tr>\n";
  $html .= "    <th>Name</th>\n";
  $html .= "    <th>Summary</th>\n";
  $html .= "  </tr>\n";
  while($row = mysqli_fetch_row($this->model['categories'])){
    $html .= "  <tr>\n";
   // $html .= "    <td><a href=index.php?controller=ArticleController&action=getArticle&id=0' style='display:block'>&nbsp;</a></td>\n";
    foreach($row as $key=>$value){
      if($key == 1 || $key == 2)
        $html .= "    <td><a href='index.php?controller=ArticleController&action=onGetArticlesByCategory&c=" . $row[0] . "'>" . $value . "</a></td>\n";
    }
    $html .= "  </tr>\n";
  }
}
$html .= "</table>";
echo formateHtml($html, 4);?>