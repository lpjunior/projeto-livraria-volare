//function pegarValor(pToken, pID){
//  $( "php/CRUDS/sessaoFacebook.php", { token: pToken, id: pID })
//    .done(function( data ) {
//    alert( "Data Loaded: " + data );
//  });
//}
function pegarValor(pToken){
  // Pega o valor do token do facebook e joga pro php
  token = JSON.stringify(pToken);
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "php/CRUDS/sessaoFacebook.php?x=" + token, true);
  xmlhttp.send();
}
