var user;
var pass;

function init(pseudo,mdp){
    user = pseudo;
    pass = mdp;
}

function changeDel(){
    let optionInput = document.getElementById("refProduit");
    let produitText = optionInput.options[optionInput.selectedIndex].text;
    document.getElementById("delModalBody").innerText = "Etes-vous sûr de supprimer le produit : "+produitText+" ?";
}

function changeMod(){
    document.getElementById("refValueModify").value = document.getElementById("refProduit").value;
    document.getElementById("formAction").submit();
}

function deleteProduit(){
    var myModal = new bootstrap.Modal(document.getElementById('patienter'),{backdrop:'static'});
    myModal.toggle();
    const params = new URLSearchParams();
    params.append('user', user);
    params.append('mdp', pass);
    params.append('ref', document.getElementById("refProduit").value);
    axios({
        method: 'post',
        url: './api/deleteProduit.php',
        data: params
    })
      .then(function (response){
        console.log(response);
        if(response.data=="ok"){
            location.replace("admin.php?success=true");
        }else{
            location.replace("admin.php?success=false");
        }
      })
      .catch(function (error) {
        console.log(error);
        location.replace("admin.php?success=false");
      });
}

function modifyProduit(){
    console.log("modified");
    var myModal = new bootstrap.Modal(document.getElementById('patienter'),{backdrop:'static'});
    myModal.toggle();
    location.replace("admin.php?success=true");
}

function toggleCatNewOld(){
    let ancienne = document.getElementById("newCat");
    let nouvelle = document.getElementById("oldCat");
    ancienne.classList.toggle("display-none");
    nouvelle.classList.toggle("display-none");
}