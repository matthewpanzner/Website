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
  private function countArticles($id){
    $args[0] = $id;
    $result = $this->dao->select("countArticlesInCategoryQuery", $args);
    $row = mysqli_fetch_row($result);
    return $row[0];
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
  
  public function getCategory($name){
    $args[0] = $name;
    $row = mysqli_fetch_row($this->dao->select("selectArticleCategoryByNameQuery", $args));
    $data["id"] = $row[0];
    $data["name"] = $row[1];
    $data["summary"] = $row[2];
    return new ArticleCategory($data);
  }
  public function deleteCategory($id){
    $args[0] = $id;
    if($this->countArticles($id) != 0)
      return false;
    
    $this->dao->delete("deleteArticleCategoryQuery", $args); // do check here later for how many rows effected
    return true;
  }
}?>