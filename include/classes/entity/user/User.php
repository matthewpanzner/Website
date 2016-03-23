<?php
require_once("../Entity.php");

/*
   User is a basic ModelObj.  In the implementation as of 3/22/2016 the mapping of $data 
     should have keys: 
     
       -id
       -username
       -password
       -email
       -join_date
       
   The implementation will also do a lookup to see whether it's id is listed in the admin table
*/
class User extends Entity{
  
}
?>