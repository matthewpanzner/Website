<?php
/*
   DBConnection class is a singleton that can opens and closes connection to the DB.
     It should be closed after use is done.
Author: Matthew Panzner
*/
  class DBConnection{
    private static $link;
    
    public static function createConnection($dbName){
  
      static::$link = mysqli_connect(DB_DNS, DB_USERNAME, DB_PASSWORD, $dbName);
      
      if(!static::$link){
        echo "Error: Unable to connect to database" . PHP_EOL;
        exit;
      }
      
      return static::$link;
    }
    
    public static function closeConnection(){
      mysqli_close(static::$link);
    }
    
    protected function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
    
  }
?>