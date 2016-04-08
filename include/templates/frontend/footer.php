    </section>
    <footer class="primary-footer">
      <ul class="acc-nav">
<?php if(!isset($_SESSION['logged_in'])):?>
        <li><a href="index.php?route=login">Login</a></li>
        <li><a href="index.php?route=registration">Register</a></li>
<?php else: ?>
        <li><a href="index.php?controller=LoginController&action=onLogout">Logout</a></li>
<?php endif;?>
      </ul>
    </footer>
  </body>
</html>