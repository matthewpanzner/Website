<?php if(!isset($role) || $role !== "admin") header("Location: index.php");?>
    <section class="container">
      <form class="base-form" action="index.php?controller=Folder&action=onAdd" method="post">
        <input type="text" name="name" placeholder="title" required autofocus/>
        <input type="text" name="summary" placeholder="summary" required/>
        <select name='color'>
<?php
  $numOfColors = count($this->model['colors']);
  for($i = 0; $i < $numOfColors; $i++){
    $colorName = $this->model['colors'][$i]->name;?>          
          <option value='<?php echo $colorName;?>'><?php echo $colorName;?></option>
<?php }?>    
        </select>
        <select name="visibility">
          <option value="visible">Visible</option>
          <option value="invisible">Invisible</option>
        </select>
        <select name='parentId' required>
<?php
  $numOfFolders = count($this->model['folders']);
  for($i = 0; $i < $numOfFolders; $i++){
    $folderId = $this->model['folders'][$i]->folderId;
    $folderName = $this->model['folders'][$i]->name;?>          
          <option value='<?php echo $folderId;?>'<?php if((isset($_GET['folderId']) && $_GET['folderId'] == $folderId) || (isset($this->model['folder']) && $this->model['folder']->parentId == $folderId)) echo "selected"; ?>><?php echo $folderName;?></option>
<?php }?>
        <input type="text" name="owner" required readonly value="<?php echo $_SESSION['username'];?>"/>
        <input type="submit"/>
      </form>
    </section>