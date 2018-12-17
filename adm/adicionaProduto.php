
<?php require_once("includes/header.php"); ?>
<?php 
session_start(); 
 // echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if ($_SESSION['logado']!='true' or $_SESSION['nome_adm']!= 'fernando'){
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
     <h3 class="ligth"> Adiciona Produto</h3>
	 <form action="php_cruds/createProduto.php" method="POST">
	 
	  <div class="input-field col s12">
	    <div class="input-field col s6">
		  <input type="text" name="titulo" id="titulo">
	      <label for="titulo">Titulo</label>
		</div>
		<div class="input-field col s6">
		  <input type="text" name="autor" id="autor">
	      <label for="autor">Autor</label>
		</div>
	  </div>
	  
	  <div class="input-field col s12">
	      <div class="input-field col s6">
	        <input type="text" name="editora" id="editora">
	        <label for="editora">Editora</label>
	      </div>
		  <div class="input-field col s6">
		    <input type="text" name="isbn" id="isbn">
	        <label for="isbn">ISBN</label>
		  </div>
	  </div>
	  
	  <div class="input-field col s12">
	     <div class="input-field col s6">
	        <input type="number" name="numeroPaginas" id="numeroPaginas">
	        <label for="numeroPaginas">numeroPaginas</label>
		 </div>
		 <div class="input-field col s6">
		   <input type="text" name="sinopse" id="sinopse">
	       <label for="sinopse">Sinopse</label>
		 </div>
	  </div>
	  
	  <div class="input-field col s12">
	    <div class="input-field col s6">
	      <input type="number" name="peso" id="peso">
	      <label for="peso">Peso</label>
		  </div>
		  <div class="input-field col s6">
		    <input type="date" name="dataPublicacao" id="dataPublicacao">
	        <label for="dataPublicacao">dataPublicacao</label> 
			</div>
	  </div>
	  
	  <div class="input-field col s12">
	      <div class="input-field col s6">
	        <input type="text" name="fornecedor" id="fornecedor">
	        <label for="fornecedor">Fornecedor</label>
		  </div>
		  <div class="input-field col s6">
		    <input type="number" name="preco" id="preco">
	        <label for="preco">Preço</label>
          </div>			
	  </div>
	  
	  <div class="input-field col s12">
	       <div class="input-field col s6">
	         <input type="number" name="quantidade" id="quantidade">
	         <label for="quantidade">Quantidade</label>
			 </div>
		  
	  </div>
	  
	  
	  <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
	  <a href="pgProduto.php" type="submit" class="btn green">Voltar</a>
	
</div>
      


  <?php require_once("includes/footer.php"); ?>
