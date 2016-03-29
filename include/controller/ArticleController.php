<?php
require_once(CLASS_DIR . "/model/ArticleService.php");

class ArticleController extends Controller{
  public function onAdd(){
    if(!$this->authenticate("admin")){
      $this->model['error'] = new ErrorModel("Unauthorized Access");
      return new View($this->model, "error.php");
    }
      
    
    if(!(isset($_POST["title"]) && isset($_POST["category"]) && isset($_POST["summary"]) && isset($_POST["content"]) && isset($_POST["publication-date"]))){
      $this->model['error'] = new ErrorModel("Required Fields not all filled out!");
      return new View($this->model, "error.php");
    }
      
    $service = new ArticleService();
    $data = [
      "title" => $_POST["title"],
      "category" => $_POST["category"],
      "summary" => $_POST["summary"],
      "content" => $_POST["content"],
      "publicationDate" => $_POST["publication-date"]
    ];
    
    if($service->addArticle($data)){
      $this->model['msg'] = "Successfully added";
      return new View(null, "home.php");
    }
    else{
      $this->model['error'] = new ErrorModel("Could not register user!");
      return new View($this->model, "error.php");
    }
  }
  
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
  
  public function onGetCategories(){
    $service = new ArticleService();
    $this->model['categories'] = $service->getCategories();
    return new View($this->model, "article-categories.php");
  }
}?>