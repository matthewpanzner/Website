<?php
require_once(CLASS_DIR . "/entity/article/Article.php");
require_once(CLASS_DIR . "/utils/database/DAO.php");

class ArticleService{
  private $dao;
  
  public function __construct(){
    $this->dao = new DAO();
  }
  
  private function alreadyExists($article){
    $args[0] = $article->title;
    $args[1] = $article->category;
    
    if(mysqli_num_rows($this->dao->select("selectArticleByTitleQuery", $args)) > 0)
      return true;
    return false;
  }
  
/*<query>
    <name>addArticleQuery</name>
    <value>INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('?', '?', '?', '?', '?')</value>
  </query>*/
  public function addArticle($data){
    $article = new Article($data);
    $args[0] = $article->publicationDate;
    $args[1] = $article->title;
    $args[2] = $article->summary;
    $args[3] = $article->content;
    $args[4] = $article->category;
    
    if($this->alreadyExists($article))
      return false;
    
    $this->dao->insert("addArticleQuery", $args);
    return true;
  }
  
  public function getArticles(){
    $args[0] = "Articles";
    return $this->dao->select("selectAllQuery", $args);
  }
  
  
  //*****************************************************
  //  Category branch of it --- looking for better solution
  //
  public function getArticlesByCategory($category){
    $args[0] = $category;
    return $this->dao->select("selectArticleByCategoryQuery", $args);
  }
  
  private function categoryAlreadyExists($category){
    $args[0] = "name";
    
    if(mysqli_num_rows($this->dao->select("selectArticleCategoryByNameQuery", $args)) > 0)
      return true;
    return false;
  }
  public function addCategory($data){
    $categroy = new ArticleCategory($data);
    $args[0] = $categroy ->name;
    $args[1] = $categroy ->summary;
    
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