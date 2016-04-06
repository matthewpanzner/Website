<section class="container">
  <p>WELCOME <?php if(isset($_SESSION['logged_in'])) echo $_SESSION['username'] . " " . $role;?></p>
</section>
