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
    var myModal = new bootstrap.Modal(document.getElementById('patienter'),{backdrop:'static'});
    myModal.toggle();
    const params = new URLSearchParams();
    params.append('user', user);
    params.append('mdp', pass);
    params.append('ref', document.getElementById("reference").value);
    params.append('label', document.getElementById("Mlabel").value);
    params.append('prix', document.getElementById("Mprix").value);
    params.append('stock', document.getElementById("Mstock").value);
    params.append('img', document.getElementById("Mimage").value);
    params.append('categorie', document.getElementById("Mcategorie").value);
    axios({
        method: 'post',
        url: './api/modifyProduit.php',
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

function addProduit(){
    var myModal = new bootstrap.Modal(document.getElementById('patienter'),{backdrop:'static'});
    myModal.toggle();
    //if(document.getElementById("categorie").value)
    const params = new URLSearchParams();
    params.append('user', user);
    params.append('mdp', pass);
    params.append('ref', document.getElementById("refProduit").value);
    params.append('label', document.getElementById("label").value);
    params.append('prix', document.getElementById("prix").value);
    params.append('stock', document.getElementById("stock").value);
    params.append('img', document.getElementById("image").value);
    if(document.getElementById("categorieCheck").checked){
        params.append('categorie', document.getElementById("categorieNew").value);
        params.append('categorie2', document.getElementById("categorieNew2").value);
    }else{
        params.append('categorie', document.getElementById("categorie").value);
    }
    axios({
        method: 'post',
        url: './api/addProduit.php',
        data: params
    })
      .then(function (response){
        console.log(response);
        if(response.data=="ok"){
            location.replace("admin.php?success=true");
        }else{
            //location.replace("admin.php?success=false");
        }
      })
      .catch(function (error) {
        console.log(error);
        location.replace("admin.php?success=false");
      });
}

function toggleCatNewOld(){
    let ancienne = document.getElementById("newCat");
    let ancienne2 = document.getElementById("newCat2");
    let nouvelle = document.getElementById("oldCat");
    ancienne.classList.toggle("display-none");
    ancienne2.classList.toggle("display-none");
    nouvelle.classList.toggle("display-none");
}