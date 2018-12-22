<?php require_once("header.php"); ?>
<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-10 col-lg-8 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Usuários cadastrados</i></h1>
      <div>
        <!-- BUSCA -->
        <div class="input-group mb-4 ml-2 mr-2 pr-2">
        <input type="text" class="form-control col-md-3" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-info opacidade" type="button">Pesquisar</button>
          </div>
        </div>
        <!-- fim da busca -->
      </div>
        <table class="table table-hover text-center centraliza table-responsive mb-4">
          <thead class="centraliza">
              <tr>
                <th scope="col">id</th>
                <th scope="col">usuário</th>
                <th scope="col">e-mail</th>
                <th scope="col">CPF</th>
                <th scope="col">Pedidos</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
          </thead>
          <tbody class="centraliza bg-white"><!-- CONTEÚDO DA TABELA -->
              <tr>
                <td>1</td>
                <td>nome e sobrenome</td>
                <td>emailusuario@mail.com</td>
                <td>101.010.101.10</td>
                <!--buttons-->
                <td><a class="linkstyle1" href="#"><i class="fas fa-box-open"></i><a/></td>
              </tr>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
