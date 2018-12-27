<?php require_once("header.php"); ?>
		<div class="container-fluid pt-5">
			<fieldset class="mt-5 mx-auto col-sm-10 col-12 col-md-4 col-lg-4 card shadow p-3 mb-5 bg-white rounded">
		  <legend class="text-center font-weight-bold">Login</legend>
		  <form action="../php/CRUDS/loginUsuario.php" method="post">
		    <div class="form-group">
		      <label for="itext" class="sr-only">Email</label>
		      <input type="email" name="txtEmail" placeholder="Informe o email" class="form-control" required>
		    </div>
		    <div class="form-group">
		      <label for="senha" class="sr-only">Senha</label>
		      <input type="password" name="isenha" placeholder="Informe a senha" class="form-control" required>
		    </div>
		    <div>
		      <button class="btn btn-dark btn-block col-12 col-sm-3" name="btn-entrar" value="a" type="submit">Entrar</button>
		    </div>
		  </form>
		</fieldset>
	</div>
	<?php require_once("footer.php"); ?>
