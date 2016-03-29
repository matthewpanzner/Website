<?php 
$html = "<table>\n";
if(mysqli_num_rows($this->model['articles'])){
  $html .= "  <tr>\n";
  $html .= "    <th>Title</th>\n";
  $html .= "    <th>Summary</th>\n";
  $html .= "  </tr>\n";
  while($row = mysqli_fetch_row($this->model['articles'])){
    $html .= "  <tr>\n";
   // $html .= "    <td><a href=index.php?controller=ArticleController&action=getArticle&id=0' style='display:block'>&nbsp;</a></td>\n";
    foreach($row as $key=>$value){
      if($key == 2 || $key == 3)
        $html .= "    <td>" . $value . "</td>\n";
    }
    $html .= "  </tr>\n";
  }
}
$html .= "</table>";
echo formateHtml($html, 4);?>