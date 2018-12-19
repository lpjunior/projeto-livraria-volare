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
                <ul class="nav flex-column COLORE bordasb" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link linkstyle" data-toggle="pill" href="#cadastrarpro"><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;cadastrar produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkstyle" data-toggle="pill" href="#cadastrarfor"><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;cadastrar fornecedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkstyle" data-toggle="pill" href="#bannerconfig"><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;configurar banner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkstyle" data-toggle="pill" href="totalestoque"><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;Total estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkstyle" data-toggle="pill" href="#vendas"><i class="opacidade fas fa-caret-right"></i>&nbsp;&nbsp;Vendas</a>
                    </li>
                </ul>
                </div>
                <!-- conteúdo -->
								<div class="tab-content col-md-9">
                  <!-- CADASTRO PRODUTO -->
                    <div id="cadastrarpro" class="tab-pane COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3">
                      <form action="#" method="post" enctype="multipart/form-data">
                        <!-- uploadImg($_POST) -->
                          <!-- INPUT IMAGEM-->
                            <label for="capa">Imagem capa:</label>
                            <input type="file" class="form-control-file" id="capa" name="foto" required="required" >
                          <!-- / input imagem --><br/>
                          <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" class="form-control col-8" name="titulo" id="titulo" maxlength="45" required="required">
                          </div>
                          <div class="form-group">
                            <label for="autor">Autor:</label>
                            <input type="text" class="form-control col-8" name="autor" id="autor" maxlength="80" required="required">
                          </div>
                          <div class="form-group">
                            <label for="editora">Editora:</label>
                            <input type="text" class="form-control col-8" name="editora" id="editora" maxlength="45" required="required">
                          </div>
                          <div class="form-group">
                            <label for="categ">Categoria:</label>
                            <input type="text" class="form-control col-8" name="categoria" id="categ" maxlength="30" required="required">
                          </div>
                          <div class="form-group">
                            <label for="tipocapa">Tipo de capa:</label>
                            <input type="text" class="form-control col-8" name="capa" id="tipocapa" maxlength="30" required="required">
                          </div>
                          <div class="form-group">
                            <label for="subcategoria">Assunto:</label>
                            <input type="text" class="form-control col-2" name="subcategorias" id="subcategoria" maxlength="45">
                          </div>
                          <div class="form-group">
                            <label for="idioma">idioma:</label>
                            <input type="text" class="form-control col-2" id="idioma" maxlength="9" required="required">
                          </div>
                          <div class="form-group">
                            <label for="isbn">ISBN:</label>
                            <input type="text" class="form-control col-4" id="isbn" maxlength="13" required="required">
                          </div>
                          <div class="form-group">
                            <label for="datapub">Data de publicação:</label>
                            <input type="date" class="form-control col-4" id="datapub" maxlength="30" required="required">
                          </div>
                          <div class="form-group">
                            <label for="numpag">Número de páginas:</label>
                            <input type="num" class="form-control col-2" id="numpag" maxlength="4" required="required">
                          </div>
                          <div class="form-group">
                            <label for="text">Peso:</label>
                            <input type="text" class="form-control col-2" id="peso" maxlength="5" required="required">
                          </div>
                          <div class="form-group">
                            <label for="preco">Preço:</label>
                            <input type="number" class="form-control col-2" id="preco" maxlength="3" required="required">
                          </div>
                          <!--quantidade -->
                          <div class="form-group">
                            <label for="qtdProd">Quantidade:</label><br/>
                              <button id="btnMenus" class="btn btn-light btn-sm">-</button>
                              <input type="number" id="qtdProd" style="display:inline" maxlength="4" class="text-center form-control col-2" value="">
                              <button id="btnPlus" class="btn btn-light btn-sm">+</button>
                          </div>
                          <!-- /quantidade -->
                          <div class="form-group">
                            <label for="dimension">dimensões:</label>
                            <input type="text" class="form-control col-2" id="dimension" maxlength="10" required="required">
                          </div>
                          <div class="form-group">
                            <label for="idfornecedor">Fornecedor:</label>
                            <input type="number" class="form-control col-2" id="idfornecedor" maxlength="9" required="required">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sinopse</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="400"></textarea>
                          </div>
                      </form>
                      <a class="btn COLORE1 btn-outline-secondary" href="">Adicionar</a>
                    </div>
								</div>
								<div class="tab-content col-md-9">
                  <!-- CADASTRO FORNECEDOR -->
                    <div id="cadastrarfor" class="tab-pane COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3">
                      <form>
                          <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control col-8" id="nome" maxlength="100" required="required">
                          </div>
                          <div class="form-group">
                            <label for="rsocial">Razão Social:</label>
                            <input type="text" class="form-control col-8" id="rsocial" maxlength="50" required="required">
                          </div>
                          <div class="form-group">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" class="form-control col-8" id="cnpj" maxlength="45" required="required">
                          </div>
                          <div class="form-group">
                            <label for="end">Endereço:</label>
                            <input type="text" class="form-control col-8"  id="end" maxlength="45" required="required">
                          </div>
                          <div class="form-group">
                            <label for="tel">Telefone:</label>
                            <input type="text" class="form-control col-8"  id="tel" maxlength="45" required="required">
                          </div>
                          <div class="form-group">
                            <label for="mail">E-mail:</label>
                            <input type="mail" class="form-control col-2" id="mail" maxlength="45">
                          </div>
                          <div class="form-group">
                            <label for="formap">Forma de pagamento:</label>
                            <input type="text" class="form-control col-2" id="formap" maxlength="45" required="required">
                          </div>
                      <a class="btn COLORE1 btn-outline-secondary" href="">Adicionar</a></div>
                    </form>
								</div>
                <div class="tab-content col-md-9">
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
								<div class="tab-content col-md-9">
                  <!-- ESTOQUE -->
                    <div id="totalestoque" class="tab-pane COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3"></div>
								</div>
                <!-- VENDAS -->
								<div class="tab-content col-md-9">
                    <div id="vendas" class="tab-pane COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3"></div>
								</div>
						</div>
        </div>
</section>

<?php require_once("footer.php"); ?>
