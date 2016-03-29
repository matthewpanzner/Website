<?php
//require_once("../../../config.php");
require_once(CLASS_DIR . "/entity/Entity.php");

class Article extends Entity{

  public function __construct($data){
    $this->data['id'] = (isset($data['id'])) ? $data['id'] : "";
    $this->data['publicationDate'] = (isset($data['publicationDate'])) ? $data['publicationDate'] : "";
	  $this->data['title'] = (isset($data['title'])) ? $data['title'] : "";
    $this->data['summary'] = (isset($data['summary'])) ? $data['summary'] : "";
    $this->data['content'] = (isset($data['content'])) ? $data['content'] : "";
    $this->data['category'] = (isset($data['category'])) ? $data['category'] : "";
  }
}?>