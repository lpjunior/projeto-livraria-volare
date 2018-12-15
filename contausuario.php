<?php
$app->get('/user', function ($request, $response, $args) {
?>
    <h3> Olá, [Nome do Usuário]</h3> <br>
    <div class="container-fluid row col-md-10 col centraliza">
        <div class="row">
            <div class="col-md-5 ">
            <!-- Nav pills -->
                <ul class="nav flex-column nav-pills" role="tablist">
                    <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#meusdados">Meus Dados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#meusenderecos">Meus Endereços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#listadesejos">Lista de Desejos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#meuspedidos">Meus Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#trocadevolucao">Solicite Troca ou Devolução</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#centralatendimento">Central de Atendimento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#sair">Sair</a>
                    </li>
                </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content col-md-8">
                    <div id="meusdados" class="tab-pane active"><br>
                    <h3>Meus dados</h3>
                    <fieldset><!-- *************início do formulário ********************** -->
                        <form action="" method="POST">
                            <div class="form-group"> <h5>Dados Pessoais</h5>
                                <div class="row">
                                    <div class="col">
                                        <label for="iNome">Nome:</label>
                                        <input type="text" id="iNome" name="txtNome" class="form-control" maxlength="100" required>
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="iSobrenome">Sobrenome:</label>
                                        <input type="text" id="iSobrenome" name="txtSobrenome" class="form-control" maxlength="80" required>
                                        <br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iDataNasc">Data de nascimento:</label>
                                        <input type="text" id="iDataNasc" name="txtDataNasc" class="form-control date" required>
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="sGenero">Sexo</label>
                                        <select class="form-control" id="sGenero" name="txtGenero" required>
                                            <option value="2">Feminino</option>
                                            <option value="1">Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iCPF">CPF:</label>
                                        <input type="text" id="iCPF" name="txtCPF" class="form-control cpf" required>
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="iTelefone">Telefone:</label>
                                        <input type="text" id="i" name="txt" class="form-control phone" required>
                                        <br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iEmail">E-mail:</label>
                                        <input type="email" id="iEmail" name="txtEmail" class="form-control" maxlength="100" required>
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="isenha">Senha:</label><!--orientações para senha? número e tipo de caracter-->
                                        <input type="password" class="form-control" id="isenha" name="isenha" required>
                                    </div>
                                    <div class="col">
                                        <label for="isenha2">Confirmação de Senha:</label><!--script para confirmação de senha-->
                                        <input type="password" class="form-control" id="isenha2" name="isenha2"  required>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group"><h4>Endereço de cobrança</h4><br/><!-- mudar estilo do texto-->
                                <div class="row">
                                    <div class="col-md-3 col-lg-4"><!--adicionar tipo de coluna, testar layout-->
                                        <label for="iCEP">CEP:</label>
                                        <input type="text" id="iCEP" name="txtCEP" class="form-control cep" required>
                                    </div>
                                    <div class="col"><!--adicionar tipo de coluna, testar layout-->
                                        <label for="iEndCobr">Endereço:</label>
                                        <input type="text" id="iEndCobr" name="txtEndCobr" class="form-control" required maxlength="255">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iNum">Número:</label>
                                        <input type="text"  id="iNum" name="txtNum" class="form-control" required maxlength="10">
                                    </div>
                                    <div class="col">
                                        <label for="iComplemento">Complemento:</label>
                                        <input type="text"  id="iComplemento" name="txtComplemento" class="form-control" required maxlength="15">
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="iBairro">Bairro:</label>
                                        <input type="text"  id="iBairro" name="txtBairro" class="form-control" required maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iCidade">Cidade:</label>
                                        <input type="text"  id="iCidade" name="txtCidade" class="form-control" required maxlength="50">
                                    </div>
                                    <div class="col">
                                        <label for="sEstado">Estado</label><!-- PESSOAL DO PHP: tem que puxar esse select do banco de dados, só coloquei pra ficar mais fácil de vizualizar-->
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
                                <br/>
                                <div class="row">
                                <div class="col">
                                        <button type="submit" class="btn COLORE" name="btn-enviar" >Criar sua conta</button><!--value??-->
                                    </div>
                                </div>
                            </div>

                        </form>
                    </fieldset><!--********fim do formulário*************-->
                    </div>
                    <div id="meusenderecos" class="tab-pane fade"><br>
                    <h3>Meus Endereços</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="listadesejos" class="tab-pane fade"><br>
                    <h3>Lista de Desejos</h3>
                    <p>Ut taysr perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="meuspedidos" class="tab-pane fade"><br>
                    <h3>Meus Pedidos</h3>
                    <p>Ut taysr perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="trocadevolucao" class="tab-pane fade"><br>
                    <h3>Solicite Troca ou Devolução</h3>
                    <p>Ut taysr perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="centralatendimento" class="tab-pane fade"><br>
                    <h3>Central de Atendimento</h3>
                    <p>Ut taysr perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="sair" class="tab-pane fade"><br>
                    <h3>Sair</h3>
                        <div class="container-fluid col-md-8 centraliza margintop">
                    <p>Ut taysr perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                        </div>
                    
                </div>
            </div>
</div>
<?php }); ?>
