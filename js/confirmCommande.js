function verification_informations() {
    let informations = JSON.parse(document.getElementById("datas").value);
    $.post( "api/updateStock.php", {informations})
    .done(function(data){
        if(data="ok"){
            document.getElementById("write_message").innerHTML = "Votre commande a été prise en compte.</br> Les stocks ont été ajustés.";
        }else{
            document.getElementById("write_message").innerHTML = "Un problème a été rencontré durant le processus d'ajustement des stocks.</br> Veuillez réessayer ultérieurement.";
        }
    })
    .fail(function() {
        document.getElementById("write_message").innerHTML = "Un problème a été rencontré durant le processus d'ajustement des stocks.</br> Veuillez réessayer ultérieurement.";
    })
    .always(function() {
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'),{backdrop:'static'});
        myModal.show();
    });
}