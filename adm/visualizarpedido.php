<?php require_once("header.php"); ?>
      <section>
            <div class="container-fluid col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 centraliza mt-4">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-7 col-lg-8">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <table class="table table-responsive table-borderless">
                                    <thead>
                                      <tr class="COLORETEXTO fontetabela fontequinze">
                                        <th scope="col"></th>
                                        <th scope="col">itens</th>
                                        <th scope="col">quantidade</th>
                                        <th scope="col">subtotal</th>

                                      </tr>
                                    </thead>
                                    <tbody>

                                      <tr class="fontetabela">
                                          <th scope="row"><i class="COLORETEXTO fas fa-book"></i></th>
                                        <td class="text-left"><?=$i['titulo']?></td>
                                        <td class="text-center"><?=$i['quantidade']?></td>
                                        <td class="text-center">R$ <?=(floatval($i['preco'])*floatval($i['quantidade']))?></td>
                                        <?php
                                        ## Botar o valor dentro do array
                                        array_push($i,(floatval($i['preco'])*floatval($i['quantidade'])));
                                        ## Somar todos os valores do array
                                        $valor_total += $i['0']; ?>
                                      </tr>

                                      <?/*php } */?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-0 pt-0">
                                <table class="table table-responsive table-borderless">
                                <tbody>
                                  <tr>
                                    <th scope="row"><i class="fontedoze COLORETEXTO fas fa-plus"></i></th>
                                    <td class="fontetabeladois">Frete:</td>
                                    <td colspan="2" class="fontetabeladois text-right"><?=$frete?></td>

                                  </tr>
                                  <tr>
                                    <th scope="row"><i class="fontedoze COLORETEXTO fas fa-dollar-sign"></i></th>
                                    <td class="fontetabeladois"><b>Total a pagar:</b></td>
                                    <td colspan="2" class="fontetabeladois text-right"><b>R$ <?=floatval($frete) + $valor_total?></b></td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><i class="fontedoze COLORETEXTO fas fa-dollar-sign"></i></th>
                                    <td class="fontetabeladois"><b>Status da compra:</b></td>
                                    <td colspan="2" class="fontetabeladois text-right"><b><!--PREENCHER--></b></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                        <?php
                        $checkout = serviceListarCheckout($_SESSION['user_id'], 1);
                        foreach ($checkout as $i) {
                        ?>
                        <div class="col-sm-4 col-md-5 col-lg-4">
                            <h1 class="fontevinte">Endereço de entrega</h1>
                            <p class="fontedezesseis">Nome do destinatário: <?=$i['nome']." ".$i['sobrenome']?></p>
                            <p class="displayblock fontedezesseis">CEP: <?=$i['cep']?> Estado: <?=$i['estado']?></p>
                            <p class="displayblock fontedezesseis">Bairro: <?=$i['bairro']?></p>
                            <p class="displayblock fontedezesseis">Rua: <?=$i['endereco']?> </p>
                            <p class="displayblock fontedezesseis">Número: <?=$i['numero']?> </p>
                            <p class="displayblock fontedezesseis">Complemento: <?=$i['complemento']?></p>

                        </div> <!-- FIM DA DIV LATERAL DIREITA-->
                      <?php } ?>
           </div>
        </section>
<?php require_once("footer.php"); ?>
