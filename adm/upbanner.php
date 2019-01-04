<?php
if (!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
require_once("header.php");
// Não funcional.
?>
<section class="container-fluid col-md-12 centraliza mt-4 mb-4">
        <div class="row">
                  <!-- BANNER CONFIG -->
                    <div id="bannerconfig" class="col-md-6 COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3">
                      <!-- INPUT IMAGEM-->
                        <label for="capa">Banner 1:</label>
                        <input type="file" class="form-control-file" id="capa" required="required" >
                      <!-- / input imagem --><br/>
                      <!-- INPUT IMAGEM-->
                        <label for="capa">Banner 2:</label>
                        <input type="file" class="form-control-file" id="capa" required="required" >
                      <!-- / input imagem --><br/>
                      <!-- INPUT IMAGEM-->
                        <label for="capa">Banner 3:</label>
                        <input type="file" class="form-control-file" id="capa" required="required" >
                      <!-- / input imagem --><br/>
                      <button name="btn-livro-enviar" type="submit" class="btn COLORE1 float-right btn-outline-secondary">Upload</button>
                    </div>
        </div>
</section>
