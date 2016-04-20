<?php
//TODO: Add redirections 

require_once(CLASS_DIR . "/model/ArticleService.php");

class ArticleController extends Controller{
  //*************************************************
  // PRIMARY MANIPULATION FUNCTIONS
  //*************************************************
  public function onAdd(){
    if(!$this->authenticate("admin")){
      $this->model['error'] = new ErrorModel("Unauthorized Access");
      return new View($this->model, "error.php");
    }
      
    
    if(!(isset($_POST["title"]) && isset($_POST["folderId"]) &&isset($_POST['ownerId'] && isset($_POST["summary"]) && isset($_POST["content"]) && isset($_POST["publication-date"]))){
      logMessage("/error.log", var_dump($_POST));
      $this->model['error'] = new ErrorModel("Required Fields not all filled out!");
      return new View($this->model, "error.php");
    }
      
    $service = new ArticleService();
    $data = [
      "title" => $_POST["title"],
      "folderId" => $_POST["folderId"],
      "ownerId" => $_POST['ownerId'],
      "summary" => $_POST["summary"],
      "content" => $_POST["content"],
      "publicationDate" => $_POST["publication-date"]
    ];
    
    if($service->addArticle($data)){
      $this->model['msg'] = "Successfully added";
      return new View(null, "home.php");
    }
    else{
      $this->model['error'] = new ErrorModel("Could not add article!");
      return new View($this->model, "error.php");
    }
  }
  
  //***************************************
  // Delete handler
  //***************************************
  public function onDelete(){
    if(!$this->authenticate("admin")){
        $this->model['error'] = new ErrorModel("Unauthorized Access");
        return new View($this->model, "error.php");
    }
    
    $service = new ArticleService();
    
    if(!isset($_GET['articleId'])){
      $this->model['error'] = new ErrorModel("Unresolvsed URI");
      return new View($this->model, "error.php");
    }
    
    if($service->deleteArticle($_GET['articlId'])){
      return new View(null, "home.php");
    }
    else{
      $this->model['error'] = new ErrorModel("Error in deleting!");
      return new View($this->model, "error.php");
    }
  }
  
  //********************************
  //  Update Article
  //
  public function onUpdate(){
    
    
    if(!$this->authenticate("admin")){
        $this->model['error'] = new ErrorModel("Unauthorized Access");
        return new View($this->model, "error.php");
    }
    if(!isset($_GET['articleId'])){
      $this->model['error'] = new ErrorModel("Unresolvsed URI");
      return new View($this->model, "error.php");
    }
    if(!(isset($_POST["title"]) && isset($_POST["folderId"]) && isset($_POST["ownerId"]) && isset($_POST["summary"]) && isset($_POST["content"]) && isset($_POST["publication-date"]))){
      logMessage("/error.log", var_dump($_POST));
      $this->model['error'] = new ErrorModel("Required Fields not all filled out!");
      return new View($this->model, "error.php");
    }
    
    $service = new ArticleService();
    $article = $service->getArticle($_GET['articleId']);
    $article->title = $_POST['title'];
    $article->folderId = $_POST['folderId'];
    $article->ownerId = $_POST['ownerId'];
    $article->summary = $_POST['summary'];
    $article->content = $_POST['content'];
    
    if($service->updateArticle($article)){
      return new View(null, "home.php");
    }
    else{
      $this->model['error'] = new ErrorModel("Error in updating!");
      return new View($this->model, "error.php");
    }
  }
  
  //***********************************************************
  // PRIMARY GET FUNCTIONS
  //***********************************************************
  public function onGetArticles(){
    $service = new ArticleService();
    $this->model['articles'] = $service->getArticles();
    $this->model['categories'] = $service->getCategories();
    return new View($this->model, "articles.php");
  }
  
  public function onGetArticlesByCategory(){
    $service = new ArticleService();
    $this->model['articles'] = $service->getArticlesByCategory($_GET['c']);
    return new View($this->model, "articles.php");
  }
  
  public function onGetArticle(){
    
    if(!isset($_GET['articleId'])){
      $this->model['error'] = new ErrorModel("Failed to resolve id");
      return new View($this->model, "error.php");
    }
    
    $service = new ArticleService();
    $this->model['article'] = $service->getArticle($_GET['articleId']);
    return new View($this->model, "article.php");
  }
}?>