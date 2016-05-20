<?php
require_once(CLASS_DIR . "/model/ArticleService.php");
require_once(CLASS_DIR . "/model/FolderService.php");
require_once(CLASS_DIR . "/model/ColorService.php");

class FolderFormController extends Controller{
  public function onLoad(){
    $acS = new FolderService();
    $cS = new ColorService();
      
    $this->model['folders'] = $acS->getFolders();
    $this->model['colors'] = $cS->getColors();
    
    if(isset($_GET['newFolderId'])){
      $service = new ArticleService();
      $this->model['article'] = $service->getArticle($_GET['newFolderId']);
      $service = null;
    }
    return new View($this->model, "/admin/folder-form.php");
  }
}?>