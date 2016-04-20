<?php
/*
   Folder object is derived from the ArticleCateogory class.  This is designed to be
     more generic and robust.  Using concepts such as ownership and child parent
     relationships.  This is in hopes to having nested categories in a non-hack
     manner.
     
   Author: Matthew Panzner

*/
require_once(CLASS_DIR . "/entity/Entity.php");

class Folder extends Entity{
  public function __construct($data){
    $this->data['id'] = (isset($data['id'])) ? $data['id'] : "";
    $this->data['name'] = (isset($data['name'])) ? htmlspecialchars($data['name'],ENT_QUOTES) : "";
		$this->data['summary'] = (isset($data['summary'])) ? htmlspecialchars($data['summary'],ENT_QUOTES) : "";
    $this->data['visibility'] = (isset($data['visibility'])) ? $data['visibility'] : "visible";
    $this->data['ownerId'] = (isset($data['ownerId'])) ? $data['ownderId'] : NULL;
    $this->data['parentId'] = (isset($data['parentId'])) ? $data['parentId'] : NULL;
	}
}?>