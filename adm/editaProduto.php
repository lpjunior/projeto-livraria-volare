
<?php require_once("includes/header.php"); ?>
<?php 
session_start(); 
 // echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if ($_SESSION['logado']!='true' or $_SESSION['nome_adm']!= 'fernando'){
	header('Location: adm.php');
	
}
require_once 'db_connect.php';
if(isset($_GET['id'])){
	$id=mysqli_escape_string($connect, $_GET['id']);
	$sql = "SELECT * FROM produto WHERE id= '$id'";
	$resultado = mysqli_query($connect,$sql);
	$dados = mysqli_fetch_array($resultado);
}

if (isset($_SESSION['mensagem'])){
	
}
?>

<div class="row">
   <div class="col s12 m6 push-m3">
     <h3 class="ligth"> Editar Produto</h3>
	 <form action="php_cruds/updateProduto.php" method="POST">
	  <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
	  <div class="input-field col s12">
	      <div class="input-field col s6">
	        <input type="text" name="titulo" id="titulo"value="<?php echo $dados['titulo'];?>">
	        <label for="titulo">Titulo</label>
		  </div>
		   <div class="input-field col s6">
	        <input type="text" name="autor" id="cnpj"value="<?php echo $dados['autor'];?>">
	        <label for="autor">Autor</label>
	       </div>
	  </div>
	  
	  <div class="input-field col s12">
	      <div class="input-field col s6">
	      <input type="text" name="editora" id="editora"value="<?php echo $dados['editora'];?>">
		  <label for="editora">Editora</label>
		  </div>
		  <div class="input-field col s6">
	        <input type="text" name="isbn" id="isbn"value="<?php echo $dados['isbn'];?>">
			<label for="isbn">ISBN</label>
	      </div>
	  </div>
	  
	  <div class="input-field col s12">
	        <div class="input-field col s6">
	         <input type="number" name="numeroPaginas" id="numeroPaginas"value="<?php echo $dados['numeroPaginas'];?>">
	         <label for="logradouro">numeroPaginas</label>
			 </div>
	        <div class="input-field col s6">
	         <input type="text" name="sinopse" id="sinopse"value="<?php echo $dados['sinopse'];?>">
			 <label for="numero">Sinopse</label>
	        </div>
	  </div>
	  
	  <div class="input-field col s12">
	        <div class="input-field col s6">
	         <input type="number" name="peso" id="peso"value="<?php echo $dados['peso'];?>">
			 <label for="peso">Peso</label>
			 </div>
			 <div class="input-field col s6">
	         <input type="date" name="dataPublicacao" id="dataPublicacao"value="<?php echo $dados['dataPublicacao'];?>">
			 <label for="bairro">dataPublicacao</label> 
	        </div>
	  </div>
	  
	  <div class="input-field col s12">
	       <div class="input-field col s6">
	       <input type="text" name="fornecedor" id="fornecedor"value="<?php echo $dados['fornecedor'];?>">
		   <label for="fornecedor">Fornecedor</label>
		   </div>
		   <div class="input-field col s6">
	       <input type="number" name="preco" id="preco"value="<?php echo $dados['preco'];?>">
		   <label for="preco">Preço</label>
	       </div>
		   
	  </div>
	  
	  <div class="input-field col s12">
	        <div class="input-field col s6">
	        <input type="number" name="quantidade" id="quantidade"value="<?php echo $dados['quantidade'];?>">
			<label for="quantidade">Quantidade</label>
			</div>
			
			
	  </div>
	  
	  
	  <button type="submit" name="btn-editar" class="btn">Atualizar</button>
	  <a href="pgProduto.php" type="submit" class="btn green">Voltar</a>
	
</div>
      


  <?php require_once("includes/footer.php"); ?>
