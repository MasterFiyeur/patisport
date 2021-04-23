function verification_informations() {
    let informations = JSON.parse(document.getElementById("datas").value);
    console.log(informations);
    $.post( "api/updateStock.php", {informations})
    .done(function(data){
        if(data="ok"){
            //montrer le modale qui redirige quand on appuie sur ok
        }
    alert( "Data Loaded: " + data );
  });
}