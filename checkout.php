<?php require_once 'header.php';?> 
        <section>
            <div class="container-fluid col-md-8 centraliza mt-4">
                <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <h1 class="fontevinte">Endereço de entrega</h1>
                            <p class="fontedoze COLORETEXTO"> Seu pedido será entregue no endereço abaixo:</p><hr/>
                            <p class="fontedezesseis">Nome do destinatário: nomedousuario</p>
                            <p class="displayblock fontedezesseis">CEP: xxxxx-xxx Estado: xx</p>
                            <p class="displayblock fontedezesseis">Bairro: lorem ipsum dornet</p>
                            <p class="displayblock fontedezesseis">Rua: lorem ipsum </p>
                            <p class="displayblock fontedezesseis">Número: xxx </p>
                            <p class="displayblock fontedezesseis">Complemento: lorem ipsum dornet</p>
                            <div class="form-group">
                                <div class="col-sm-offset-2">
                                    <button type="submit" class="btn COLORE1 fontedoze" name="btn-enviar" onclick="">Editar</button>
                                </div>
                            </div>                            
                           
                        </div> <!-- FIM DA DIV LATERAL DIREITA-->
                        <div class="col-md-8 col-lg-8">
                            <div class="col-md-10 col-lg-10 col-xl-10 float-right mr-0">
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
                                      <th scope="row"><i class="COLORETEXTO fas fa-book"></i></th>
                                    <td class="text-left">O pequeno princípe</td> <!--título-->
                                    <td class="text-center">2</td> 
                                    <td class="text-center">R$ 30,00</td> <!-- preço itens x quantidade -->
                                  </tr>
                                  <!--preenchido pra teste-->
                                  <tr class="fontedezesseis"> 
                                      <th scope="row"><i class="COLORETEXTO fas fa-book"></i></th>
                                    <td class="text-left">Robbit</td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">R$ 20,00</td>
                                  </tr>
                                  <tr class="fontedezesseis">
                                      <th scope="row"><i class="COLORETEXTO fas fa-book"></i></th>
                                    <td class="text-left">A menina submersa</td>
                                    <td class="text-center">2</td>
                                    <td class="text-center">R$ 50, 00</td>
                                  </tr>
                                  <!-- fim dos preenchidos pra teste-->
                                </tbody>
                                </table>
                            </div> 
                            <div class="col-md-10 col-lg-10 col-xl-10 bordert mt-0 pt-0 float-right mr-0">
                                <table class="table table-borderless">
                                  <tr>
                                    <th scope="row fontevinte"><i class="COLORETEXTO fas fa-plus"></i></th>
                                    <td class="fontedezoito">Frete:</td>  
                                    <td colspan="2" class="fontedezoito text-center">R$ 12, 00</td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th scope="row fontevinte"><i class="COLORETEXTO fas fa-dollar-sign"></i></th>
                                    <td class="fontedezoito"><b>Total a pagar:</b></td>  
                                    <td colspan="2" class="fontedezoito text-center"><b>R$ 112, 00</b></td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>      
                        </div>
                </div>
                <div class="row mt-4"><!-- div onde vai entrar o pag seguro -->
                    <div class="col-md-12 col-lg-12">
                        <hr/><h1 class="fontevinte">Forma de pagamento</h1>
                        integração pag seguro
                    
                    <!-- tem que fazer um if pra aparecer a mensagem pedido efetuado com sucesso-->
                        <div class="form-group float-right mr-0 pr-2">
                            <div>
                                <button type="submit" class="btn fontedoze COLORE1" alt="ir para o topo da página" name="" onclick=""><i class="fontequinze text-light fas fa-arrow-alt-circle-up" aria-hidden="true"></i>&nbsp;&nbsp;ir para o topo</button>
                            </div>
                        </div>
                        <div class="form-group float-right mr-0 pr-2">
                            <div>
                                <button type="submit" class="btn fontedoze COLORE1" alt="ir para a página anterior" name="" onclick=""><i class="fontequinze text-light fas fa-arrow-alt-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;voltar</button>
                            </div>
                        </div> 
                        
                    </div>
                </div>  <!-- fim do pagseguro -->
            </div>    
        </section>
        
<?php require_once 'footer.php';?>