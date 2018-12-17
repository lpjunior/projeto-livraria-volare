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
if (isset($_SESSION['mensagem'])):?>
	 <script>

	window.onload = function (){
		  M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});

	  };

	</script>

<?php endif;
?>

<div class="row">
   <div class="col s12 m6 push-m3">
     <h2 class="ligth"> Produtos:</h2>
    <table class="striped" >
	   <thead>
	    <tr>
		    <th> Titulo:</th>
			 <th> Autor:</th>
			  <th> Editora:</th>
			  <th> ISBN:</th>
				 <th> numeroPaginas:</th>
				  <th> Sinopse:</th>
				   <th> Peso:</th>
				    <th> dataPublicação:</th>
					 <th> fornecedor:</th>
					  <th> Preço:</th>
					   <th> Quantidade:</th>




		</tr>

	   </thead>


	   <tbody>
	   <?php
	   $sql="SELECT * FROM produto";
	   $resultado = mysqli_query($connect, $sql);
	   while($dados= mysqli_fetch_array ($resultado)){
	   ?>
	      <tr>
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


			 <td><a href="editaProduto.php?id=<?php echo $dados['id']; ?>" class="btn-floating yellow"><i class="material-icons">edit</i><a/></td>
			 <td><a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i><a/></td>
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
	   </tbody>
	</table>
	<br>
	<a href="adicionaProduto.php" type="submit" class="btn">Adicionar</a>
</div>



  <?php require_once("includes/footer.php"); ?>
<?php require_once("footer.php"); ?>
