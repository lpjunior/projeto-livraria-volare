<?php require_once("header.php"); ?>
<?php
if (!isset($_SESSION)){
	session_start();
}
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
?>
<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-10 col-lg-9 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Usuários cadastrados</i></h1>
      <!-- BUSCA -->
      <div class="input-group mb-4 ml-2 mr-2 pr-2">
      <input type="text" class="form-control col-md-3" aria-label="campo de busca">
        <div class="input-group-append">
          <button class="btn btn-info opacidade" aria-labelledby="pesquisar" type="button">Pesquisar</button>
        </div>
      </div>
      <!-- fim da busca -->
        <table class="table table-hover text-center table-responsive mb-4">
          <thead class="centraliza">

        <table class="table table-hover col text-center table-responsive mb-4">
          <thead class="centraliza">
              <tr>
                <th scope="col">id</th>
                <th scope="col">usuário</th>
                <th scope="col">e-mail</th>
                <th scope="col">CPF</th>
                <th scope="col">Pedidos</th>
                <th scope="col">Tipo</th> <!-- admin, cliente -->
                <th scope="col">Status</th> <!-- ativo, bloqueado -->
              </tr>
          </thead>
          <tbody class="bg-white centraliza"><!-- CONTEÚDO DA TABELA -->
              <tr>
                <td>1</td>
                <td>nome e sobrenome</td>
                <td>emailusuario@mail.com</td>
                <td>101.010.101.10</td>
                <!--buttons-->
                <td><a class="linkstyle1" href="#"><i class="fas fa-box-open"></i><a/></td>
                <!-- selects -->
                <td><!-- começo select 1-->
                  <div class="input-group input-group-sm mr-2">
                    <select class="custom-select form-control" id="inputGroupSelect02">
                      <option selected>$tipoatual</option>
                      <option value="1">admin</option>
                      <option value="2">cliente</option>
                    </select>
                    <div class="input-group-append input-group-sm">
                        <button class="input-group-text" aria-label="confirmar alteração"><i class="linkstyle2 fas fa-check-square"></i></button>
                    </div>
                  </div>
                </td><!--fim do select 1-->
                <td><!-- começo select 2-->
                  <div class="input-group input-group-sm mr-2">
                    <select class="custom-select form-control" id="inputGroupSelect02">
                      <option selected>$statusatual</option>
                      <option value="1">ativo</option>
                      <option value="2">bloqueado</option>
                    </select>
                    <div class="input-group-append input-group-sm">
                      <button class="input-group-text" aria-label="confirmar alteração"><i class="linkstyle2 fas fa-check-square"></i></button>
                    </div>
                  </div>
                </td><!--fim do select 2-->
              </tr>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
