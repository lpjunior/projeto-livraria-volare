<?php
if (!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
if (isset($_GET['inserir']) && $_GET['inserir'] == true){
	echo "<script>alert('Produto inserido com sucesso!')</script>";
} elseif(isset($_GET['inserir']) && $_GET['inserir'] == false) {
	echo "<script>alert('Falha ao inserir o livro!')</script>";
}
require_once("header.php");
?>
<section class="container-fluid  centraliza pr-4 mt-4 mb-4">
  <div class=" row COLORE bordasb col-md-10 mb-4 centraliza">
                  <div class="col-md-6 float-left mt-4">
                      <form action="../php/CRUDS/inserirLivro.php" method="post" enctype="multipart/form-data">
                          <!-- INPUT IMAGEM-->
                            <label for="capa">Imagem capa:</label>
                            <input type="file" class="form-control-file" id="capa" name="foto" required="required">
                          <!-- / input imagem -->
													<br/>
                          <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" class="form-control col-8" name="titulo" id="titulo" maxlength="60" required="required">
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
                            <label for="categoria">Categoria:</label>

                            <select class="custom-select col-5" id="categoria" name="categoria">
                              <option selected>Selecione a categoria</option>
                              <?php
															// Função para listar todas as categorias do banco
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
																// Função para listar todas as subcategorias do banco
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
																// Função para listar todas os tipos de capa do banco
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
																// Função para listar todos os idiomas do banco
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
																// Função para listar os fornecedores registrados
                                $capa = serviceListarFornecedor(NULL);
                                foreach ($capa as $i) {
                                ?>
                                <option value="<?=$i['id']?>"><?=$i['nome']?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="isbn">ISBN:</label>
                            <input type="text" class="form-control col-4" name="ISBN" id="isbn" maxlength="13" required="required">
                          </div>
                    </div>
                    <div class="col-md-6 float-left mt-4">

                          <div class="form-group">
                            <label for="datapub">Ano de publicação da edição:</label>
                            <input type="number" class="form-control col-2" name="data_publicacao" id="datapub" maxlength="4" required="required">
                          </div>
                          <div class="form-group">
                            <label for="numpag">Número de páginas:</label>
                            <input type="num" class="form-control col-2" name="numeropaginas" id="numpag" maxlength="4" required="required">
                          </div>
                          <div class="form-group">
                            <label for="text">Peso:</label>
                            <input type="text" class="form-control col-2" name="peso" id="peso" maxlength="5" required="required">
                          </div>
                          <div class="form-group">
                            <label for="preco">Preço:</label>
                            <input type="string" class="form-control col-2" name="preco" id="preco" maxlength="5" required="required">
                          </div>
                          <!--quantidade -->
                          <div class="form-group">
                            <label for="qtdProd">Quantidade:</label><br/>
                              <input type="text" name="quantidade" id="qtdProd" style="display:inline" maxlength="4" class="text-center form-control col-2" value="">
                          </div>
                          <!-- /quantidade -->
                          <div class="form-group">
                            <label for="dimension">dimensões:</label>
                            <input type="text" class="form-control col-2" name="dimensoes" id="dimension" maxlength="10" required="required">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sinopse</label>
                            <textarea class="form-control" name="sinopse" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                      <button name="btn-livro-enviar" type="submit" class="btn COLORE1 float-right btn-outline-secondary">Cadastrar</button>
                      </form>
                  </div>
  </div>
</section>
<?php require_once("footer.php"); ?>
