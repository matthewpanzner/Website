      <section class="article">
        <div class="content">
           <h1 id="article-title"><?php echo $this->model['article']->title?></h1>
        <?php echo $this->model['article']->content?>
        </div>
        <h5><?php echo $this->model['article']->publicationDate?></h5>
      </section>
