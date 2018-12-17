<?php
session_start();
?>
<?php
require_once("header.php");
?>
    <div class="container">
    <?php
    if (isset($_SESSION['user'])) {
      require_once 'pgadm.php';
    } else {
      include_once 'form_login.php';
    }
     ?>
  </div>
<?php require_once("footer.php"); ?>
