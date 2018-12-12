function pegarValor(pToken, pID){
  $.post( "php/CRUDS/sessaoFacebook.php", { token: pToken, id: pID })
    .done(function( data ) {
    alert( "Data Loaded: " + data );
  });
}
