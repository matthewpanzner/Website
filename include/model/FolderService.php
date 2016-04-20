<?php
require_once(CLASS_DIR . "/entity/folder/Folder.php");
require_once(CLASS_DIR . "/utils/database/DAO.php");

class ArticleCategoryService{
  private $dao;
  
  public function __construct(){
    $this->dao = new DAO();
  }
  
  private function alreadyExists($folder){
    $args[0] = $folder->name;
    
    //See 1.0013.-- for up-to-date information on query
    if(mysqli_num_rows($this->dao->select("selectFolderByNameQuery", $args)) > 0)
      return true;
    return false;
  }
  private function countArticles($folderId){
    $args[0] = $folderId;
    
  //See 1.0014.-- for up-to-date information on query    
    $result = $this->dao->select("countArticlesInFolderQuery", $args);
    $row = mysqli_fetch_row($result);
    return $row[0];
  }
  
  public function addFolder($data){
    $folder = new Folder($data);
    $args[0] = $folder->name;
    $args[1] = $folder->summary;
    $args[2] = $folder->visibility;
    $args[3] = $folder->ownerId;
    $args[4] = $folder->parentId;
    
    if($this->alreadyExists($folder))
      return false;
    
    //See 1.0011.-- for up-to-date information on query
    $this->dao->insert("addFolderQuery", $args);
    return true;
  }
  public function getFolders){
    $args[0] = "Folder";
    
    //See 1.0001.-- for up-to-date information on query
    return $this->dao->select("selectAllQuery", $args);
  }
  
  public function getFolder($name){
    $args[0] = $name;
    
    //See 1.0013.-- for up-to-date information on query
    $row = mysqli_fetch_row($this->dao->select("selectFolderByNameQuery", $args));
    $data["folderId"] = $row[0];
    $data["name"] = $row[1];
    $data["summary"] = $row[2];
    $data["visibility"] = $row[3];
    $data["ownerId"] = $row[4];
    $data["parentId"] = $row[5];
    
    return new Folder($data);
  }
  public function deleteCategory($folderId){
    $args[0] = $folderId;
    if($this->countArticles($folderId) != 0)
      return false;
    
    //See 1.0012.-- for up-to-date information on query
    $this->dao->delete("deleteArticleCategoryQuery", $args); // do check here later for how many rows effected
    return true;
  }
}?>