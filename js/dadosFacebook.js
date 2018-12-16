//function pegarValor(pToken, pID){
//  $( "php/CRUDS/sessaoFacebook.php", { token: pToken, id: pID })
//    .done(function( data ) {
//    alert( "Data Loaded: " + data );
//  });
//}
function pegarValor(pToken, pID){
  // Pega o valor do token do facebook e joga pro php
  token = JSON.stringify(pToken);
  pID = JSON.stringify(pID);
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "php/CRUDS/sessaoFacebook.php?x=" + token, true);
  xmlhttp.send();
}
