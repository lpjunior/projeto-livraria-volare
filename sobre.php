<?php
$app->get('/sobre', function ($request, $response, $args) {
?>
<script type="text/javascript" src="js/sobre.js"></script>
<section class="col col-md-4 col-lg-4 centraliza text-center mb-5 pt-4">
    <div class="has-animation animation-ltr" data-delay="10">
      <p class="bigger d-none d-sm-block">Sobre a Volare </p>
    </div>

    <div class="has-animation animation-rtl" data-delay="1000">
      <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
<!--
    <div class="has-animation animation-rtl pb-5 " data-delay="2000">
      <img src="https://placeimg.com/340/280/nature" class="" alt="imagem" />
    </div> -->
</section>
<?php }); ?>
