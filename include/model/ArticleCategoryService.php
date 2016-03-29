<?php
require_once(CLASS_DIR . "/entity/article_category/ArticleCategory.php");
require_once(CLASS_DIR . "/utils/database/DAO.php");

class ArticleCategoryService{
  private $dao;
  
  public function __construct(){
    $this->dao = new DAO();
  }
  
  private function alreadyExists($category){
    $args[0] = $category->name;
    
    if(mysqli_num_rows($this->dao->select("selectArticleCategoryByNameQuery", $args)) > 0)
      return true;
    return false;
  }
  public function addCategory($data){
    $category = new ArticleCategory($data);
    $args[0] = $category->name;
    $args[1] = $category->summary;
    
    if($this->alreadyExists($category))
      return false;
    
    $this->dao->insert("addArticleCategoryQuery", $args);
    return true;
  }
  public function getCategories(){
    $args[0] = "ArticleCategory";
    return $this->dao->select("selectAllQuery", $args);
  }
}?>