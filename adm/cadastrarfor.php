<?php require_once("header.php"); ?>
<?php
if (!isset($_SESSION)){
	session_start();
}
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
?>
<section class="container-fluid centraliza mt-4 mb-4">
        <div class="row">
                <div class="col-md-5 centraliza COLORE bordasb mx-auto pl-5 pt-4 pb-3">
                      <form action="../php/CRUDS/inserirFornecedor.php" method="POST">
                          <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control col-8" id="nome" name="nome" maxlength="100" required="required">
                          </div>
                          <div class="form-group">
                            <label for="rsocial">Razão Social:</label>
                            <input type="text" class="form-control col-8" id="rsocial" name="rsocial" maxlength="50" required="required">
                          </div>
                          <div class="form-group">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" class="form-control col-8" id="cnpj" name="cnpj" maxlength="45" required="required">
                          </div>
                          <div class="form-group">
                            <label for="end">Endereço:</label>
                            <input type="text" class="form-control col-8" id="end"  name="end" maxlength="45" required="required">
                          </div>
                          <div class="form-group">
                            <label for="tel">Telefone:</label>
                            <input type="text" class="form-control col-8" id="tel"  name="tel" maxlength="45" required="required">
                          </div>
                          <div class="form-group">
                            <label for="mail">E-mail:</label>
                            <input type="mail" class="form-control col-8" id="mail" name="mail" maxlength="45">
                          </div>
                          <div class="form-group">
                            <label for="formap">Forma de pagamento:</label>
                            <input type="text" class="form-control col-4" id="formap" name="formap" maxlength="45" required="required">
                          </div>
                          <button name="btn-inserir-fornecedor" type="submit" class="btn COLORE1 float-right btn-outline-secondary">Cadastrar</button>
                    </form>
								</div>

            </div>
</section>
<?php require_once("footer.php"); ?>
