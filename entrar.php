<?php
session_start();
if (isset($_SESSION['token_face']) || isset($_SESSION['user'])) {
  header('location: index.php');
} else {
  if (isset($_POST['btn-checkout'])){
    echo "<script>alert('Logue para comprar')</script>";
}
if (isset($_GET['cadastro'])){
  echo "<script>alert('Cadastro feito com sucesso, você pode logar agora.')</script>";
}
if (isset($_SESSION['cpf'])){
  if ($_SESSION['cpf'] === 1) {
    echo "<script>alert('Seu CPF já está cadastrado.')</script>";
    unset($_SESSION['cpf']);
  } else {
    echo "<script>alert('Seu CPF não está cadastrado.')</script>";
    echo "<script>window.location.assign('cadastrousuario.php')</script>";
    unset($_SESSION['cpf']);
  }
}
if (isset($_SESSION['block']) && $_SESSION['block'] == true){
  echo "<script>alert('O usuário está bloqueado por muitas tentativas de login!')</script>";
  unset($_SESSION['block']);
}
if (!isset($_SESSION['contador'])){
  $_SESSION['contador'] = 3;
}
if (isset($_POST['btn-checkout'])){
  $_SESSION['headercheckout'] = true;
}
require_once 'requires/header.php';
 ?>
    <div class="container-fluid col-md-8 centraliza mt-4">
        <div class="row">
            <div class="col-md-6 centraliza">
                <fieldset><!-- *************início do formulário ********************** -->
                    <legend><h2 class="fontevinteecinco">&nbsp;&nbsp;&nbsp;Já sou cadastrado</h2></legend>
                        <form class="form-horizontal" action="php/CRUDS/loginUsuario.php" method="POST">
                            <div class="form-group">
                                <label class="control-label col-sm-4 font-weight-bold" for="iEmail">E-mail:</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="txtEmail" id="iEmail" placeholder="Digite o email" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 font-weight-bold" for="isenha">Senha:</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" id="isenha" name="isenha" placeholder="Digite a senha" required>
                                </div>
                            </div>
                            <?php
                            if (isset($_SESSION['erro']) && $_SESSION['erro'] == 'Erro') { ?>
                              <p class="ml-4 text-danger">Usuário e/ou senha incorreto(s)</p>
                          <?php unset($_SESSION['erro']);
                          } elseif (isset($_SESSION['erro']) && $_SESSION['erro'] == "inativo") { ?>
                            <p class="ml-4 text-danger">Seu usuário está inativo!</p>
                        <?php unset($_SESSION['erro']);
                      } ?>

                            <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Digite o seu e-mail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="POST">
                                    <div class="modal-body">
                                      <div class="input-group mb-3">
                                      <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon2">enviar</span>
                                        </div>
                                      </div>

                                    </div>

                                    </div>
                                </div>
                                </div>
                            <!-- fim do modal -->
                            <div class="form-group mt-0">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="submit" class="btn COLORE1 mb-4" name="btn-enviar" onclick="return validarSenha()">Entrar</button>
                                </div>
                            </div>
                        </form>
                </fieldset>
            </div>
            <div class="col-md-6 centraliza">
                <h2 class="fontevinteecinco">Cadastre-se no site</h2>
                <p class="text-justify">Para comprar em nosso site é preciso realizar um cadastro. Através dele você fará parte do Clube de Vantagens Volare, ficando por dentro das novidades. Além de acesssar descontos e promoções EXCLUSIVAS.</p>
                <div class="form-group">
                    <label class="control-label col-sm-2 font-weight-bold" for="iCPF">CPF:</label>
                    <div class="col-md-10">
                        <form action="php/CRUDS/checarCPF.php" method="POST">
                            <input type="text" class="form-control cpf" id="iCPF" placeholder="Digite o cpf" name="txtCPF" class="form-control cpf" required>

                        <br/>

                        <div class="col-sm-offset-2 col-md-10 mb-4">
                            <button type="submit" class="btn COLORE1" name="btn_cadastrar_cpf">Cadastrar</button>
                        </div>
                      </form>
                    </div>
                    </div>
                    <h2 class="fontevinteecinco">Conectar com sua rede social</h2>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-md-10">
                            <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
}
require_once 'requires/footer.php';
 ?>
