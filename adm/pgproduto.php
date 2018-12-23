<?php require_once("header.php"); ?>
<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-10 col-lg-10 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Produtos</i></h1>
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
				<table class="table table-hover text-center table-responsive mb-4">
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
          <tbody class="centraliza bg-white"><!-- CONTEÚDO DA TABELA -->
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
                  <!-- botões editar e excluir -->
                  <td><a class="linkstyle2" href="editaProduto.php?id=<?=$i['id'];?>"><i class="fas fa-pen"></i><a/></td>
                  <td><a class="linkstyle3" href="#modal<?=$i['id'];?>"><i class="fas fa-trash"></i><a/></td>
                    <!-- Modal Structure -->
     				            <div id="modal<?=$i['id'];?>" class="modal">
     				              <div class="modal-content">
     						             <h4>Atenção </h4>
     						             <p>Tem certeza que deseja excluir esse fornecedor ?</p>
     				           		</div>
     				              <div class="modal-footer">
     					                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
     													<form action="php_cruds/delete.php" method ="POST">
     													<input type="hidden" name="id" value="<?=$i['id'];?>">
     													<button type="submit"name="btn-deletar" class="btn red">sim, quero deletar</button>
     													</form>
     				           		</div>
     				           </div>
                     <!-- fim do modal estructure -->
             </tr>
								 </tr>
               <?php } ?>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
