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
							 <th scope="col">Nome</th>
							 <th scope="col">Razão Social</th>
							 <th scope="col">CNPJ</th>
							 <th scope="col">Endereço</th>
							 <th scope="col">Telefone</th>
							 <th scope="col">Email</th>
							 <th scope="col">Forma de Pagamento</th>
						 </tr>
				 </thead>
				 <tbody class="centraliza bg-white"><!-- CONTEÚDO DA TABELA -->
           <?php
           $fornecedor = serviceListarFornecedor();
           foreach ($fornecedor as $i) {
           ?>
						<tr><!--linha1-->
							 <td> <?=$i['nome']?></td>
							 <td> <?=$i['razao_social']?></td>
							 <td> <?=$i['cnpj']?></td>
							 <td> <?=$i['endereco']?></td>
							 <td> <?=$i['telefone']?></td>
							 <td> <?=$i['email']?></td>
							 <td> <?=$i['forma_pagamento']?></td>

               <!-- botões editar e excluir -->
							 <td><a class="linkstyle2" href="editaFornecedor.php?id=<?=$i['id']?>"><i class="fas fa-pen"></i><a/></td>
							 <td><a class="linkstyle3" href="../php/CRUDS/excluiFornecedor.php?id=<?=$i['id']?>"><i class="fas fa-trash"></i><a/></td>
               <?php } ?>
                <!-- fim do modal estructure -->
						</tr><!--fim da linha-->
		      </tbody>
		    </table>
	   </div>
  </section>
<?php require_once("footer.php"); ?>
