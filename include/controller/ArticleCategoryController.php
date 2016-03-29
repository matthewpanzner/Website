<?php
require_once(CLASS_DIR . "/model/ArticleCategoryService.php");

class ArticleCategoryController extends Controller{
  public function onAdd(){
    if(!$this->authenticate("admin")){
      $this->model['error'] = new ErrorModel("Unauthorized Access");
      return new View($this->model, "error.php");
    }
      
    
    if(!(isset($_POST["title"]) &&isset($_POST["summary"]))){
      $this->model['error'] = new ErrorModel("Required Fields not all filled out!");
      return new View($this->model, "error.php");
    }
      
    $service = new ArticleCategoryService();
    $data = [
      "name" => $_POST["title"],
      "summary" => $_POST["summary"]
    ];
    echo $_POST["title"];
    if($service->addCategory($data)){
      $this->model['msg'] = "Successfully added";
      return new View(null, "home.php");
    }
    else{
      $this->model['error'] = new ErrorModel("Could not add category!");
      return new View($this->model, "error.php");
    }
  }
  
  public function onGetCategories(){
    $service = new ArticleService();
    $this->model['categories'] = $service->getCategories();
    return new View($this->model, "article-categories.php");
  }
}?>