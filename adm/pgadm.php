<?php require_once("header.php"); ?>

<?php
session_start();
// echo  $_SESSION['logado']."<br>".$_SESSION['nome_adm'];
if (!isset($_SESSION['user_id'])){
	header('Location: adm.php');

}
?>

           <div class="row">
                        <div class="col-md-6">
                            <fieldset class="mt-5 col-6 mx-auto col-sm-4 card shadow p-3 mb-5 bg-white rounded">
                            <legend class="text-center font-weight-bold"> Pedidos</legend>



                        <div class="col s6 ">
                       <h3 class="ligth"> exibe pedidos</h3>
	                   </div>



	                     </fieldset>
                        </div>
                        <div class="col-md-6">
                         <fieldset class="mt-5 col-6 mx-auto col-sm-4 card shadow p-3 mb-5 bg-white rounded">
                         <legend class="text-center font-weight-bold">Produtos</legend>



                        <div class="col s6 ">
                          <h3 class="ligth"> exibe produtos</h3>
	                   </div>



	                      </fieldset>
                        </div>
			</div>

           <div class="row">
                        <div class="col-md-6">
                            <fieldset class="mt-5 col-6 mx-auto col-sm-4 card shadow p-3 mb-5 bg-white rounded">
                            <legend class="text-center font-weight-bold"> Clientes</legend>



                        <div class="col s6 ">
                       <h3 class="ligth"> exibe clientes</h3>
	                   </div>



	                     </fieldset>
                        </div>
                        <div class="col-md-6">
                         <fieldset class="mt-5 col-6 mx-auto col-sm-4 card shadow p-3 mb-5 bg-white rounded">
                         <legend class="text-center font-weight-bold">Fornecedores</legend>



                        <div class="col s6 ">
                          <h3 class="ligth"> exibe fornecedores</h3>
	                   </div>



	                      </fieldset>
                        </div>
                    </div>







<?php require_once("footer.php"); ?>
