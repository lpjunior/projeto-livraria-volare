<?php
  require_once 'requires/header.php';
  ## Caso edite o endereço
  if (isset($_GET['editar']) && $_GET['editar'] == 'erro'){
    echo "<script>alert('Falha ao editar seu endereço!')</script>";
  } elseif (isset($_GET['editar']) && $_GET['editar'] == true){
    echo "<script>alert('Endereço alterado com sucesso!')</script>";
  }
  ## Caso edite o usuário
  if (isset($_GET['editarUsu']) && $_GET['editarUsu'] == 'erro'){
    echo "<script>alert('Falha ao editar seu endereço!')</script>";
  } elseif (isset($_GET['editar']) && $_GET['editar'] == true){
    echo "<script>alert('Endereço alterado com sucesso!')</script>";
  }
  ## Caso o usuário insira um endereço
  if (isset($_GET['inserir']) && $_GET['inserir'] == false){
    echo "<script>alert('Falha ao editar seu endereço!')</script>";
  } elseif (isset($_GET['editar']) && $_GET['editar'] == true){
    echo "<script>alert('Endereço alterado com sucesso!')</script>";
  }
?>

    <div class="container-fluid col-md-11 col centraliza">


        <div class="row">
                <div class="col-md-4">
                   <div class="col-md-12 float-left">
                     <!--olá usuário-->
                     <div class="col-md-12 float-left pt-4">

                         <p> <span style="font-size: 2em; color:lightseagreen"><i class="fas fa-user-circle float-left opacidade pt-2"></i></span><h5 class="float-left fontevinte text-dark opacidade pb-1">&nbsp; <?=$_SESSION['user']['nome']?></h5></p>
                         <?php
                         if (!isset($_SESSION['user_id'])){
                           echo "<script>window.location.assign('home')</script>";
                         }
                         ?>
                     </div> <!-- fim olá usuário -->
                   </div>
                   <div class="col-md-12 mt-0 float-left">
                   <!-- Nav pills -->
                      <ul class="nav flex-column nav-pills-info COLORE" role="tablist">
                          <li class="nav-item border-bottom">
                              <a class="nav-link active linkstyle font-weight-bold" data-toggle="pill" href="#meusdados">Meus Dados</a>
                          </li>
                          <li class="nav-item border-bottom">
                              <a class="nav-link font-weight-bold linkstyle" data-toggle="pill" href="#meusenderecos">Meus Endereços</a>
                          </li>
                          <li class="nav-item border-bottom">
                              <a class="nav-link font-weight-bold linkstyle" href="pedidos">Meus Pedidos</a>
                          </li>
                          <li class="nav-item border-bottom">
                              <a class="nav-link font-weight-bold linkstyle" data-toggle="pill" href="#listadesejos">Lista de Desejos</a>
                          </li>
                          <li class="nav-item border-bottom">
                              <a class="nav-link font-weight-bold linkstyle" data-toggle="pill" href="#centralatendimento">Central de Atendimento</a>
                          </li>
                      </ul>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content col-md-7 mb-4">
                    <div id="meusdados" class="tab-pane active"><br>
                    <h3>Meus dados</h3>
                    <fieldset><!-- *************início do formulário dados pessoais********************** -->
                        <form action="php/CRUDS/editarUsuario.php" method="POST">
                            <div class="form-group"> <h5>Dados Pessoais</h5>
                                <?php
                                $usuario = serviceListarUsu(NULL, $_SESSION['user_id'], NULL);
                                if (isset($_SESSION['editarFalse'])){
                                  echo $_SESSION['editarFalse'];
                                }
                                foreach ($usuario as $i) {?>
                                <div class="row">
                                    <div class="col">
                                        <label for="iNome">Nome:</label>
                                        <input type="text" value="<?=$i['nome']?>" id="iNome" name="txtNome" class="form-control" maxlength="100" required>
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="iSobrenome">Sobrenome:</label>
                                        <input type="text" value="<?=$i['sobrenome']?>" id="iSobrenome" name="txtSobrenome" class="form-control" maxlength="80" required>
                                        <br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iDataNasc">Data de nascimento:</label>
                                        <input type="text" value="<?=$i['datanascimento']?>" id="iDataNasc" name="txtDataNasc" class="form-control date" required>
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
                                        <input type="text" value="<?=$i['cpf']?>" id="iCPF" name="txtCPF" class="form-control cpf" required>
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="iTelefone">Telefone:</label>
                                        <input type="text" value="<?=$i['telefone']?>" id="i" name="iTelefone" class="form-control phone" required>
                                        <br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iEmail">E-mail:</label>
                                        <input type="email" value="<?=$i['email']?>" id="iEmail" name="txtEmail" class="form-control" maxlength="100" required>
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
                                    <div class="row">
							    </div>
                            </div>
                            <br/>
                        </form>
                        <div class="col mb-4">
                            		<button type="submit" class="btn COLORE1" name="btn-enviar" >Salvar Alterações</button><!--value??-->
                        		</div>
							</div>
                      <?php } ?>
                    </fieldset><!--********fim do formulário dados pessoais*************-->
                    </div>
                    <div id="meusenderecos" class="tab-pane fade mr-4"><br>
                        <h3>Meus Endereços</h3>
                    <fieldset><!-- *************início do formulário Meus Endereços********************** -->
                      <?php
                      $endereco = serviceListarEndereco($_SESSION['user_id'], 1);
                      if (is_array($endereco)){ ?>
                      <form action="php/CRUDS/editarEndereco.php?end=1" method="POST">
                      <?php } else {
                        $endereco = array('a' => array('enderecotrue' => 'NULL'));?>
                        <form action="php/CRUDS/inserirEndereco.php?end=1" method="POST">
                      <?php }
                      foreach ($endereco as $i) {
                      ?>
                            <div class="form-group">
                             <h5 class="mt-2">Endereço de Entrega</h5>
                            <br/>
                            <!-- início do formulário Endereço de Entrega -->
                            <div class="row">
                                    <div class="col">
                                        <label for="idestinatario">Destinatário:</label>
                                        <input type="text" class="form-control" id="idestinatario" name="idestinatario" value="<?=(isset($i['destinatario']) ? $i['destinatario'] : '')?>" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-3 col-lg-4"><!--adicionar tipo de coluna, testar layout-->
                                        <label for="iCEP">CEP:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['cep'] : '')?>" id="iCEP" name="txtCEP" class="form-control cep" >
                                    </div>
                                    <div class="col"><!--adicionar tipo de coluna, testar layout-->
                                        <label for="iEndCobr">Endereço:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['endereco'] : '')?>" id="iEndCobr" name="txtEndCobr" class="form-control" maxlength="255" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iNum">Número:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['numero'] : '')?>" id="iNum" name="txtNum" class="form-control" maxlength="10" >
                                    </div>
                                    <div class="col">
                                        <label for="iComplemento">Complemento:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['complemento'] : '')?>" id="iComplemento" name="txtComplemento" class="form-control" maxlength="15" >
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="iBairro">Bairro:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['bairro'] : '')?>" id="iBairro" name="txtBairro" class="form-control" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iCidade">Cidade:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['cidade'] : '')?>" id="iCidade" name="txtCidade" class="form-control" maxlength="50" >
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
                              <?php } ?>
                              <div class="float-right mb-4 mt-3">
                                      <button type="submit" class="btn COLORE1" name="btn-enviar" >Salvar Alterações</button>
                                      </div>
                                <br/>
                              </form>
                            <!-- início do formulário Endereço de Cobrança -->
                            <?php
                            $endereco = serviceListarEndereco($_SESSION['user_id'], 4);
                            if (is_array($endereco)){ ?>
                            <form action="php/CRUDS/editarEndereco.php?end=4" method="POST">
                            <?php } else {
                              $endereco = array('a' => array('endereco' => 'NULL'));?>
                              <form action="php/CRUDS/inserirEndereco.php?end=4" method="POST">
                            <?php }
                            foreach ($endereco as $i) {
                            ?>
                        <div class="form-group"> <h5 class="mt-2">Endereço de Cobrança</h5>
                            <br/>
                            <div class="row">
                                    <div class="col">
                                        <label for="idestinatario">Destinatário:</label>
                                        <input type="text" class="form-control" id="idestinatario" name="idestinatario" value="<?=(isset($i['destinatario']) ? $i['destinatario'] : '')?>" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-3 col-lg-4"><!--adicionar tipo de coluna, testar layout-->
                                        <label for="iCEP">CEP:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['cep'] : '')?>" id="iCEP" name="txtCEP" class="form-control cep" >
                                    </div>
                                    <div class="col"><!--adicionar tipo de coluna, testar layout-->
                                        <label for="iEndCobr">Endereço:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['endereco'] : '')?>" id="iEndCobr" name="txtEndCobr" class="form-control" maxlength="255" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iNum">Número:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['numero'] : '')?>" id="iNum" name="txtNum" class="form-control" maxlength="10" >
                                    </div>
                                    <div class="col">
                                        <label for="iComplemento">Complemento:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['complemento'] : '')?>" id="iComplemento" name="txtComplemento" class="form-control" maxlength="15" >
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="iBairro">Bairro:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['bairro'] : '')?>" id="iBairro" name="txtBairro" class="form-control" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iCidade">Cidade:</label>
                                        <input type="text" value="<?=(!isset($i['enderecotrue']) ? $i['cidade'] : '')?>" id="iCidade" name="txtCidade" class="form-control" maxlength="50" >
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
                                <div class="float-right mb-4">
                                        <button type="submit" class="btn COLORE1" name="btn-enviar" >Salvar Alterações</button>
                                        </div>
                                </div>
                            </div>
                          <?php } ?>
                        </form>

                    </fieldset><!--********fim do formulário*************-->
                    </div>
                    <div id="listadesejos" class="tab-pane fade"><br>
                    <h3 class="fontevinte COLORETEXTO col-md-8 centraliza mt-4"><i>Lista de Desejo</i></h1>
                <section class="bordaspraconteudo col-md-8 centraliza mt-1">
                    <div class="row text-center"> <!-- DIV QUE JUNTA OS CARDS, todos tem que ficar dentro dela -->
                      <?php
                      $livro = serviceListarItemDesejado();
                      if (is_array($livro)){
                      foreach($livro as $i){
                      ?>
                        <div class="col-sm-4">
                          <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="php/CRUDS/upload/<?=$i['nome']?>" alt="capa do livro">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal fontedoze"><a class="linkstyle" href="produto?id=<?=$i['id']?>"><?=$i['titulo']?></h4></a>
                            </div>
                            <div class="card-body">
                                <h4 class="fonteonze"><?=$i['autor']?></h4>
                                <h3 class="fontedezesseis">R$ <?=$i['preco']?></h3>
                                <div class="btn-group">
                                    <a href="php/CRUDS/carrinhoSystem.php?acao=add&id=<?=$i['id']?>" class="btn btn-sm btn-outline-secondary"> <i class="fa fa-shopping-cart"></i> </a>
                                    <!-- BOTÃO PRA EXCLUIR DA LISTA DE DESEJOS -->
                                    <a href="php/CRUDS/excluiFavorito.php?id=<?=$i['id']?>" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-trash-alt linkstyle3"></i> </a>
                                </div>
                            </div>
                        </div>
                        </div>
                      <?php } } else {
                        echo "<p>Não existe nenhum item na sua lista de desejos</p>";
                      } ?></span>
                    </div> <!-- FIM DA DIV QUE JUNTA OS CARDS -->
                </section>
                    </div>
                    <div id="centralatendimento" class="tab-pane fade"><br>
                    <h3>Central de Atendimento</h3>
                    <br>
                    <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" style="width: 60px; height: 40px" src="img/email.jpg" alt="Imagem email">
                            <div class="card-body">
                                <h5 class="card-title">E-mail</h5>
                                <p class="card-text">Utilize este canal de contato para tirar dúvidas, cancelar pedidos, solicitar trocas, registrar reclamações, entre outros.</p>
                                <a href="contato" class="btn COLORE1">Entrar em contato por e-mail</a>
                            </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" style="width: 40px; height: 40px" src="img/telefone.jpg"  alt="Imagem telefone">
                            <div class="card-body">
                                <h5 class="card-title">Telefones</h5>
                                <p class="card-text">Capitais e Regiões Metropolitanas: 4003-0001</p>
                                <p class="card-text">Outras localidades: 0800-754-4000</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
          require_once 'requires/footer.php';
         ?>
