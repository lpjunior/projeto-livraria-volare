<?php
$app->get('/cadastro', function ($request, $response, $args) {
  if (isset($_GET['erro'])){
    echo "<script>alert('Falha no cadastro');</script>";
  }
?>
            <div class="container-fluid col-md-10 centraliza mt-4">
                <fieldset><!-- *************início do formulário ********************** -->
                    <legend><h1 class="fontevinteecinco">Cadastro</h1></legend>
                    <?php
                    if (isset($_SESSION['erro_cadastro'])){
                      $erro = $_SESSION['erro_cadastro'];
                      echo "<ul>";
                      foreach ($erro as $i) {
                        echo "<li class='text-danger'> $i </li>";
                      }
                      echo "</ul>";
                      unset($_SESSION['erro_cadastro']);
                    }
                    ?>
                    <form action="php/CRUDS/registroUsuario.php" method="POST">
                        <div class="form-group"> <h4 class="fontedezoito"><b>Dados pessoais</b></h4>
							<div class="row">
								<div class="col-md">
									<label for="iNome">Nome:</label>
									<input type="text" id="iNome" name="txtNome" class="form-control" maxlength="100" required>
									<br/>
								</div>
								<div class="col-md">
									<label for="iSobrenome">Sobrenome:</label>
									<input type="text" id="iSobrenome" name="txtSobrenome" class="form-control" maxlength="80" required>
									<br/>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<label for="iDataNasc">Data de nascimento:</label>
									<input type="text" id="iDataNasc" name="txtDataNasc" class="form-control date" required>
									<br/>
								</div>
								<div class="col-md">
									<label for="sGenero">Sexo</label>
									<select class="form-control" id="sGenero" name="txtGenero" required>
										<option value="2">Feminino</option>
										<option value="1">Masculino</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<label for="iCPF">CPF:</label>
									<input type="text" id="iCPF" name="txtCPF" class="form-control cpf" required>
									<br/>
								</div>
								<div class="col-md">
									<label for="iTelefone">Telefone:</label>
									<input type="text" id="i" name="iTelefone" class="form-control phone" required>
									<br/>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<label for="iEmail">E-mail:</label>
									<input type="email" id="iEmail" name="txtEmail" class="form-control" maxlength="100" required pattern="^([\w\-]+\.)*[\w\- ]+@([\w\- ]+\.)+([\w\-]{3})$" title="Preencha em um formato de EMAIL">
									<br/>
								</div>
								<div class="col-md">
									<label for="isenha">Senha:</label>
									<input type="password" class="form-control" id="isenha" name="isenha" required pattern="^[a-zA-Z0-9]{8,15}$" title="Letras e números, mínimo de 8 e máximo de 15 caracteres">
								</div>
								<div class="col-md">
									<label for="isenha2">Confirmação de Senha:</label>
									<input type="password" class="form-control" id="isenha2" name="isenha2"  required pattern="^[a-zA-Z0-9]{8,15}$">
								</div>
							</div>
							<div class="row pt-4 pl-3">
								<label for="genFav">Interesses</label>
								<div class="col-md">
									<div class="form-check form-check-inline">
                    <?php
                    $categoria = serviceListarCategoria();
                    $var = 1;
                    foreach ($categoria as $i) {
                    ?>
										<input class="form-check-input" type="checkbox" name="interesses[]" id="cb<?=$var?>" value="<?=$i['id']?>">
										<label class="form-check-label" for="cb<?=$var?>"><?=$i['categoria']?></label>
                  <?php $var++; } ?>
									</div>
								</div>
							</div>
                        </div>
                        <br/>

                        <div class="form-group"><h4 class="fontedezoito"><b>Endereço de cobrança</b></h4><br/>
                            <div class="row">
								<div class="col-md-4">
									<label for="iCEP">CEP:</label>
									<input type="text" id="iCEP" name="txtCEP" class="form-control cep" required>
								</div>
								<div class="col-md">
									<label for="iEndCobr">Endereço:</label>
									<input type="text" id="iEndCobr" name="txtEndCobr" class="form-control" required maxlength="255">
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<label for="iNum">Número:</label>
									<input type="text"  id="iNum" name="txtNum" class="form-control" required maxlength="10">
								</div>
								<div class="col-md">
									<label for="iComplemento">Complemento:</label>
									<input type="text"  id="iComplemento" name="txtComplemento" class="form-control" maxlength="15">
									<br/>
								</div>
								<div class="col-md">
									<label for="iBairro">Bairro:</label>
									<input type="text"  id="iBairro" name="txtBairro" class="form-control" required maxlength="50">
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<label for="iCidade">Cidade:</label>
									<input type="text"  id="iCidade" name="txtCidade" class="form-control" required maxlength="50">
								</div>
								<div class="col-md">
									<label for="sEstado">Estado</label><!-- PESSOAL DO PHP: tem que puxar esse select do banco de dados, só coloquei pra ficar mais fácil de vizualizar-->
									<select id="sEstado" name="txtEstado" class="form-control">
										<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AP">Amapá</option>
										<option value="AM">Amazonas</option>
										<option value="BA">Bahia</option>
										<option value="CE">Ceará</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Espírito Santo</option>
										<option value="GO">Goiás</option>
										<option value="MA">Maranhão</option>
										<option value="MT">Mato Grosso</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Pará</option>
										<option value="PB">Paraíba</option>
										<option value="PR">Paraná</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piauí</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RO">Rondônia</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SP">São Paulo</option>
										<option value="SE">Sergipe</option>
										<option value="TO">Tocantins</option>
									</select>
								</div>
							</div>
							<div class="row">
							<div class="col mb-4 mt-4">
                            		<button type="submit" class="btn COLORE1" name="btn-enviar" >Criar sua conta</button><!--value??-->
                        		</div>
							</div>
                        </div>

                    </form>
                </fieldset><!--********fim do formulário*************-->
                <!-- Adicionando JQuery -->
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"
           integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
           crossorigin="anonymous"></script>

   <!-- Adicionando Javascript -->
   <script type="text/javascript" >

       $(document).ready(function() {

           function limpa_formulário_cep() {
               // Limpa valores do formulário de cep.
               $("#iEndCobr").val("");
               $("#iBairro").val("");
               $("#iCidade").val("");
               $("#sEstado").val("");
           }


           $("#iCEP").blur(function() {

               //Nova variável "cep" somente com dígitos.
               var cep = $(this).val().replace(/\D/g, '');

               //Verifica se campo cep possui valor informado.
               if (cep != "") {

                   //Expressão regular para validar o CEP.
                   var validacep = /^[0-9]{8}$/;

                   //Valida o formato do CEP.
                   if(validacep.test(cep)) {

                       //Preenche os campos com "..." enquanto consulta webservice.
                       $("#iEndCobr").val("...");
                       $("#iBairro").val("...");
                       $("#iCidade").val("...");
                       $("#sEstado").val("...");

                       //Consulta o webservice viacep.com.br/
                       $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                           if (!("erro" in dados)) {
                               //Atualiza os campos com os valores da consulta.
                               $("#iEndCobr").val(dados.logradouro);
                               $("#iBairro").val(dados.bairro);
                               $("#iCidade").val(dados.localidade);
                               $("#sEstado").val(dados.uf);
                           }
                           else {
                               //CEP pesquisado não foi encontrado.
                               limpa_formulário_cep();
                               alert("CEP não encontrado.");
                           }
                       });
                   }
                   else {
                       //cep é inválido.
                       limpa_formulário_cep();
                       alert("Formato de CEP inválido.");
                   }
               }
               else {
                   //cep sem valor, limpa formulário.
                   limpa_formulário_cep();
               }
           });
       });

   </script>
<?php }); ?>
