<?php

 function calculaFrete($cep, $cepOrigem,
  $peso,
  $valor){

// Um array de dados.

 $data['nCdEmpresa'] = '';
 $data['sDsSenha'] = '';
 $data['sCepOrigem'] = '22290040';
 $data['sCepDestino'] = $cep;
 $data['nVlPeso'] = $peso;
 $data['nCdFormato'] = '1';
 $data['nVlComprimento'] = '16';
 $data['nVlAltura'] = '5';
 $data['nVlLargura'] = '15';
 $data['nVlDiametro'] = '0';
 $data['sCdMaoPropria'] = 'n';
 $data['nVlValorDeclarado'] = $valor;
 $data['sCdAvisoRecebimento'] = 'n';
 $data['StrRetorno'] = 'xml';
 //Codigo de serviço.
 $data['nCdServico'] = '41106';

 # ###########################################
   # Código dos Principais Serviços dos Correios
   # 41106 PAC sem contrato
   # 40010 SEDEX sem contrato
   # 40045 SEDEX a Cobrar, sem contrato
   # 40215 SEDEX 10, sem contrato
   # ###########################################

 $data = http_build_query($data);

//Endereço do calculo.
 $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

// Inciando conexão.
 $curl = curl_init($url . '?' . $data);

 //Configurando o curl.
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//Gravando o resultado n variavel.
 $result = curl_exec($curl);

 // Convertendo o xml do "StrRetorno" em um objeto.
 $result = simplexml_load_string($result);

 //Percorrendo todos os serviços solicitados.
 foreach($result -> cServico as $row) {
 //Os dados de cada serviço estará aqui
 if($row -> Erro == 0) {
   $valor = $row -> Valor;
   $prazo = $row -> PrazoEntrega;
   $frete = array('valor' => $valor, 'prazo' => $prazo);
   return $frete;

 } else {
     $erro = $row -> MsgErro;
     return $erro;
 }

  }
  echo '<hr>';
}
