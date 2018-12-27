<?php
$app->get('/sobre', function ($request, $response, $args) {
?>
<script type="text/javascript" src="js/sobre.js"></script>
<section class="col-md-4 col-lg-4 centraliza text-center pt-4">
    <div class="has-animation animation-ltr" data-delay="10">
      <p class="bigger">Sobre a Volare </p>
    </div>

    <div class="has-animation animation-rtl" data-delay="1000">
      <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

    <div class="has-animation animation-rtl" data-delay="2000">
      <img src="https://placeimg.com/640/480/nature" alt="" width="600" />
    </div>
</section>
<?php }); ?>
