<?php
session_start();
  include 'bibliotecagd.php';
  function uploadImg($Imgfile) {
  	$file = $Imgfile;
  	$dirUploads = './upload';
  	if(!is_dir($dirUploads)) {
  		mkdir($dirUploads);
  	}
    // Gera o nome do Arquivo com a extensão
    $fileName = md5(uniqid()) . '-' . time() . '.jpeg';
    // Variável com o nome da imagem e a extensão
    $nome = $fileName;
    $newFilename = 'upload' . DIRECTORY_SEPARATOR . $fileName;
    $_SESSION['capa_imagem'] = $newFilename;
  	// http://php.net/manual/pt_BR/function.move-uploaded-file.php
  	#move_uploaded_file(filename, destination) // essa função retorna um booleano
  	if(move_uploaded_file($file['tmp_name'], $newFilename)) {
  		#echo 'Arquivo enviado com sucesso. ' . $newFilename;
      createThumbnail($newFilename, $nome);
  	} else {
  		//throw new Exception('Falha ao efetuar o upload.');
  		echo 'Erro ao efetuar o upload';
  		exit;
  	}
  }
