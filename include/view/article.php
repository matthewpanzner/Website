      <article class="article">
        <div id="article-title">
          <h1><?php echo $this->model['article']->title;?></h1>
        </div>
        <div class="content">
<?php echo formatHtml(htmlspecialchars_decode($this->model['article']->content), 10);?>
          <h5><?php echo $this->model['article']->publicationDate;?></h5>
        </div>
      </article>
