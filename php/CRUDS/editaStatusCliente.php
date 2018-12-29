<?php
require_once 'serviceUsuario.php';
	if (isset($_POST['perfil'])){
    if ($user = serviceEditaStatusPerfil($_POST['status-perfil'], $_GET['id'])) {
					## Caso o usuarío retorne true, as informações foram alteradas com sucesso
				if ($user == true) {
						## Se não for true, retornar um alert.
					header('location: ../../adm/pgusuarios.php');
				} else {
					$_SESSION['editarFalse'] = $user;
					header('location: ../../adm/pgusuarios.php');
				}
			}
		}
    	if (isset($_POST['ativo'])){
        if ($user = serviceEditaStatusAtivo($_POST['status-ativo'], $_GET['id'])) {
    					## Caso o usuarío retorne true, as informações foram alteradas com sucesso
    				if ($user == true) {
    						## Se não for true, retornar um alert.
    					header('location: ../../adm/pgusuarios.php');
    				} else {
              echo $user;
            }
    			}
    		}
