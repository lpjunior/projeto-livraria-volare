	
	<fieldset class="mt-5 col-12 mx-auto col-sm-4 card shadow p-3 mb-5 bg-white rounded">
  <legend class="text-center font-weight-bold">Login</legend>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <div class="form-group">
      <label for="itext" class="sr-only">Login</label>
      <input type="text" id="login" name="login" placeholder="Informe o Login" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="senha" class="sr-only">Senha</label>
      <input type="password" id="senha" name="senha" placeholder="Informe a senha" class="form-control" required>
    </div>
	
	<?php
	
	// conexão
	require_once 'db_connect.php';
	
	
	// botão enviar
	if (isset($_POST['btn-entrar'])){
		$login = mysqli_escape_string($connect, $_POST['login']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);
		 $senha = md5($senha);
		$sql = "SELECT * FROM usuarioadm WHERE login='$login' AND senha='$senha'";
	    $resultado = mysqli_query($connect, $sql);
		if (mysqli_num_rows($resultado)>0){
			$dados = mysqli_fetch_array($resultado);
	    
		    if($dados['nome']== 'fernando'){
				session_start();
			  $_SESSION['logado'] =true;
	          $_SESSION['nome_adm'] = $dados['nome'];
			header('Location: pgadm.php');
			}
		}else{
			echo"usuario/senha incorreto(s) "; 
		}
	}
	


	

  
					 

                    
                          
              
               

               


    
?>
    <div>
      <button class="btn btn-dark btn-block col-12 col-sm-3" name="btn-entrar" type="submit">Entrar</button>
    </div>
  </form>
</fieldset>
