<?php require_once("header.php"); ?>

<?php /*
session_start();
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');

} */
?>

<section class="row container-fluid">
  <div class="col-12 col-sm-12 col-md-10 col-lg-8 centraliza mt-3">
    <h1 class="fontedezoito text-left pb-2 pt-2 opacidade"><i class="fas fa-caret-right"></i>&nbsp;<i>Consulta de vendas</i></h1>
        <table class="table table-striped text-center table-responsive mb-4">
          <thead class="centraliza">
              <tr> <!-- feita pelos caras de BD -->
                <th scope="col">Nome</th>
                <th scope="col">cpf</th>
                <th scope="col">título</th>
                <th scope="col">Autor</th>
                <th scope="col">Editora</th>
                <th scope="col">número_pedido</th>
                <th scope="col">data_pedido</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
              </tr>
          </thead>
          <tbody class="centraliza"><!-- CONTEÚDO DA TABELA -->
              <tr>
                <td>nome</td>
                <td>cpf</td>
                <td>título</td>
                <td>autor</td>
                <td>editora</td>
                <td>numero_pedido</td>
                <td>data_pedido</td>
                <td>qtd</td>
                <td>preço</td>
              </tr>
          </tbody><!-- fim do conteúdo da tabela-->
        </table>

  </div>
</section>
<?php require_once("footer.php"); ?>

<!-- NÃO CHAME O FOOTER -->
