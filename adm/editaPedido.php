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
									// Função para listar os pedidos para poder editar o status da compra
									$pedido = serviceListarPedido(NULL, $_GET['id']);
									foreach ($pedido as $i) {
										var_dump($i);
									?>
                      <form action="../php/CRUDS/editarPedido.php?id=<?=$_GET['id']?>" method="POST">
                        <div class="form-group">
                          <label for="scompra">Status da compra:</label>
                          <select class="custom-select col-5" id="scompra" name="status_compra">
														<option selected>Selecione uma opção</option>
														<?php
														// Função para editar o status da compra
														$pedido2 = serviceListarStatusCompra();
														foreach ($pedido2 as $b) { ?>
                              <option value="<?=$b['idstatus_compra']?>" <?=($b['idstatus_compra'] == $i['id_status_compra'] ? "selected" : '')?>><?=$b['status_compra']?></option>
														<?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="sentrega">Status da entrega:</label>
                          <select class="custom-select col-5" id="sentrega" name="status_entrega">
														<option selected>Selecione uma opção</option>
														<?php
														// Função para editar o status de entrega
														$pedido2 = serviceListarStatusEntrega();
														foreach ($pedido2 as $b) { ?>
															<option value="<?=$b['idstatus_entrega']?>" <?=($b['idstatus_entrega'] == $i['id_status_entrega'] ? "selected" : '')?>><?=$b['status_entrega']?></option>
														<?php } } ?>
                          </select>
												<!--
                        <div class="form-group">
                          <label for="dataent">Previsão de entrega:</label>
                          <input type="date" class="form-control col-3" name="" id="dataent" maxlength="4">
                        </div> -->
                          <button name="btn-editar-pedido" type="submit" class="btn COLORE1 float-right btn-outline-secondary">Submeter edição</button>
                    </form>
								</div>

            </div>
					</div>
</section>
<?php require_once("footer.php"); ?>
