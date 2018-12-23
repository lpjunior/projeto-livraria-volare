<?php require_once("header.php"); ?>
<?php
session_start();
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
?>
<section class="container-fluid  centraliza pr-4 mt-4 mb-4">
  <div class=" row COLORE bordasb col-md-10 mb-4 centraliza">
                  <div class="col-md-6 float-left mt-4">
                      <form action="../php/CRUDS/inserirLivro.php" method="post" enctype="multipart/form-data">
                          <!-- INPUT IMAGEM-->
                            <label for="capa">Imagem capa:</label>
                            <input type="file" class="form-control-file" id="capa" name="foto">
                          <!-- / input imagem --><br/>
                          <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" class="form-control col-8" name="titulo" id="titulo" maxlength="45">
                          </div>
                          <div class="form-group">
                            <label for="autor">Autor:</label>
                            <input type="text" class="form-control col-8" name="autor" id="autor" maxlength="80">
                          </div>
                          <div class="form-group">
                            <label for="editora">Editora:</label>
                            <input type="text" class="form-control col-8" name="editora" id="editora" maxlength="45">
                          </div>
                          <div class="form-group">
                            <label for="categoria">Categoria:</label>

                            <select class="custom-select col-5" id="categoria" name="categoria">
                              <option selected>Selecione a categoria</option>
                              <?php
                              $categoria = serviceListarCategoria();
                              foreach ($categoria as $i) {
                              ?>
                                <option value="<?=$i['id']?>"><?=$i['categoria']?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="subcat">Subcategoria:</label>
                            <select class="custom-select col-5" id="subcat" name="subcategorias">
                                <option selected>Selecione um assunto</option>
                                <?php
                                $subcategoria = serviceListarSubcategoria();
                                foreach ($subcategoria as $i) {
                                ?>
                                <option value="<?=$i['id']?>"><?=$i['assunto']?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="tipocapa">Tipo de capa:</label>
                            <select class="custom-select col-6" id="tipocapa" name="capa">
                                <option selected>Selecione o tipo de capa</option>
                                <?php
                                $capa = serviceListarCapa();
                                foreach ($capa as $i) {
                                ?>
                                <option value="<?=$i['id']?>"><?=$i['tipodecapa']?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="idioma">Idioma:</label>
                            <select class="custom-select col-5" id="idioma" name="idioma">
                                <option selected>Selecione o idioma</option>
                                <?php
                                $idioma = serviceListarIdioma();
                                foreach ($idioma as $i) {
                                ?>
                                <option value="<?=$i['id']?>"><?=$i['idioma']?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="fornecedor">Fornecedor:</label>
                            <select class="custom-select col-5" id="fornecedor" name="fornecedor">
                                <option selected>Selecione o fornecedor</option>
                                <?php
                                $capa = serviceListarFornecedor();
                                foreach ($capa as $i) {
                                ?>
                                <option value="<?=$i['id']?>"><?=$i['nome']?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="isbn">ISBN:</label>
                            <input type="text" class="form-control col-4" name="ISBN" id="isbn" maxlength="13">
                          </div>
                    </div>
                    <div class="col-md-6 float-left mt-4">

                          <div class="form-group">
                            <label for="datapub">Ano de publicação da edição:</label>
                            <input type="number" class="form-control col-2" name="data_publicacao" id="datapub" maxlength="4">
                          </div>
                          <div class="form-group">
                            <label for="numpag">Número de páginas:</label>
                            <input type="num" class="form-control col-2" name="numeropaginas" id="numpag" maxlength="4">
                          </div>
                          <div class="form-group">
                            <label for="text">Peso:</label>
                            <input type="text" class="form-control col-2" name="peso" id="peso" maxlength="5">
                          </div>
                          <div class="form-group">
                            <label for="preco">Preço:</label>
                            <input type="number" class="form-control col-2" name="preco" id="preco" maxlength="3">
                          </div>
                          <!--quantidade -->
                          <div class="form-group">
                            <label for="qtdProd">Quantidade:</label><br/>
                              <input type="text" name="quantidade" id="qtdProd" style="display:inline" maxlength="4" class="text-center form-control col-2" value="">
                          </div>
                          <!-- /quantidade -->
                          <div class="form-group">
                            <label for="dimension">dimensões:</label>
                            <input type="text" class="form-control col-2" name="dimensoes" id="dimension" maxlength="10">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sinopse</label>
                            <textarea class="form-control" name="sinopse" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                      <button name="" type="submit" class="btn COLORE1 float-right btn-outline-secondary">Submeter edição</button>
                      </form>
                  </div>
  </div>
</section>
<?php require_once("footer.php"); ?>
