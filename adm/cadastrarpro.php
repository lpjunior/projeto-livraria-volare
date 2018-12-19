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

                  <!-- CADASTRO PRODUTO -->
                    <div class="COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3">
                      <form action="#" method="post" enctype="multipart/form-data">
                        <!-- uploadImg($_POST) -->
                          <!-- INPUT IMAGEM-->
                            <label for="capa">Imagem capa:</label>
                            <input type="file" class="form-control-file" id="capa" name="foto" required="required">
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
                            <label for="categoria">Categoria:</label>
                            <select class="custom-select col-4" id="categoria">
                                <option selected>Selecione a categoria</option>
                                <option value="1">x</option>
                                <option value="2">y</option>
                                <option value="3">z</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="subcat">Subcategoria:</label>
                            <select class="custom-select col-4" id="subcat">
                                <option selected>Selecione um assunto</option>
                                <option value="1">x</option>
                                <option value="2">y</option>
                                <option value="3">z</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="tipocapa">Tipo de capa:</label>
                            <select class="custom-select col-4" id="tipocapa">
                                <option selected>Selecione o tipo de capa</option>
                                <option value="1">dura</option>
                                <option value="2">brochura</option>
                                <option value="3">grampo</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="idioma">Idioma:</label>
                            <select class="custom-select col-4" id="idioma">
                                <option selected>Selecione o idioma</option>
                                <option value="1">Português</option>
                                <option value="2">Espanhol</option>
                                <option value="3">Inglês</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="isbn">ISBN:</label>
                            <input type="text" class="form-control col-4" id="isbn" maxlength="13" required="required">
                          </div>
                          <div class="form-group">
                            <label for="datapub">Ano de publicação:</label>
                            <input type="date" class="form-control col-4" id="datapub" maxlength="4" required="required">
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
                              <input type="number" id="qtdProd" style="display:inline" maxlength="4" class="text-center form-control col-2" value="">
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
        </div>
</section>
<!-- NÃO CHAME O FOOTER -->
