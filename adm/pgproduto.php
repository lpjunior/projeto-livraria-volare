<?php
// sessão
session_start();
// Só poder entrar quando logado
//Header
require_once("includes/header.php"); ?>
<?php
if (isset($_SESSION['mensagem'])){?>
<?php }
?>


<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-10 col-lg-10 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Produtos</i></h1>
				<div class="form-group text-righ mb-4 pr-2">
						<div>
							<button type="submit" class="btn fontequinze opacidade COLORE1" alt="comentar" name="" onclick="adicionaProduto.php">Adicionar</button>
						</div>
				</div>
				<table class="table table-striped text-center table-responsive mb-4">
          <thead class="centraliza">
              <tr>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Editora</th>
                <th scope="col">ISBN</th>
                <th scope="col">num_pág</th>
								<th scope="col">Sinopse</th>
                <th scope="col">Fornecedor</th>
								<th scope="col">Preço</th>
								<th scope="col">Qtd.</th>
              </tr>
          </thead>
          <tbody class="centraliza"><!-- CONTEÚDO DA TABELA -->
              <tr>


                  <td></td>
                  <td></td>
                  <td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

								 </tr>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
