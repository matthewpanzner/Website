<?php
ini_set( "display_errors", true );

//***************************************************
//
// Constants
//
//
//***************************************************

define("DB_DSN", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", ""); //will use a script to fetch at some point

//****************************
//  Paths
//****************************

define("ROOT", "/home/cabox/workspace/root/");
define("CLASS_DIR", ROOT . "../scripts/classes/");
define("TEMPLATE_DIR", ROOT . "../scripts/templates/");
define("CSS_DIR", ROOT . "../css/");
define("JS_DIR", ROOT . "../js/");
define("RESOURCE_DIR", ROOT .  "../resources/");
define("LOG_DIR", ROOT . "../logs/");

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
  
  file_put_contents(LOG_DIR . $file, $message . "\n", FILE_APPEND | LOCK_EX);
}

set_exception_handler( 'handleException' );

?>