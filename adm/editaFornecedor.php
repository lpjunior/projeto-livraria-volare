<?php
if (!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
require_once("header.php");
?>
<section class="container-fluid entraliza mt-4 mb-4">
        <div class="row">
                <div class="col-md-5 centraliza COLORE bordasb mx-auto pr-3 pl-3 pt-4 pb-3">
									<?php
									// Função para listar os fornecedores nos inputs para editar
									$fornecedor = serviceListarFornecedor($_GET['id']);
									foreach ($fornecedor as $i) {
									?>
                      <form method="POST" action="../php/CRUDS/editarFornecedor.php?id=<?=$_GET['id']?>">
                          <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control col-8" id="nome" name="txtNome" maxlength="100" value="<?=$i['nome']?>">
                          </div>
                          <div class="form-group">
                            <label for="rsocial">Razão Social:</label>
                            <input type="text" class="form-control col-8" id="rsocial" name="txtRazaoSocial" maxlength="50" value="<?=$i['razao_social']?>">
                          </div>
                          <div class="form-group">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" class="form-control col-8" id="cnpj" name="txtCNPJ" maxlength="45" value="<?=$i['cnpj']?>">
                          </div>
                          <div class="form-group">
                            <label for="end">Endereço:</label>
                            <input type="text" class="form-control col-8"  id="end" name="txtEndereco" maxlength="45" value="<?=$i['endereco']?>">
                          </div>
                          <div class="form-group">
                            <label for="tel">Telefone:</label>
                            <input type="text" class="form-control col-8"  id="tel" name="txtTelefone" maxlength="45" value="<?=$i['telefone']?>">
                          </div>
                          <div class="form-group">
                            <label for="mail">E-mail:</label>
                            <input type="mail" class="form-control col-8" id="mail" name="txtEmail" maxlength="45" value="<?=$i['email']?>">
                          </div>
                          <div class="form-group">
                            <label for="formap">Forma de pagamento:</label>
                            <input type="text" class="form-control col-4" id="formap" name="txtFormap" maxlength="45" value="<?=$i['forma_pagamento']?>">
                          </div>
                          <button name="btn-fornecedor-editar" type="submit" class="btn COLORE1 float-right btn-outline-secondary">Submeter Edição</button>
                    </form>
									<?php } ?>
								</div>

            </div>
</section>
<?php require_once("footer.php"); ?>
