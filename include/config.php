<?php
ini_set( "display_errors", true );

//***************************************************
//
// Constants
//
//
//***************************************************

define("DB_DNS", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", ""); //will use a script to fetch at some point

//****************************
//  Paths
//****************************
defined("ROOT")
  or define("ROOT", realpath(dirname(__FILE__) . '../root'));
defined("CLASS_DIR")
  or define("CLASS_DIR", realpath(dirname(__FILE__)));
defined("TEMPLATE_DIR")
  or define("TEMPLATE_DIR", realpath(dirname(__FILE__) . "/templates"));
defined("LOG_DIR")
  or define("LOG_DIR", ROOT . "../logs");
defined("RESOURCE_DIR")
  or define("RESOURCE_DIR", ROOT . "../resources");
defined("CORE_DIR")
  or define("CORE_DIR", CLASS_DIR . "/core");

//*****************************************************************
//
//  DEBUGGING CONFIGURATIONS
//
//
//*****************************************************************

//****************************************
// ERROR HANDLING
//****************************************
function handleException($e) {
  echo "An error has occured.  Check log for more details";
  error_log( $e->getMessage() );
}

function logMessage($file, $message){
  if(!file_exists(LOG_DIR . $file))
    fopen(LOG_DIR . $file, 'w+') or die("Unable to open " . $file);
  
  $date = date_create();
  file_put_contents(LOG_DIR . $file, $message . " /////" . date_format($date, 'U = Y-m-d H:i:s') . "\n", FILE_APPEND | LOCK_EX);
  $date = null;
}

function formatHtml($html, $indent_val){
  $fhtml = "";

  $lines = explode("\n",$html);
  for($i = 0; $i < sizeof($lines); $i++){
    for($j = 0; $j < $indent_val; $j++){
      $lines[$i] = " " . $lines[$i];
    }
    $fhtml .= $lines[$i] . "\n";
  }
  
  return $fhtml;
}
set_exception_handler( 'handleException' );

?>