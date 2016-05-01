<?php
//TODO: Add redirections 

require_once(CLASS_DIR . "/model/ArticleService.php");
require_once(CLASS_DIR . "/model/UserServiceImpl.php");

class ArticleController extends Controller{
  //*************************************************
  // PRIMARY MANIPULATION FUNCTIONS
  //*************************************************
  public function onAdd(){
    if(!$this->authenticate("admin")){
      $this->model['error'] = new ErrorModel("Unauthorized Access");
      return new View($this->model, "error.php");
    }
      
    
    if(!(isset($_POST["title"]) && isset($_POST["folderId"]) && isset($_POST["owner"]) && isset($_POST["visibility"]) && isset($_POST["summary"]) && isset($_POST["content"]) && isset($_POST["publication-date"]))){
      logMessage("/error.log", "Error, not all fields are filled out");
      $this->model['error'] = new ErrorModel("Required Fields not all filled out!");
      return new View($this->model, "error.php");
    }
      
    $service = new ArticleService();
    $uService = new UserServiceImpl();
    $user = $uService->getUser($_POST['owner']);
    
    $data = [
      "title" => $_POST["title"],
      "folderId" => $_POST["folderId"],
      "ownerId" => $user->id,
      "summary" => $_POST["summary"],
      "content" => $_POST["content"],
      "publicationDate" => $_POST["publication-date"],
      "visibility" => $_POST["visibility"]
    ];
    
    if($service->addArticle($data)){
      $this->model['msg'] = "Successfully added";
      $this->model['reroute'] = true;
      
      return new View($this->model, "index.php?controller=Folder&action=onGetFolders&id=" . $data['folderId']);
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
    $article = $service->getArticle($_GET['articleId']);
      
    if($service->deleteArticle($_GET['articleId'])){
      $this->model['reroute'] = true;
      return new View($this->model, "index.php?controller=Folder&action=onGetFolders&id=" . $article->folderId);
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
    if(!(isset($_POST["title"]) && isset($_POST["folderId"]) && isset($_POST["owner"]) && isset($_POST["visibility"]) && isset($_POST["summary"]) && isset($_POST["content"]) && isset($_POST["publication-date"]))){
      logMessage("/error.log", "All fields were not filled out!"); //Make better
      $this->model['error'] = new ErrorModel("Required Fields not all filled out!");
      return new View($this->model, "error.php");
    }
    
    $service = new ArticleService();
    $article = $service->getArticle($_GET['articleId']);
    
    $uService = new UserServiceImpl();
    $user = $uService->getUser($_POST['owner']);
    
    $article->title = $_POST['title'];
    $article->folderId = $_POST['folderId'];
    $article->ownerId = $user->id;
    $article->summary = $_POST['summary'];
    $article->content = $_POST['content'];
    $article->publicationDate = $_POST['publication-date'];
    $article->visibility = $_POST['visibility'];
    
    if($service->updateArticle($article)){
      $this->model['reroute'] = true;
      return new View($this->model, "index.php?controller=Folder&action=onGetFolders&id=" . $article->folderId);
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
    $this->model['articles'] = $service->getArticlesByFolder($_GET['cId']);
    return new View($this->model, "articles.php");
  }
  
  public function onGetArticle(){
    
    if(!isset($_GET['id'])){
      $this->model['error'] = new ErrorModel("Failed to resolve id");
      return new View($this->model, "error.php");
    }
    
    $service = new ArticleService();
    $this->model['article'] = $service->getArticle($_GET['id']);
    return new View($this->model, "article.php");
  }
}?>