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
                  <!-- CADASTRO FORNECEDOR -->
                    <div class="COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3">
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

            </div>
</section>
<!-- NÃO CHAME O FOOTER -->
