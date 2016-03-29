<?php
require_once(CLASS_DIR . "/entity/Entity.php");
require_once(CLASS_DIR . "/entity/article/Article.php");

class ArticleCategory extends Entity{
  public function __construct($data){
    $this->data['id'] = (isset($data['id'])) ? $data['id'] : "";
    $this->data['name'] = (isset($data['name'])) ? $data['name'] : "";
		$this->data['summary'] = (isset($data['summary'])) ? $data['summary'] : "";
  }
}?>