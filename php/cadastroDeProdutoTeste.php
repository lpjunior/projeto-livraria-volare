<?php require_once 'uploadImagem.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <?php
                if (isset($_POST['enviar'])){
                  var_dump($_FILES['foto']);
                }
            ?>
            <form action="#" method="post" enctype="multipart/form-data">
                    Envie sua foto para o site!
                    <input type="file" name="foto"><BR>
                    <input type="submit" value="Enviar Foto!" name='enviar'>
                </form>

        </div>
    </body>
</html>
