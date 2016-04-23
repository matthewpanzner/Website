<?php if(!isset($role) || $role !== "admin") header("Location: index.php");?>
      <section class="container">
        <form class="base-form" action="<?php if(isset($this->model['article'])) echo "index.php?controller=ArticleController&action=onUpdate&id=" . $this->model['article']->id; else echo "index.php?controller=ArticleController&action=onAdd"; ?>" method="post">
          <input type="text" name="title" placeholder="title" required autofocus value="<?php if(isset($this->model['article'])) echo $this->model['article']->title; ?>"/>
          <textarea rows="5" cols="30" name="summary" placeholder="summary" required value><?php if(isset($this->model['article'])) echo $this->model['article']->summary; ?></textarea>
          <textarea rows="20" cols="64" name="content" placeholder="content" required><?php if(isset($this->model['article'])) echo $this->model['article']->content; ?></textarea>
          <input type="text" name="publication-date" value=<?php echo date("Y-m-d")?> readonly required/>
          <select name='folder' required>
<?php
  $numOfFolders = count($this->model['folders']);
  for($i = 0; $i < $numOfFolders; $i++){
    $folderId = $this->model['folders'][$i]->folderId;
    $folderName = $this->model['folders'][$i]->name;?>
            
            <option value='<?php echo $folderId;?>'<?php if(isset($_GET['folderId']) && $_GET['folderId'] == $folderId) echo "selected";?>><?php echo $folderName;?></option>
<?php }?>
          </select>
          <input type="submit"/>       
        </form>
      </section>
