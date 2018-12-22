<!--
- Linkar editaFornecedor, editaProduto e editaPedido no botão editar e função apagar no botão apagar /ctrl + f: botões/
nas páginas: pgfornecedor, pgpedido, pgproduto (e verificar nessas páginas a parte Modal Structure /só dar ctrl + F e
digitar modal/ que o Fernando fez);
Ainda nessas três páginas implementar o php na busca;
- Linkar meu perfil na página header;
- Ver se a página vendas faz sentido, se não, excluir a pag e o link do header
- em pgpedido colocar link pro visualizarpedido.php
- pgfornecedor tá dando variável indefinida
- Verificar o session_start, aparece a mensagem "A session had already been started - ignoring in ..."
-->

<?php require_once("header.php");?>
<section class="row container-fluid">
    <div class="col-12 col-sm-12 col-md-10 col-lg-10 centraliza mt-3">
	     <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Fornecedores</i></h1>
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
							 <th scope="col">Razão Social</th>
							 <th scope="col">CNPJ</th>
							 <th scope="col">inscEstadual</th>
							 <th scope="col">CEP</th>
							 <th scope="col">Logradouro</th>
							 <th scope="col">Número</th>
							 <th scope="col">complemento</th>
							 <th scope="col">bairro</th>
							 <th scope="col">cidade</th>
							 <th scope="col">Estado</th>
							 <th scope="col">Telefone</th>
							 <th scope="col">E-mail</th>
						 </tr>
				 </thead>
				 <tbody class="centraliza bg-white"><!-- CONTEÚDO DA TABELA -->
						<tr><!--linha1-->
							 <td> <?php echo $dados['razaoSocial'];?></td>
							 <td> <?php echo $dados['cnpj'];?></td>
							 <td> <?php echo $dados['inscEstadual'];?></td>
							 <td> <?php echo $dados['cep'];?></td>
							 <td> <?php echo $dados['logradouro'];?></td>
							 <td> <?php echo $dados['numero'];?></td>
							 <td> <?php echo $dados['complemento'];?></td>
							 <td> <?php echo $dados['bairro'];?></td>
							 <td> <?php echo $dados['cidade'];?></td>
							 <td><?php echo $dados['estado'];?></td>
							 <td> <?php echo $dados['telefone'];?></td>
							 <td> <?php echo $dados['email'];?></td>
               <!-- botões editar e excluir -->
							 <td><a class="linkstyle2" href="editaFornecedor.php?id=<?php echo $dados['id']; ?>"><i class="fas fa-pen"></i><a/></td>
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
						</tr><!--fim da linha-->
		      </tbody>
		    </table>
	   </div>
  </section>
<?php require_once("footer.php"); ?>
