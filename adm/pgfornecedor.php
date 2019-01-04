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
	     <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Fornecedores</i></h1>
        <div>
          <!-- BUSCA -->
          <form action="#" method="POST">
          <div class="input-group mb-4 ml-2 mr-2 pr-2">
          <input name="fornecedor" type="text" class="form-control col-md-3" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <input type="submit" name="pesquisa" class="btn btn-info opacidade" value="Pesquisar">
          </div>
          <!-- fim da busca -->
        </form>
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
						 // Caso a pessoa tenha feito alguma busca, liste os fornecedores de acordo com a busca
               if (isset($_POST['pesquisa']) && $_POST['pesquisa']) {
               $fornecedor = servicePesquisarFornecedor($_POST['fornecedor']);
             } else {
							 // Caso não tenha feito, liste todos os fornecedores
               $fornecedor = listarFornecedor(NULL);
             }
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
