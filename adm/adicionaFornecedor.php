
<?php require_once("includes/header.php"); ?>
<?php
session_start();
// Só poder logar quando logado
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
     <h3 class="ligth"> Adiciona Fornecedor</h3>
	 <form action="php_cruds/create.php" method="POST">

	  <div class="input-field col s12">
	    <div class="input-field col s6">
		  <input type="text" name="razaoSocial" id="razaoSocial">
	      <label for="razaoSocial">razãoSocial</label>
		</div>
		<div class="input-field col s6">
		  <input type="text" name="cnpj" id="cnpj">
	      <label for="cnpj">CNPJ</label>
		</div>
	  </div>

	  <div class="input-field col s12">
	      <div class="input-field col s6">
	        <input type="text" name="inscEstadual" id="inscEstadual">
	        <label for="inscEstadual">inscEstadual</label>
	      </div>
		  <div class="input-field col s6">
		    <input type="text" name="cep" id="cep">
	        <label for="cep">CEP</label>
		  </div>
	  </div>

	  <div class="input-field col s12">
	     <div class="input-field col s6">
	        <input type="text" name="logradouro" id="logradouro">
	        <label for="logradouro">Logradouro</label>
		 </div>
		 <div class="input-field col s6">
		   <input type="number" name="numero" id="numero">
	       <label for="numero">NUMERO</label>
		 </div>
	  </div>

	  <div class="input-field col s12">
	    <div class="input-field col s6">
	      <input type="text" name="complemento" id="complemento">
	      <label for="complemento">Complemento</label>
		  </div>
		  <div class="input-field col s6">
		    <input type="text" name="bairro" id="bairro">
	        <label for="bairro">Bairro</label>
			</div>
	  </div>

	  <div class="input-field col s12">
	      <div class="input-field col s6">
	        <input type="text" name="cidade" id="cidade">
	        <label for="cidade">Cidade</label>
		  </div>
		  <div class="input-field col s6">
		    <input type="text" name="estado" id="estado">
	        <label for="estado">Estado</label>
          </div>
	  </div>

	  <div class="input-field col s12">
	       <div class="input-field col s6">
	         <input type="text" name="telefone" id="telefone">
	         <label for="telefone">Telefone</label>
			 </div>
		  <div class="input-field col s6">
		    <input type="email" name="email" id="email">
	        <label for="email">Email</label>
		  </div>
	  </div>


	  <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
	  <a href="pgfornecedor.php" type="submit" class="btn green">Voltar</a>

</div>



  <?php require_once("includes/footer.php"); ?>
