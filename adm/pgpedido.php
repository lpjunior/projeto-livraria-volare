<?php require_once("header.php");?>
<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-8 col-lg-8 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Pedidos do cliente <b>id</b></i></h1>
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
                <th scope="col">Data</th>
                <th scope="col">Pedido_id</th>
								<th scope="col">status compra</th>
                <th scope="col">Previsão de entrega</th>
								<th scope="col">status entrega</th>
								<th scope="col">Visualizar pedido</th>
              </tr>
          </thead>
          <tbody class="centraliza bg-white"><!-- CONTEÚDO DA TABELA
          **********ordenar pela data do pedido-->
              <tr>
									<td>datapedido</td>
									<td>id</td>
									<td>status da compra</td>
                  <td>data de previsão de entrega</td>
									<td>status da entrega</td>
                  <!-- LINKAR PELO ID DO PEDIDO O A ABAIXO -->
									<td><a class="linkstyle1" href="#"><i class="fas fa-sign-in-alt"></i><a/></td>

                    <!-- botões editar e excluir -->
     							 <td><a class="linkstyle2" href="editaPedido.php?id=<?php echo $dados['id']; ?>"><i class="fas fa-pen"></i><a/></td>
     							 <td><a class="linkstyle3" href="#modal<?php echo $dados['id'];?>"><i class="fas fa-trash"></i><a/></td>
                     <!-- Modal Structure -->
      				            <div id="modal<?php echo $dados['id'];?>" class="modal">
      				              <div class="modal-content">
      						             <h4>Atenção </h4>
      						             <p>Tem certeza que deseja excluir esse fornecedor ?</p>
      				           		</div>
      				              <div class="modal-footer">
      					                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
      													<form action="php_cruds/delete.php" method ="POST">
      													<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
      													<button type="submit"name="btn-deletar" class="btn red">sim, quero deletar</button>
      													</form>
      				           		</div>
      				           </div>
                      <!-- fim do modal estructure -->
							</tr>
					</tbody>
				</table>
	</div>
</section>
<?php require_once("footer.php"); ?>
