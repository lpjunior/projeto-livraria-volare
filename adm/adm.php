
<?php 
session_start(); 
session_unset();
session_destroy();
 
?>
	

<?php require_once("header.php"); ?>
    <div class="container">
    <?php
      if(isset($_GET['page']) && $_GET['page'] !== '') {
        include $_GET['page'] . '.php';
      } else {
        include_once 'form_login.php';
      }
     ?>
  </div>
<?php require_once("footer.php"); ?>