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
                          <label for="scompra">Status da compra:</label>
                          <select class="custom-select col-5" id="scompra" name="">
                              <option selected>Selecione uma opção</option>
                              <option value="">Em análise</option>
                              <option value="">Pagamento Efetuado</option>
                              <option value="">Cancelado</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="sentrega">Status da entrega:</label>
                          <select class="custom-select col-5" id="sentrega" name="">
                              <option selected>Selecione uma opção</option>
                              <option value="">Postado</option>
                              <option value="">A caminho do endereço de entrega</option>
                              <option value="">Entregue</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="dataent">Previsão de entrega:</label>
                          <input type="date" class="form-control col-3" name="" id="dataent" maxlength="4"">
                        </div>

                          <button name="" type="submit" class="btn COLORE1 float-right btn-outline-secondary">Submeter edição</button>
                    </form>
								</div>

            </div>
</section>
<?php require_once("footer.php"); ?>
