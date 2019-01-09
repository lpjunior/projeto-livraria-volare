<?php
session_start();
if (!isset($_SESSION['user_id'])){
  header('location: index.php');
}
require_once 'requires/header.php';
require_once 'php/CRUDS/serviceCheckout.php';
  ## Mudar para o botão de checkout depois ##
  if (isset($_GET['editar']) && $_GET['editar'] == 'erro'){
    echo "<script>alert('Falha ao editar seu endereço!')</script>";
  } elseif (isset($_GET['editar']) && $_GET['editar'] == true){
    echo "<script>alert('Endereço alterado com sucesso!')</script>";
  }
?>
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
                                      <?php
                                      $valor_total = 0;
                                      $frete = '2.90';
                                      $checkout = serviceListarCheckout($_SESSION['user_id'], NULL);
                                      foreach ($checkout as $i) {
                                      ?>
                                      <tr class="fontetabela">
                                          <th scope="row"><i class="COLORETEXTO fas fa-book"></i></th>
                                        <td class="text-left"><?=$i['titulo']?></td>
                                        <td class="text-center"><?=$i['quantidade']?></td>
                                        <td class="text-center">R$ <?= precoBR(stringToFloat($i['preco']) * stringToFloat($i['quantidade']))?></td>
                                      </tr>
                                      <!--preenchido pra teste-->
                                      <?php
                                      $valor_total += $i['preco'];
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-0 pt-0">
                                <table class="table table-responsive table-borderless">
                                <tbody>
                                  <tr>
                                    <th scope="row"><i class="fontedoze COLORETEXTO fas fa-plus"></i></th>
                                    <td class="fontetabeladois">Frete:</td>
                                    <td colspan="2" class="fontetabeladois text-right"><?=precoBR($frete)?></td>

                                  </tr>
                                  <tr>
                                    <th scope="row"><i class="fontedoze COLORETEXTO fas fa-dollar-sign"></i></th>
                                    <td class="fontetabeladois"><b>Total a pagar:</b></td>
                                    <td colspan="2" class="fontetabeladois text-right"><b>R$ <?=precoBR((stringToFloat($frete) + stringToFloat($valor_total)))?></b></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                        <?php
                        $checkout = serviceListarEndereco($_SESSION['user_id'], 1);
                        if (!is_array($checkout)){
                        $checkout = serviceListarEndereco($_SESSION['user_id'], 4);
                        }
                        foreach ($checkout as $i) {
                        ?>
                        <div class="col-sm-4 col-md-5 col-lg-4">
                            <h1 class="fontevinte">Endereço de entrega</h1>
                            <p class="fontedoze COLORETEXTO"> Seu pedido será entregue no endereço abaixo: <!--puxar do endereço de cobrança cadastrado--></p><hr/>
                            <p class="fontedezesseis" id="pDestinatario">Nome do destinatário: <?=(isset($i['destinatario']) ? $i['destinatario'] : $i['nome']." ".$i['sobrenome'])?></p>
                            <p class="displayblock fontedezesseis" id="pCep">CEP: <?=$i['cep']?> Estado: <?=$i['estado']?></p>
                            <p class="displayblock fontedezesseis"id="pBairro">Bairro: <?=$i['bairro']?></p>
                            <p class="displayblock fontedezesseis" id="pRua">Rua: <?=$i['endereco']?> </p>
                            <p class="displayblock fontedezesseis" id="pNum">Número: <?=$i['numero']?> </p>
                            <p class="displayblock fontedezesseis" id="pComp">Complemento: <?=$i['complemento']?></p>
                            <div class="form-group">
                                <div class="col-sm-offset-2">
                                    <button type="submit" class="btn COLORE1 fontedoze" name="btn-enviar" data-toggle="modal" data-target="#exampleModal">Editar</button>
                                </div>
                            </div>

                        </div> <!-- FIM DA DIV LATERAL DIREITA-->
                      <?php } ?>

                </div>
                <div class="row mt-4 mb-4"><!-- div onde vai entrar o pag seguro -->
                    <div class="col-md-12 col-lg-12">
                        <?php require_once 'payment.php'; ?>

                    <!--
                        <div class="form-group float-right mr-0 pr-2">
                            <div>
                                <button type="submit" class="btn fontedoze COLORE1" alt="ir para o topo da página" name="" onclick=""><i class="fontequinze text-light fas fa-arrow-alt-circle-up"></i>&nbsp;&nbsp;ir para o topo</button>
                            </div>
                        </div> -->
                        <div class="form-group float-left mr-0 pr-2">
                            <div>
                                <a href="carrinho.php"><h5 class="fontequinze linkstyle mt-4"> <i class="fas fa-arrow-alt-circle-left" aria-hidden=”true” ></i>&nbsp;&nbsp;Voltar</h5></a>
                            </div>
                        </div>

                    </div>
                </div>  <!-- fim do pagseguro -->
            </div>
        </section>
        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Endereço de Entrega</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="php/CRUDS/editarEndereco.php?end=1&checkout=true" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                                <div class="row">
                                <div class="col-md">
                                    <label for="iDest">Destinatário:</label>
                                    <input type="text" id="iDest" name="txtDest" class="form-control" required maxlength="100">
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="iCEP">CEP:</label>
                                        <input type="text" id="iCEP" name="txtCEP" class="form-control cep" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="iEndCobr">Endereço:</label>
                                        <input type="text" id="iEndCobr" name="txtEndCobr" class="form-control" required maxlength="255">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <label for="iNum">Número:</label>
                                        <input type="text"  id="iNum" name="txtNum" class="form-control" required maxlength="10">
                                    </div>
                                    <div class="col-md">
                                        <label for="iComplemento">Complemento:</label>
                                        <input type="text"  id="iComplemento" name="txtComplemento" class="form-control" required maxlength="15">
                                        <br/>
                                    </div>
                                    <div class="col-md">
                                        <label for="iBairro">Bairro:</label>
                                        <input type="text"  id="iBairro" name="txtBairro" class="form-control" required maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <label for="iCidade">Cidade:</label>
                                        <input type="text"  id="iCidade" name="txtCidade" class="form-control" required maxlength="50">
                                    </div>
                                    <div class="col-md">
                                        <label for="sEstado">Estado</label>
                                        <select id="sEstado" name="txtEstado" class="form-control">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn COLORE2" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="btn-enviar" class="btn COLORE1">Salvar</button>
                  </form>
                </div>
                </div>
            </div>
            </div>
            <?php
              require_once 'requires/footer.php';
             ?>
