<!-- Declaração do formulário -->
<form method="post" target="pagseguro"
action="https://pagseguro.uol.com.br/v2/checkout/payment.html">

        <!-- Campos obrigatórios -->
        <input name="receiverEmail" type="hidden" value="suporte@lojamodelo.com.br">
        <input name="currency" type="hidden" value="BRL">

        <!-- Itens do pagamento (ao menos um item é obrigatório) -->
        <?php
        $itensPedidos = serviceListarCarrinho($_SESSION['user_id']);
        $cont = 1;
        foreach ($itensPedidos as $i) {
        ?>
        <input name="itemId<?=$cont?>" type="hidden" value="<?=$i['id']?>">
        <input name="itemDescription<?=$cont?>" type="hidden" value="<?=$i['titulo']?>">
        <input name="itemAmount<?=$cont?>" type="hidden" value="<?=precoBanco(serviceStringToFloat($i['preco']))?>">
        <input name="itemQuantity<?=$cont?>" type="hidden" value="<?=$i['quantidade']?>">
        <input name="itemWeight<?=$cont?>" type="hidden" value="<?=intval($i['peso'])?>">

        <?php $cont++; } ?>

        <!-- Código de referência do pagamento no seu sistema (opcional) -->
        <input name="reference" type="hidden" value="REF1234">

        <!-- Informações de frete (opcionais) -->
        <?php
        $checkout = serviceListarEndereco($_SESSION['user_id'], 1);
        if (!is_array($checkout)){
        $checkout = serviceListarEndereco($_SESSION['user_id'], 4);
        }
        foreach ($checkout as $i) {
        ?>
        <input name="shippingType" type="hidden" value="1">
        <input name="shippingAddressPostalCode" type="hidden" value="<?=$i['cep']?>">
        <input name="shippingAddressStreet" type="hidden" value="<?=$i['endereco']?>">
        <input name="shippingAddressNumber" type="hidden" value="<?=$i['numero']?>">
        <input name="shippingAddressComplement" type="hidden" value="<?=$i['complemento']?>">
        <input name="shippingAddressDistrict" type="hidden" value="<?=$i['bairro']?>">
        <input name="shippingAddressCity" type="hidden" value="<?=$i['cidade']?>">
        <input name="shippingAddressState" type="hidden" value="<?=$i['estado']?>">
        <input name="shippingAddressCountry" type="hidden" value="BRA">
        <?php } ?>
        <!-- Dados do comprador (opcionais) -->
        <?php
        $usuario = serviceListarUsu(NULL, $_SESSION['user_id'], NULL);
        foreach ($usuario as $i) {
        ?>
        <input name="senderName" type="hidden" value="<?=$i['nome']." ".$i['sobrenome']?>">
        <input name="senderAreaCode" type="hidden" value="11">
        <input name="senderPhone" type="hidden" value="<?=$i['telefone']?>">
        <input name="senderEmail" type="hidden" value="<?=$i['email']?>">
        <?php } ?>
        <!-- submit do form (obrigatório) -->
        <input alt="Pague com PagSeguro" name="submit"  type="image"
src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"/>

</form>
