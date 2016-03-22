<?php
ini_set( "display_errors", true );

//*********************************
// Constants
//*********************************

define("DB_DSN", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", ""); //will use a script to fetch at some point
require_once("../classes/utils/logger.php");

//**************************************************************
// ERROR HANDLING
//**************************************************************
function handleException($e) {
  echo "An error has occured.  Check log for more details";
  error_log( $e->getMessage() );
}
 
set_exception_handler( 'handleException' );

?>