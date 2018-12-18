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
								<?php
								$sql="SELECT * FROM produto";
								$resultado = mysqli_query($connect, $sql);
								while($dados= mysqli_fetch_array ($resultado)){
								?>

									<td> <?php echo $dados['titulo'];?></td>
									<td> <?php echo $dados['autor'];?></td>
									<td> <?php echo $dados['editora'];?></td>
									<td> <?php echo $dados['isbn'];?></td>
									<td> <?php echo $dados['numeroPaginas'];?></td>
									<td> <?php echo $dados['sinopse'];?></td>
									<td> <?php echo $dados['peso'];?></td>
									<td> <?php echo $dados['dataPublicacao'];?></td>
									<td> <?php echo $dados['fornecedor'];?></td>
									<td><?php  echo $dados['preco'];?></td>
									<td> <?php echo $dados['quantidade'];?></td>


									<td><a class="linkstyle2" href="editaProduto.php?id=<?php echo $dados['id']; ?>"><i class="fas fa-box-open"></i><a/></td>
									<td><a class="linkstyle3" href="#modal<?php echo $dados['id'];?>"><i class="fas fa-pen"></i><a/></td>
									<!-- Modal Structure -->
												<div id="modal<?php echo $dados['id'];?>" class="modal">
												<div class="modal-content">
												<h4>Atenção </h4>
												<p>Tem certeza que deseja excluir esse produto ?</p>
											</div>
												<div class="modal-footer">
														 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
												 <form action="php_cruds/deleteProduto.php" method ="POST">
													 <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
													 <button type="submit"name="btn-deletar" class="btn red">sim, quero deletar</button>
												 </form>
												</div>
											</div>

								 </tr>
								<?php } ?>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
