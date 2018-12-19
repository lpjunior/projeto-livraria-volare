<?php require_once("header.php"); ?>

<?php /*
session_start();
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');

} */
?>
<section class="container-fluid col-md-8 centraliza mt-4 mb-4">
        <div class="row">
                <div class="col-md-3">
                  <!-- nav links -->
                      <ul class="nav flex-column COLORE bordasb">

                          <li class="nav-item">
                              <a class="nav-link linkstyle" ><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;cadastrar produto</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link linkstyle" ><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;cadastrar fornecedor</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link linkstyle" ><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;configurar banner</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link linkstyle"><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;Total estoque</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link linkstyle"><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;Vendas</a>
                          </li>
                      </ul>
                </div>
                <!-- conteúdo -->
								<div class="col-md-9">
                  <!-- BANNER CONFIG -->
                    <div id="bannerconfig" class="tab-pane COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3">
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
                    </div>
                </div>
        </div>
</section>
