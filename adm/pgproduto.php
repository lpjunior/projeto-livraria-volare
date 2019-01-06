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
  <div class="col-12 col-sm-12 col-md-10 col-lg-10 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Produtos</i></h1>
      <div>
        <!-- BUSCA -->
          <form action="#" method="POST">
        <div class="input-group mb-4 ml-2 mr-2 pr-2">
        <input name="buscar-livro-adm" type="text" class="form-control col-md-3" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <input name="pesquisa" type="submit" class="btn btn-info opacidade" type="button" value="Pesquisar">
          </form>
          </div>
        </div>
        <!-- fim da busca -->

      </div>
				<table class="table table-hover text-center table-responsive mb-4">
          <thead class="centraliza">
              <tr>
                <th scope="col">id</th>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Editora</th>
                <th scope="col">ISBN</th>
                <th scope="col">Ano</th>
								<th scope="col">Sinopse</th>
                <th scope="col">Fornecedor</th>
								<th scope="col">Preço</th>
								<th scope="col">Qtd.</th>
              </tr>
          </thead>
          <tbody class="centraliza bg-white"><!-- CONTEÚDO DA TABELA -->
            <?php
						// Caso a pessoa tenha feito alguma busca, liste os produtos de acordo com a busca
            if (isset($_POST['pesquisa']) && $_POST['pesquisa']) {
            $produto = serviceBuscarLivro($_POST['buscar-livro-adm'], ' ', NULL, NULL, NULL);
						// Caso não tenha feito, liste todos os produtos
          } else {
            $produto = serviceListarLivro(NULL, TRUE);
          }
            foreach ($produto as $i) {
							// Função que bota reticencias se passar de 250 caracteres.
              $i['sinopse'] = resume($i['sinopse'], 250);
            ?>
              <tr>
                  <td><?=$i['id']?></td>
                  <td><?=$i['titulo']?></td>
                  <td><?=$i['autor']?></td>
                  <td><?=$i['editora']?></td>
                  <td><?=$i['isbn']?></td>
									<td><?=$i['data_publicacao']?></td>
                  <td><?=$i['sinopse']?></td>
                  <td><?=$i['fornecedor']?></td>
                  <td><?=$i['preco']?></td>
                  <td><?=$i['quantidade']?></td>
                  <!-- botões editar e excluir -->
                  <td><a class="linkstyle2" href="editaProduto.php?id=<?=$i['id'];?>"><i class="fas fa-pen"></i><a/></td>
                  <td><a class="linkstyle3" href="../php/CRUDS/excluirLivro.php?id=<?=$i['id']?>"><i class="fas fa-trash"></i><a/></td>
             </tr>
								 </tr>
               <?php } ?>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
