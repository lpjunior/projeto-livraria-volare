<?php
// sessão
session_start();
// Só poder entrar quando logado
//Header
require_once("header.php"); ?>
<?php
if (isset($_SESSION['mensagem'])){?>
<?php }
?>


<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-10 col-lg-10 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Produtos</i></h1>
				<div class="form-group text-righ mb-4 pr-2">
						<div>
							<a href="cadastrarpro.php" class="btn fontequinze opacidade COLORE1" alt="comentar">Adicionar</a>
						</div>
				</div>
				<table class="table table-striped text-center table-responsive mb-4">
          <thead class="centraliza">
              <tr>
                <th scope="col">id</th>
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
            <?php
            $produto = listarLivro(NULL, NULL);
            foreach ($produto as $i) {
              $i['sinopse'] = resume($i['sinopse'], 250);
            ?>
              <tr>
                  <td><?=$i['id']?></td>
                  <td><?=$i['titulo']?></td>
                  <td><?=$i['autor']?></td>
                  <td><?=$i['editora']?></td>
                  <td><?=$i['isbn']?></td>
									<td><?=$i['numero_paginas']?></td>
                  <td><?=$i['sinopse']?></td>
                  <td><?=$i['fornecedor']?></td>
                  <td><?=$i['preco']?></td>
                  <td><?=$i['quantidade']?></td>

								 </tr>
               <?php } ?>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
