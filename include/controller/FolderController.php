<?php
require_once(CLASS_DIR . "/model/FolderService.php");
require_once(CLASS_DIR . "/model/ArticleService.php");

class FolderController extends Controller{
  public function onAdd(){
    if(!$this->authenticate("admin")){
      $this->model['error'] = new ErrorModel("Unauthorized Access");
      return new View($this->model, "error.php");
    }
      
    
    if(!(isset($_POST["title"]) &&isset($_POST["summary"]))){
      $this->model['error'] = new ErrorModel("Required Fields not all filled out!");
      return new View($this->model, "error.php");
    }
      
    $service = new FolderService();
    $data = [
      "name" => $_POST["title"],
      "summary" => $_POST["summary"]
    ];
    
    if($service->addCategory($data)){
      $this->model['msg'] = "Successfully added";
      $this->model['reroute'] = true;
      $category = $service->getCategory($data["name"]);
      return new View($this->model, "index.php?controller=ArticleController&action=onGetArticlesByCategory&c=" . $category->id);
    }
    else{
      $this->model['error'] = new ErrorModel("Could not add category!");
      return new View($this->model, "error.php");
    }
  }
  
  
  
  public function onDelete(){
    if(!$this->authenticate("admin")){
        $this->model['error'] = new ErrorModel("Unauthorized Access");
        return new View($this->model, "error.php");
    }
    
    $service = new FolderService();
    
    if(!isset($_GET['id'])){
      $this->model['error'] = new ErrorModel("Unresolvsed URI");
      return new View($this->model, "error.php");
    }  
    
    if($service->deleteCategory($_GET['id'])){
      $this->model['msg'] = "Deletion was successful";
      $this->model['reroute'] = true;
      
      return new View($this->model, "index.php?controller=ArticleCategoryController&action=onGetCategories");
    }
    else{
      $this->model['error'] = new ErrorModel("Error in deleting!");
      return new View($this->model, "error.php");
    }
  }
  
  
  public function onGetCategories(){
    if(!isset($_GET['name'])){
      $this->model['error'] = new ErrorModel("Invalid URI");
      return new View($this->model, "error.php");
    }
    
    $service = new FolderService();
     
    $folder = $service->getFolder($_GET['name']);
 
    $this->model['folders'] = $service->getChildren($folder);
    $this->model['articles'] = $service->getArticlesByFolder($folder->folderId);
    
    if($this->model['folders'] == null && $this->model['articles'] == null){
      $this->model['error'] = new ErrorModel("There are is no content here!");
      return new View($this->model, "error.php");
    }
 
       
    return new View($this->model, "folders.php");
  }
}?>