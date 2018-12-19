<?php
$app->map(['GET', 'POST'], '/user', function ($request, $response, $args) {
?>
<div class="container-fluid col-md-11 col centraliza">
    <div class="col-md-12">
        <h3> Olá, <?=$_SESSION['user']['nome']?></h3> <br>
        <?php
        if (!isset($_SESSION['user_id'])){
          echo "<script>window.location.assign('home')</script>";
        }
        ?>
        </div>
<fieldset><!-- *************início do formulário central de atendimento********************** -->
                        <form action="php/CRUDS/editarUsuario.php" method="POST">
                            <div class="form-group"> <h5>Dados Pessoais</h5>
                                <?php
                                $usuario = serviceListarUsu(NULL, $_SESSION['user_id']);
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
                                </div>
                            </div>
                            <br/>
                            <div class="form-group"><h4>Endereço de cobrança</h4><br/><!-- mudar estilo do texto-->
                                <div class="row">
                                    <div class="col-md-3 col-lg-4"><!--adicionar tipo de coluna, testar layout-->
                                        <label for="iCEP">CEP:</label>
                                        <input type="text" value="<?=$i['cep']?>" id="iCEP" name="txtCEP" class="form-control cep" required>
                                    </div>
                                    <div class="col"><!--adicionar tipo de coluna, testar layout-->
                                        <label for="iEndCobr">Endereço:</label>
                                        <input type="text" value="<?=$i['endereco']?>" id="iEndCobr" name="txtEndCobr" class="form-control" required maxlength="255">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iNum">Número:</label>
                                        <input type="text" value="<?=$i['numero']?>" id="iNum" name="txtNum" class="form-control" required maxlength="10">
                                    </div>
                                    <div class="col">
                                        <label for="iComplemento">Complemento:</label>
                                        <input type="text" value="<?=$i['complemento']?>" id="iComplemento" name="txtComplemento" class="form-control" required maxlength="15">
                                        <br/>
                                    </div>
                                    <div class="col">
                                        <label for="iBairro">Bairro:</label>
                                        <input type="text" value="<?=$i['bairro']?>" id="iBairro" name="txtBairro" class="form-control" required maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="iCidade">Cidade:</label>
                                        <input type="text" value="<?=$i['cidade']?>"  id="iCidade" name="txtCidade" class="form-control" required maxlength="50">
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
                                        <button type="submit" class="btn COLORE1" name="btn-enviar" >Salvar Alterações</button><!--value??-->
                                    </div>
                                </div>
                            </div>

                        </form>
                      <?php } ?>
                    </fieldset><!--********fim do formulário central de atendimento*************-->
                    </div>
<?php }); ?>