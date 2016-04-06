<?php 
$html = "<table>\n";
if(mysqli_num_rows($this->model['articles'])){
  $html .= "  <tr>\n";
  $html .= "    <th>Title</th>\n";
  $html .= "    <th>Summary</th>\n";
  $html .= "  </tr>\n";
  while($row = mysqli_fetch_row($this->model['articles'])){
    $html .= "  <tr>\n";
    foreach($row as $key=>$value){

      if($key === 2)
        $html .= "    <td>" . htmlspecialchars_decode($value) . " </td>\n";
      else
        $html .= "    <td>" . $value . "</td>\n";
    }
    $html .= "  </tr>\n";
  }
}
$html .= "</table>";
echo formatHtml($html, 4);?>