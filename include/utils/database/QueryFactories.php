<?php
/*
   BaseQuery - A query that has placement elements in it denoted "?"
   
   QueryFactory creates queries based on the baseQuery and args passed to it.
     This is not coupled to QueryListFactory as it still works, however, it's not
     particulary useful without something generating these baseQueries.
     
   QueryListFactory maps a list of queryNames to a baseQuery based on the xml file
     it receives.  After generated it is a lookup and can be associated with args
     to be used with the QueryFactory to create a valid expression.
     
   The thought of using some medium instead of string litearls for the mapping has occured.
     I do not know php enough at this point to know my best options.  I will keep this in mind,
   
 Author: Matthew Panzner
*/
require_once 'SQLQuery.php';
require_once CLASS_DIR . '/utils/data_structures/Map.php';

//This class' function is to replace "?" in SQL Queries from the XML based on args
//  to make a valid SQL statement to execute.
class QueryFactory{
  
  public static function create($baseQuery, $args){
    $query = new SQLQuery();
    $finishedQuery = "";
    $queryLen = strlen($baseQuery);
    $argNum = 0;
    
    for($i = 0; $i < $queryLen; $i++){
      if($baseQuery[$i] == "?"){
        $finishedQuery .= $args[$argNum++];
    }
    else
      $finishedQuery .= $baseQuery[$i];
    }
      
  $query->setQuery($finishedQuery);
  return $query;
  }
}

//***************************************************************************
class QueryListFactory{
  public static function create($xmlPath){
    $map = new Map();
    $myQueries = simplexml_load_file($xmlPath) or die("could not load");
    
    $numOfQueries = count($myQueries);
    for($i = 0; $i < $numOfQueries; $i++){
      $map->insert((string)$myQueries->query[$i]->name, (string)$myQueries->query[$i]->value);
    }
    return $map; 
  }
}
?>