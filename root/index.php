<?php 
$test = "IT WORKED";
if(isset($_GET['action']))
  echo ${$_GET['action']};
else echo 'no';

include "../include/config.php";
include TEMPLATE_DIR . "/frontend/header.php";
include TEMPLATE_DIR . "/frontend/leftPanel.php";
?>
    <section>
      <p>
        <a href="index.php?action=test">Test</a>
      </p>
    </section>
<?php
include TEMPLATE_DIR . "/frontend/footer.php";
?>