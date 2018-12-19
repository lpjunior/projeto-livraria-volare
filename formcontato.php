<?php
$app->map(['GET', 'POST'], '/contato', function ($request, $response, $args) {
?>
<div class="container-fluid col-md-11 col centraliza">
    <div class="col-md-12">
        <h3> Olá, <?=$_SESSION['user']['nome']?></h3> <br>
        <?php
        ?>
        </div>
<fieldset><!-- *************início do formulário central de atendimento********************** -->
                        <form action="php/CRUDS/editarUsuario.php" method="POST">
                            <div class="form-group"><h5>
                            <img class="card-img-top" style="width: 60px; height: 40px" src="img/email.jpg" alt="Imagem de email">Contato por e-mail</h5>
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
                                        <label for="ipedido">Número do Pedido:</label>
                                        <input type="text" class="form-control" id="ipedido" name="ipedido" required>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col">
                                        <label for="icontato">Selecione o motivo do contato:</label>
                                        <select id="sMotivo" name="txtMotivo" class="form-control">
                                            <option selected>Selecione uma opção</option>
                                            <option>Informações sobre meu pedido</option>
                                            <option>Infomações sobre um produto</option>
                                            <option>Efetuar uma troca - produto com defeito/danificado</option>
                                            <option value="">Efetuar uma troca - produto veio errado</option>
                                            <option value="">Efetuar uma troca - outros motivos</option>
                                            <option value="">Cancelar o pedido</option>
                                            <option value="">Sugestões, dúvidas e elogios</option>
                                            <option value="">Fazer uma reclamação</option>
                                        </select>
                                    </div>
                                </div>
                                <br/>
                            <div class="row">
                                <div class="col">
                                <label for="imensagem">Mensagem</label>
                                <textarea class="form-control" id="imensagem" rows="5"></textarea>
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
