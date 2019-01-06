<?php
if (!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
require_once("header.php");
?>
<section class="container-fluid  centraliza pr-4 mt-4 mb-4">
  <div class=" row COLORE bordasb col-md-10 mb-4 centraliza">
                <div class="col-md-6 float-left mt-4">
										<?php
										$livro = serviceDetalhesLivro($_GET['id']);
										foreach ($livro as $i) {
										?>
                      <form action="../php/CRUDS/editarLivro.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
                          <!-- INPUT IMAGEM-->
                            <label for="capa">Imagem capa:</label>
                            <input type="file" class="form-control-file" id="capa" name="foto">
                          <!-- / input imagem --><br/>
                          <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" class="form-control col-8" name="titulo" id="titulo" maxlength="45" value="<?=$i['titulo']?>">
                          </div>
                          <div class="form-group">
                            <label for="autor">Autor:</label>
                            <input type="text" class="form-control col-8" name="autor" id="autor" maxlength="80" value="<?=$i['autor']?>">
                          </div>
                          <div class="form-group">
                            <label for="editora">Editora:</label>
                            <input type="text" class="form-control col-8" name="editora" id="editora" maxlength="45" value="<?=$i['editora']?>">
                          </div>
                          <div class="form-group">
                            <label for="categoria">Categoria:</label>

                            <select class="custom-select col-5" id="categoria" name="categoria">
                              <option selected>Selecione a categoria</option>
                              <?php
															// Função para listar as categorias
                              $categoria = serviceListarCategoria();
                              foreach ($categoria as $b) {
																// Caso a categoria listada seja o categoria do livro, deixe ela selecionado.
                              ?>
                                <option value="<?=$b['id']?>" <?=($b['categoria'] == $i['categoria'] ? "selected" : '')?>><?=$b['categoria']?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="subcat">Subcategoria:</label>
                            <select class="custom-select col-5" id="subcat" name="subcategorias">
                                <option selected>Selecione um assunto</option>
                                <?php
																// Função para listar as subcategorias
                                $subcategoria = serviceListarSubcategoria();
                                foreach ($subcategoria as $b) {
																	// Caso a subcategoria listada seja o subcategoria do livro, deixe ela selecionado.
                                ?>
                                <option value="<?=$b['id']?>" <?=($b['assunto'] == $i['assunto'] ? "selected" : '')?>><?=$b['assunto']?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="tipocapa">Tipo de capa:</label>
                            <select class="custom-select col-6" id="tipocapa" name="capa">
                                <option selected>Selecione o tipo de capa</option>
                                <?php
																// Função para listar os tipos de capa
                                $capa = serviceListarCapa();
                                foreach ($capa as $b) {
																	// Caso o tipo de capa listado seja o tipo de capa do livro, deixe ele selecionado.
                                ?>
                                <option value="<?=$b['id']?>" <?=($b['tipodecapa'] == $i['tipo_capa'] ? "selected" : '')?>><?=$b['tipodecapa']?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="idioma">Idioma:</label>
                            <select class="custom-select col-5" id="idioma" name="idioma">
                                <option selected>Selecione o idioma</option>
                                <?php
																// Função para listar os idiomas
                                $idioma = serviceListarIdioma();
                                foreach ($idioma as $b) {
																	// Caso o idioma listado seja o idioma do livro, deixe ele selecionado
                                ?>
                                <option value="<?=$b['id']?>" <?=($b['idioma'] == $i['idioma'] ? "selected" : '')?>><?=$b['idioma']?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="fornecedor">Fornecedor:</label>
                            <select class="custom-select col-5" id="fornecedor" name="fornecedor">
                                <option selected>Selecione o fornecedor</option>
                                <?php
																// Função para listar os fornecedores
                                $capa = serviceListarFornecedor(NULL);
                                foreach ($capa as $b) {
																	// Caso o fornecedor listado seja o fornecedor do livro, deixe ele selecionado.
                                ?>
                                <option value="<?=$b['id']?>" <?=($b['nome'] == $i['fornecedor'] ? "selected" : '')?>><?=$b['nome']?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="isbn">ISBN:</label>
                            <input type="text" class="form-control col-4" name="ISBN" id="isbn" maxlength="13" value="<?=$i['isbn']?>">
                          </div>
                    </div>
                    <div class="col-md-6 float-left mt-4">

                          <div class="form-group">
                            <label for="datapub">Ano de publicação da edição:</label>
                            <input type="number" class="form-control col-2" name="data_publicacao" id="datapub" maxlength="4" value="<?=$i['data_publicacao']?>">
                          </div>
                          <div class="form-group">
                            <label for="numpag">Número de páginas:</label>
                            <input type="num" class="form-control col-2" name="numeropaginas" id="numpag" maxlength="4" value="<?=$i['numero_paginas']?>">
                          </div>
                          <div class="form-group">
                            <label for="text">Peso:</label>
                            <input type="text" class="form-control col-2" name="peso" id="peso" maxlength="5" value="<?=$i['peso']?>">
                          </div>
                          <div class="form-group">
                            <label for="preco">Preço:</label>
                            <input type="string" class="form-control col-2" name="preco" id="preco" maxlength="5" value="<?=$i['preco']?>">
                          </div>
                          <!--quantidade -->
                          <div class="form-group">
                            <label for="qtdProd">Quantidade:</label><br/>
                              <input type="text" name="quantidade" id="qtdProd" style="display:inline" maxlength="4" class="text-center form-control col-2" value="<?=$i['quantidade']?>">
                          </div>
                          <!-- /quantidade -->
                          <div class="form-group">
                            <label for="dimension">dimensões:</label>
                            <input type="text" class="form-control col-2" name="dimensoes" id="dimension" maxlength="10" value="<?=$i['dimensoes']?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sinopse</label>
                            <textarea class="form-control" name="sinopse" id="exampleFormControlTextarea1" rows="3"><?=$i['sinopse']?></textarea>
                          </div>
                      <button name="btn-livro-enviar" type="submit" class="btn COLORE1 float-right btn-outline-secondary">Submeter edição</button>
                      </form>
                 </div>
  </div>
</section>
<?php } ?>
<?php require_once("footer.php"); ?>
