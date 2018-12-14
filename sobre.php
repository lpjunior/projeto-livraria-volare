<?php
$app->get('/sobre', function ($request, $response, $args) {
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sobre.css">
<script type="text/javascript" src="js/sobre.js"></script>

<!------ Include the above in your HEAD tag ---------->

<br>
<div class="has-animation animation-ltr" data-delay="10">
  <p class="bigger">Sobre a Volare </p>
</div>

<br>
<br>

<div class="has-animation animation-rtl" data-delay="1000">
  <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
<br>
<br>

<br>
<br>
<div class="has-animation animation-rtl" data-delay="2000">
  <img src="https://placeimg.com/640/480/nature" width="600" />
</div>

</script>

<?php }); ?>
