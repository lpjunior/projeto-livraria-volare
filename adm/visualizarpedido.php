<?php
if (!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
require_once("header.php");
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
?>
<div class="container-fluid col-md-8 col-xs-12 centraliza">
  <h1 class="fontedezoito mt-3">Pedido_id: <b> <?=$_GET['id'];?></b></h1>
    <div class="row bg-white">
        <section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-4">
          <?php
          /* $pedido = serviceListarPedido($_GET['id']);
          foreach ($pedido as $i) { */
          ?>
                <h1 class="fontevinte">Endereço de entrega</h1>
                <p class="fontedezesseis">Nome do destinatário: nomedousuario</p>
                <p class="displayblock fontedezesseis">CEP: xxxxx-xxx Estado: xx</p>
                <p class="displayblock fontedezesseis">Bairro: lorem ipsum dornet</p>
                <p class="displayblock fontedezesseis">Rua: lorem ipsum </p>
                <p class="displayblock fontedezesseis">Número: xxx </p>
                <p class="displayblock fontedezesseis">Complemento: lorem ipsum dornet</p>
        </section>
        <section class="col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2">
                <div class="col-md-10 col-lg-10 col-xl-10 float-right">
                    <table class="table table-borderless">
                    <thead>
                      <tr class="COLORETEXTO fontedezesseis">
                        <th scope="col"></th>
                        <th scope="col">itens</th>
                        <th scope="col">quantidade</th>
                        <th scope="col">subtotal</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr class="fontedezesseis">
                          <th scope="row"></th>
                        <td class="text-left">O pequeno princípe</td> <!--título-->
                        <td class="text-center">2</td>
                        <td class="text-center">R$ 30,00</td> <!-- preço itens x quantidade -->
                      </tr>
                      <!--preenchido pra teste-->
                      <tr class="fontedezesseis">
                          <th scope="row"></th>
                        <td class="text-left">Robbit</td>
                        <td class="text-center">1</td>
                        <td class="text-center">R$ 20,00</td>
                      </tr>
                      <tr class="fontedezesseis">
                          <th scope="row"></th>
                        <td class="text-left">A menina submersa</td>
                        <td class="text-center">2</td>
                        <td class="text-center">R$ 50, 00</td>
                      </tr>
                      <!-- fim dos preenchidos pra teste-->
                    </tbody>
                    </table>
                </div>
                <div class="col-md-10 col-lg-10 col-xl-10 float-right">
                    <table class="table table-borderless">
                      <tr>
                        <th scope="row fontevinte"></th>
                        <td class="fontedezoito">Frete:</td>
                        <td colspan="2" class="fontedezoito text-center">R$ 12, 00</td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row fontevinte"></th>
                        <td class="fontedezoito"><b>Total:</b></td>
                        <td colspan="2" class="fontedezoito text-center"><b>R$ 112, 00</b></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
        </section>
</div>
</div>
<?php require_once 'footer.php';?>
