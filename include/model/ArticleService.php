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
}?>