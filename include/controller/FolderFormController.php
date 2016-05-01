<?php
require_once(CLASS_DIR . "/model/ArticleService.php");
require_once(CLASS_DIR . "/model/FolderService.php");

class FolderFormController extends Controller{
  public function onLoad(){
    $acS = new FolderService();
    $this->model['folders'] = $acS->getFolders();
 
    if(isset($_GET['newFolderId'])){
      $service = new ArticleService();
      $this->model['article'] = $service->getArticle($_GET['newFolderId']);
      $service = null;
    }
    return new View($this->model, "/admin/folder-form.php");
  }
}?>