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
   <div class="col s12 m6 push-m3>
     <h2 class="ligth"> Clientes:</h2>
    <table class="striped" >
	   <thead>
	    <tr>
		    <th> Nome:</th>
			 <th> Sobrenome:</th>
			  <th> email:</th>
			  <th> CPF:</th>
				 <th> dataNascimento:</th>
				  <th> Ativo:</th>
				   <th> Senha:</th>
				    <th> Perfil_id:</th>
					 <th> Genero_id:</th>
					  
						 
						  
						  
		</tr>
		
	   </thead>
	   
	   
	   <tbody>
	   <?php
	   $sql="SELECT * FROM usuarios";
	   $resultado = mysqli_query($connect, $sql);
	   while($dados= mysqli_fetch_array ($resultado)){
	   ?>
	      <tr>
		     <td> <?php echo $dados['nome'];?></td>
			 <td> <?php echo $dados['sobrenome'];?></td>
			 <td> <?php echo $dados['email'];?></td>
			 <td> <?php echo $dados['cpf'];?></td>
			 <td> <?php echo $dados['datanascimento'];?></td>
			 <td> <?php echo $dados['ativo'];?></td>
			 <td> <?php echo $dados['senha'];?></td>
			 <td> <?php echo $dados['perfil_id'];?></td>
			 <td> <?php echo $dados['genero_id'];?></td>
			 
			 
			 <td><a href="editaFornecedor.php?id=<?php echo $dados['id']; ?>" class="btn-floating yellow"><i class="material-icons">edit</i><a/></td>
			 <td><a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i><a/></td>
			 <!-- Modal Structure -->
             <div id="modal<?php echo $dados['id'];?>" class="modal">
             <div class="modal-content">
             <h4>Atenção </h4>
             <p>Tem certeza que deseja excluir esse usuario ?</p>
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
	   <?php } ?>
	   </tbody>
	</table>
	<br>
	<a href="adicionaUsuario.php" type="submit" class="btn">Adicionar</a>
</div>
      


  <?php require_once("includes/footer.php"); ?>
<?php require_once("footer.php"); ?>