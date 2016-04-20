<?php
require_once(CLASS_DIR . "/model/ArticleService.php");
require_once(CLASS_DIR . "/model/FolderService.php");

class ArticleFormController extends Controller{
  public function onLoad(){
    $acS = new FolderService();
    $this->model['folders'] = $acS->getFolders();
    
    if(isset($_GET['articleId'])){
      $service = new ArticleService();
      $this->model['article'] = $service->getArticle($_GET['articleId']);
      $service = null;
    }
    return new View($this->model, "/admin/article-form.php");
  }
}?>