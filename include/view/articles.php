<?php 
$html = "<div class='container grid grid-1-3'>\n";
if(mysqli_num_rows($this->model['articles'])){
  while($row = mysqli_fetch_row($this->model['articles'])){
    $html .= "    <div class='grid_cell'>\n";
    $html .= "      <div class='grid_cell--content'>\n";
    
    foreach($row as $key=>$value){

      if($key === 2)
        $html .= "      <h1>" . htmlspecialchars_decode($value) . " </h1>\n";
      else
        $html .= "      <p>" . $value . "</p>\n";
    }
    $html .= "    </div>\n";
    $html .= "  </div>\n";
  }
}
$html .= "</div>";
echo formatHtml($html, 4);?>