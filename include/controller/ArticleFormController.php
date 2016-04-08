<?php
require_once(CLASS_DIR . "/model/ArticleService.php");
require_once(CLASS_DIR . "/model/ArticleCategoryService.php");

class ArticleFormController extends Controller{
  public function onLoad(){
    $acS = new ArticleCategoryService();
    $this->model['categories'] = $acS->getCategories();
    
    if(isset($_GET['id'])){
      $service = new ArticleService();
      $this->model['article'] = $service->getArticle($_GET['id']);
      $service = null;
    }
    return new View($this->model, "/admin/article-form.php");
  }
}?>