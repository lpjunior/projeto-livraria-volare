<?php require_once("header.php"); ?>
<?php
session_start();
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
?>
<section class="container-fluid entraliza mt-4 mb-4">
        <div class="row">
                <div class="col-md-5 centraliza COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3">
                      <form>
                          <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control col-8" id="nome" maxlength="100"">
                          </div>
                          <div class="form-group">
                            <label for="rsocial">Razão Social:</label>
                            <input type="text" class="form-control col-8" id="rsocial" maxlength="50"">
                          </div>
                          <div class="form-group">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" class="form-control col-8" id="cnpj" maxlength="45"">
                          </div>
                          <div class="form-group">
                            <label for="end">Endereço:</label>
                            <input type="text" class="form-control col-8"  id="end" maxlength="45">
                          </div>
                          <div class="form-group">
                            <label for="tel">Telefone:</label>
                            <input type="text" class="form-control col-8"  id="tel" maxlength="45">
                          </div>
                          <div class="form-group">
                            <label for="mail">E-mail:</label>
                            <input type="mail" class="form-control col-8" id="mail" maxlength="45">
                          </div>
                          <div class="form-group">
                            <label for="formap">Forma de pagamento:</label>
                            <input type="text" class="form-control col-4" id="formap" maxlength="45">
                          </div>
                          <button name="" type="submit" class="btn COLORE1 float-right btn-outline-secondary">Submeter Edição</button>
                    </form>
								</div>

            </div>
</section>
<?php require_once("footer.php"); ?>
