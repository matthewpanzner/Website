<?php
require_once(CLASS_DIR . "/model/FolderService.php");
require_once(CLASS_DIR . "/model/ArticleService.php");
require_once(CLASS_DIR . "/model/UserServiceImpl.php");

class FolderController extends Controller{
  public function onAdd(){
    if(!$this->authenticate("admin")){
      $this->model['error'] = new ErrorModel("Unauthorized Access");
      return new View($this->model, "error.php");
    }
      
    
    if(!(isset($_POST["name"]) &&isset($_POST["summary"]) && isset($_POST['visibility']) && isset($_POST['owner'])) && isset($_POST['parentId'])){
      $this->model['error'] = new ErrorModel("Required Fields not all filled out!");
      return new View($this->model, "error.php");
    }
      
    $service = new FolderService();
    $uService = new UserServiceImpl();
    $user = $uService->getUser($_POST['owner']);
    
    $data = [
      "name" => $_POST["name"],
      "summary" => $_POST["summary"],
      "visibility" => $_POST["visibility"],
      "ownerId" => $user->id,
      "parentId" => $_POST["parentId"]
    ];
    
    if($service->addFolder($data)){
      $this->model['msg'] = "Successfully added";
      $this->model['reroute'] = true;
      
      //This needs to be changed.  Name is not unique.  Perhaps main and parentId can share a composite key.  
      //  Or create a hash table to manually create the IDs
      $folder = $service->getFolderByName($data["name"], $data["parentId"]);
      return new View($this->model, "index.php?controller=Folder&action=onGetFolders&id=" . $folder->parentId);
    }
    else{
      $this->model['error'] = new ErrorModel("Could not add folder!");
      return new View($this->model, "error.php");
    }
  }
  
  
  
  public function onDelete(){
    if(!$this->authenticate("admin")){
        $this->model['error'] = new ErrorModel("Unauthorized Access");
        return new View($this->model, "error.php");
    }
    
    $service = new FolderService();
    
    if(!isset($_GET['folderId'])){
      $this->model['error'] = new ErrorModel("Unresolvsed URI");
      return new View($this->model, "error.php");
    }  
    
    $folder = $service->getFolder($_GET['folderId']);
    if($service->deleteFolder($_GET['folderId'])){
      $this->model['msg'] = "Deletion was successful";
      $this->model['reroute'] = true;
      
      //This should always work because I have deleting the ROOT unable to do, unless a script is specifically written
      // for this behaviour
      return new View($this->model, "index.php?controller=Folder&action=onGetFolders&id=" . $folder->parentId);
    }
    else{
      $this->model['error'] = new ErrorModel("Error in deleting! There might be items in folder!");
      return new View($this->model, "error.php");
    }
  }
  
  
  public function onGetFolders(){
    if(!isset($_GET['id'])){
      $this->model['error'] = new ErrorModel("Invalid URI");
      return new View($this->model, "error.php");
    }
    
    $service = new FolderService();
     
    $folder = $service->getFolder($_GET['id']);
 
    $this->model['currFolder'] = $folder;
    $this->model['parentFolder'] = $service->getFolder($folder->parentId);
    $this->model['folders'] = $service->getChildren($folder);
    $this->model['articles'] = $service->getArticlesByFolder($folder->folderId);
    
    if($this->model['folders'] == null && $this->model['articles'] == null){
      $this->model['msg'] = "There are is no content here!";
      return new View($this->model, "folders.php");
    }
 
       
    return new View($this->model, "folders.php");
  }
}?>