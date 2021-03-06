<?php
if (!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');
}
require_once("header.php");
?>
<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-10 col-lg-9 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Usuários cadastrados</i></h1>
      <!-- BUSCA -->
			<form action="#" method="POST">
      <div class="input-group mb-4 ml-2 mr-2 pr-2">
      <input type="text" name="pesquisa-cliente" class="form-control col-md-3" aria-label="campo de busca">
        <div class="input-group-append">
          <input type="submit" name="pesquisa" class="btn btn-info opacidade" aria-labelledby="pesquisar" value="Pesquisar">
        </div>
      </div>
		</form>
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
						<?php
						if (isset($_POST['pesquisa'])){
							$cliente = servicePesquisarCliente($_POST['pesquisa-cliente']);
						} else {
						$cliente = serviceListarUsu(NULL, NULL, 1);
						}
						foreach ($cliente as $i) {
						?>
              <tr>
                <td><?=$i['id']?></td>
                <td><?=$i['nome']." ".$i['sobrenome']?></td>
                <td><?=$i['email']?></td>
                <td><?=$i['cpf']?></td>
                <!--buttons-->
                <td><a class="linkstyle1" href="#"><i class="fas fa-box-open"></i><a/></td>
                <!-- selects -->
								<form action="../php/CRUDS/editaStatusCliente.php?id=<?=$i['id']?>" method="POST">
                <td><!-- começo select 1-->
                  <div class="input-group input-group-sm mr-2">
                    <select class="custom-select form-control" id="inputGroupSelect02" name="status-ativo">
											<?php
											if ($i['ativo'] == 1){ ?>
												<option value="1" selected>Ativo</option>
												<option value="0">Desativo</option>
											<?php } else { ?>
												<option value="0" selected>Desativo</option>
												<option value="1">Ativo</option>
											<?php } ?>
                    </select>
                    <div class="input-group-append input-group-sm">
                        <button type="submit" name="ativo" class="input-group-text" aria-label="confirmar alteração"><i class="linkstyle2 fas fa-check-square"></i></button>
                    </div>
                  </div>
                </td><!--fim do select 1-->
								<td><!-- começo select 1-->
                  <div class="input-group input-group-sm mr-3">
                    <select class="custom-select form-control" id="inputGroupSelect02" name="status-perfil">
											<?php
											$cliente3 = serviceListarClienteId();
											foreach ($cliente3 as $b) {
											?>
											<option value="<?=$b['id']?>" <?=($b['id'] == $i['perfil_id'] ? "selected" : '')?>><?=$b['perfil']?></option>
										<?php } ?>
                    </select>
                    <div class="input-group-append input-group-sm">
                        <button type="submit" name="perfil" class="input-group-text" aria-label="confirmar alteração"><i class="linkstyle2 fas fa-check-square"></i></button>
                    </div>
                  </div>
                </td><!--fim do select 1-->
              </tr>
						</form>
						<?php } ?>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
