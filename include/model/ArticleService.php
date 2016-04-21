<?php
/*
  This service handles the manipulation of Article entities.
  
  Author: Matthew Panzner
*/
require_once(CLASS_DIR . "/entity/article/Article.php");
require_once(CLASS_DIR . "/utils/database/DAO.php");

class ArticleService{
  private $dao;
  
  public function __construct(){
    $this->dao = new DAO();
  }
  
  private function alreadyExists($article){
    $args[0] = $article->title;
    $args[1] = $article->folderId;
    
    //See 1.0008.-- for up-to-date information on query
    if(mysqli_num_rows($this->dao->select("selectArticleByTitleQuery", $args)) > 0)
      return true;
    return false;
  }
  
  private function alreadyExistsById($id){
    $args[0] = $id;
    
    //See 1.0009.-- for up-to-date information on query
    if(mysqli_num_rows($this->dao->select("selectArticleByIdQuery", $args)) > 0)
      return true;
    return false;
  }

  
  //Add an article by the given data
  public function addArticle($data){
    $article = new Article($data);
    $args[0] = $article->publicationDate;
    $args[1] = $article->title;
    $args[2] = $article->summary;
    $args[3] = $article->content;
    $args[4] = $article->category;
    
    if($this->alreadyExists($article))
      return false;
    
    //See 1.0005.-- for up-to-date information on query
    $this->dao->insert("addArticleQuery", $args);
    return true;
  }
  
  
  public function updateArticle($article){
    $args[0] = $article->publicationDate;
    $args[1] = $article->title;
    $args[2] = $article->summary;
    $args[3] = $article->content;
    $args[4] = $article->ownerId;
    $args[5] = $article->folderId;
    $args[6] = $article->articleId;
    
    if(!$this->alreadyExistsById($article->id))
      return false;
    
    //See 1.0006.-- for up-to-date information on query
    $this->dao->update("updateArticleQuery", $args);
    return true;
  }
  public function deleteArticle($articleId){
    $args[0] = $articleId;
    
    //See 1.0007.-- for up-to-date information on query
    $this->dao->delete("deleteArticleQuery", $args); // do check here later for how many rows effected
    return true;
  }
  
  //Get all the articles 
  public function getArticles(){
    $args[0] = "Article";
    
    //See 1.0001.-- for up-to-date information on query
    return $this->dao->select("selectAllQuery", $args);
  }
  
  //Get an article based on the id parameter
  public function getArticle($articleId){
    $args[0] = $articleId;
    
    //See 1.0009.-- for up-to-date information on query
    $res = $this->dao->select("selectArticleByIdQuery", $args);
    $row = mysqli_fetch_row($res);
    
    $data['articleId'] = $row[0];
    $data['publicationDate'] = $row[1];
    $data['title'] = htmlspecialchars_decode($row[2]);
    $data['summary'] = htmlspecialchars_decode($row[3]);
    $data['content'] = htmlspecialchars_decode($row[4]);
    $data['ownerId'] = $row[5];
    $data['folderId'] = $row[6];
    
    return new Article($data);
  }
  
//******************************************************
// Article Folder relationship methods
 //*************************************
  /*
  public function getArticlesByFolder($folderId){
    $args[0] = $folderId;
    
    //See 1.0010.-- for up-to-date information on query
    return $this->dao->select("selectArticleByFolderQuery", $args);
  }
  */
  /* FOR DELETE------------------------------------------------------------------------+
  private function articleAlreadyExistsInFolder($folder){
    $args[0] = $folder->name;
    
    //See 1.00013.-- for up-to-date information on query
    if(mysqli_num_rows($this->dao->select("selectFolderByNameQuery", $args)) > 0)
      return true;
    return false;
  }
  public function addFolder($data){
    $categroy = new ArticleCategory($data);
    $args[0] = $categroy ->name;
    $args[1] = $categroy ->summary;
    
    if($this->alreadyExists($category))
      return false;
    
    $this->dao->insert("addFolderQuery", $args);
    return true;
  }*/
  public function getFolders(){
    $args[0] = "Folder";
    //See 1.0001.-- for up-to-date information on query
    return $this->dao->select("selectAllQuery", $args);
  }
}?>