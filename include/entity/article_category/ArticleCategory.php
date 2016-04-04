<?php
require_once(CLASS_DIR . "/entity/Entity.php");
require_once(CLASS_DIR . "/entity/article/Article.php");

class ArticleCategory extends Entity{
  public function __construct($data){
    $this->data['id'] = (isset($data['id'])) ? $data['id'] : "";
    $this->data['name'] = (isset($data['name'])) ? htmlspecialchars($data['name'],ENT_QUOTES) : "";
		$this->data['summary'] = (isset($data['summary'])) ? htmlspecialchars($data['summary'],ENT_QUOTES) : "";
  }
}?>