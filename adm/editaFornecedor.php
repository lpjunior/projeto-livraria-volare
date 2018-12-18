
<?php require_once("includes/header.php"); ?>
<?php
session_start();
// Só poder entrar quando logado
require_once 'db_connect.php';
if(isset($_GET['id'])){
	$id=mysqli_escape_string($connect, $_GET['id']);
	$sql = "SELECT * FROM fornecedor WHERE id= '$id'";
	$resultado = mysqli_query($connect,$sql);
	$dados = mysqli_fetch_array($resultado);
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
     <h3 class="ligth"> Editar Fornecedor</h3>
	 <form action="php_cruds/update.php" method="POST">
	  <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
	  <div class="input-field col s12">
	      <div class="input-field col s6">
	        <input type="text" name="razaoSocial" id="razaoSocial"value="<?php echo $dados['razaoSocial'];?>">
	        <label for="razaoSocial">razãoSocial</label>
		  </div>
		   <div class="input-field col s6">
	        <input type="text" name="cnpj" id="cnpj"value="<?php echo $dados['cnpj'];?>">
	        <label for="cnpj">CNPJ</label>
	       </div>
	  </div>

	  <div class="input-field col s12">
	      <div class="input-field col s6">
	      <input type="text" name="inscEstadual" id="inscEstadual"value="<?php echo $dados['inscEstadual'];?>">
		  <label for="inscEstadual">inscEstadual</label>
		  </div>
		  <div class="input-field col s6">
	        <input type="text" name="cep" id="cep"value="<?php echo $dados['cep'];?>">
			<label for="cep">CEP</label>
	      </div>
	  </div>

	  <div class="input-field col s12">
	        <div class="input-field col s6">
	         <input type="text" name="logradouro" id="logradouro"value="<?php echo $dados['logradouro'];?>">
	         <label for="logradouro">Logradouro</label>
			 </div>
	        <div class="input-field col s6">
	         <input type="number" name="numero" id="numero"value="<?php echo $dados['numero'];?>">
			 <label for="numero">NUMERO</label>
	        </div>
	  </div>

	  <div class="input-field col s12">
	        <div class="input-field col s6">
	         <input type="text" name="complemento" id="complemento"value="<?php echo $dados['complemento'];?>">
			 <label for="complemento">Complemento</label>
			 </div>
			 <div class="input-field col s6">
	         <input type="text" name="bairro" id="bairro"value="<?php echo $dados['bairro'];?>">
			 <label for="bairro">Bairro</label>
	        </div>
	  </div>

	  <div class="input-field col s12">
	       <div class="input-field col s6">
	       <input type="text" name="cidade" id="cidade"value="<?php echo $dados['cidade'];?>">
		   <label for="cidade">Cidade</label>
		   </div>
		   <div class="input-field col s6">
	       <input type="text" name="estado" id="estado"value="<?php echo $dados['estado'];?>">
		   <label for="estado">Estado</label>
	       </div>

	  </div>

	  <div class="input-field col s12">
	        <div class="input-field col s6">
	        <input type="text" name="telefone" id="telefone"value="<?php echo $dados['telefone'];?>">
			<label for="telefone">Telefone</label>
			</div>
			<div class="input-field col s6">
	        <input type="email" name="email" id="email"value="<?php echo $dados['email'];?>">
			<label for="email">Email</label>
	        </div>

	  </div>


	  <button type="submit" name="btn-editar" class="btn">Atualizar</button>
	  <a href="pgfornecedor.php" type="submit" class="btn green">Voltar</a>

</div>



  <?php require_once("includes/footer.php"); ?>
