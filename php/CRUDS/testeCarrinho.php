<!doctype html>
<?php session_start();?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  	<?php
  		$livros = array('livro1' => array('titulo' => 'Livro 1', 'categoria' => 'ação', 'autor' => 'Thiago', 'qtd' => 10, 'id' => 6),
  		'livro2' => array('titulo' => 'Livro 2', 'categoria' => 'aventura', 'autor' => 'Reinaldo', 'qtd' => 3, 'id' => 4),
  		'livro3' => array('titulo' => 'Livro 3', 'categoria' => 'Didatico', 'autor' => 'Roberto', 'qtd' => 7, 'id' => 5));

  	?>
  	<hr class="mt-5">
    <div class="row mt-5">
    	<div class="col-2"></div>
    	<?php
    		foreach ($livros as $i) {?>
    			<div class="col-3 ml-3">
    				Título: <?=$i['titulo'];?><br>
    				Categoria: <?=$i['categoria'];?><br>
    				Autor: <?=$i['autor']?><br>
    				<form action="carrinho.php?acao=add&id=<?=$i['id']?>" method="POST">
    				Quantidade: <input class="form-control"type="text" name="quantity">
    				<input class="btn mt-1" type="submit" name="enviar" value="Adicionar ao carrinho">
    				</form>
    				<!-- Quantidade: <?=$i['qtd']?><br> -->
    			</div>
    		<?php } ?>
    </div>
    <hr>
    <h1 class="text-center">Carrinho</h1>
    <?php
    		if (isset($_SESSION['carrinho'])) {
    			$cart = $_SESSION['carrinho'];
    			foreach ($livros as $b => $i) {
            if ($_SESSION['carrinho'][$i['id']] != 0) {
            ?>
    				Título: <?= $i['titulo'];?>
    				Quantidade: <?= $_SESSION['carrinho'][$i['id']]?>
            <form method="POST" action="carrinho.php?acao=atu&id=<?=$i['id']?>">
            <input type="text" name="quantity" required>
            <input class='btn' type="submit" name="enviar" value="Editar quantidade">
            </form>
    				<a href="carrinho.php?acao=del&id=<?=$i['id']?>">Tirar do carrinho</a><br>
    		<?php } } } ?>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
