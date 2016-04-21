      <div class='grid grid-1-2'>
<?php 
  $numOfFolders = count($this->model['folders']);
  for($i = 0; $i < $numOfFolders; $i++){?>
        <div class='grid_cell'>
          <div class='grid_cell--content article_cell grid-shadow'>
            <div class='article_cell-title'>
              <a href='index.php?controller=Article&action=onGetArticlesByCategory&c='>
                <h2><?php echo $this->model['folders'][$i]->name;?></h2>
              </a>
            </div>
            <div class='article_cell-body'>
              <p><?php $this->model['folders'][$i]->summary;?></p>
<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && isset($role) && $role === 'admin'):?>
              <a id='article-delete' href='index.php?controller=Folder&action=onDelete&id=<?php echo $this->model['folders'][$i]->id;?>'>delete</a>
              <a id='article-edit' href='#'>edit</a>
<?php endif?>
            </div>
          </div>
        </div>
<?php }?>
<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && isset($role) && $role === 'admin'):?>
        <div class='grid_cell'>
          <div class='grid_cell--content grid-shadow'>
             <a href='index.php?route=FIXME'>add</a>
          </div>
        </div>
<?php endif?>
      </div>
