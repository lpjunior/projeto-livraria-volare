<?php
// sessão
session_start();
require_once("header.php"); ?>
<?php
// Só poder entrar quando logado
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

<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-10 col-lg-8 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Usuários cadastrados</i></h1>
        <table class="table table-striped text-center table-responsive mb-4">
          <thead class="centraliza">
              <tr>
                <th scope="col">id</th>
                <th scope="col">usuário</th>
                <th scope="col">e-mail</th>
                <th scope="col">CPF</th>
                <th scope="col">Pedidos</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
          </thead>
          <tbody class="centraliza"><!-- CONTEÚDO DA TABELA -->
              <tr>
                <td>1</td>
                <td>nome e sobrenome</td>
                <td>emailusuario@mail.com</td>
                <td>101.010.101.10</td>
                <!--buttons-->
                <td><a class="linkstyle1" href="#"><i class="fas fa-box-open"></i><a/></td>
                <td><a class="linkstyle2" href="editaFornecedor.php?id=<?php echo $dados['id']; ?>"><i class="fas fa-pen"></i></i><a/></td>
         			  <td><a class="linkstyle3" href="#modal<?php echo $dados['id'];?>"><i class="fas fa-trash"></i><a/></td>
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
              </tr>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>
