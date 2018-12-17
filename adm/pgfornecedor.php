<?php require_once("header.php"); ?>
<?php
// sessão
session_start();

//conexão
require_once("db_connect.php");
//Header
require_once("includes/header.php"); ?>
<?php

 // echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user'])){
	header('Location: adm.php');

}
?>
<?php
if (isset($_SESSION['mensagem'])){?>
	 <script>

	window.onload = function (){
		  M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});

	  };

	</script>
<?php } ?>
<div class="row">
   <div class="col s12 m6 push-m3">
     <h2 class="ligth"> Fornecedores:</h2>
    <table class="striped" >
	   <thead>
	    <tr>
		    <th> Razão Social:</th>
			 <th> CNPJ:</th>
			  <th> inscEstadual:</th>
			  <th> CEP:</th>
				 <th> Logradouro:</th>
				  <th> numero:</th>
				   <th> complemento:</th>
				    <th> bairro:</th>
					 <th> cidade:</th>
					  <th> estado:</th>
					   <th> telefone:</th>
					    <th> email:</th>



		</tr>

	   </thead>


	   <tbody>
	      <tr>
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

			 <td><a href="editaFornecedor.php?id=<?php echo $dados['id']; ?>" class="btn-floating yellow"><i class="material-icons">edit</i><a/></td>
			 <td><a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i><a/></td>
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

		  </tr>
	   </tbody>
	</table>
	<br>
	<a href="adicionaFornecedor.php" type="submit" class="btn">Adicionar</a>
</div>



  <?php require_once("includes/footer.php"); ?>
<?php require_once("footer.php"); ?>
