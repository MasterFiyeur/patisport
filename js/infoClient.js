function verification_informations(){
    let ok=true;
    var formulaire=document.forms["infoClient_form"];

    let nom = document.getElementById("nom");
    let prenom = document.getElementById("prenom");
    let email = document.getElementById("mail");
    let adresseLivr = document.getElementById("adresseLivr");
    let adresse2Livr = document.getElementById("adresse2Livr");
    let paysLivr = document.getElementById("paysLivr");
    let villeLivr = document.getElementById("villeLivr");
    let codeLivr = document.getElementById("codeLivr");
    let adresseFact = document.getElementById("adresseFact");
    let adresse2Fact = document.getElementById("adresse2Fact");
    let paysFact = document.getElementById("paysFact");
    let villeFact = document.getElementById("villeFact");
    let codeFact = document.getElementById("codeFact");

   
    if(nom.value.trim() == ""){
        ok=false;
        nom.classList.add("wrong");
    }else{
        nom.classList.remove("wrong");
    }
    if(prenom.value.trim() == ""){
        ok=false;
        prenom.classList.add("wrong");
    }else{
        prenom.classList.remove("wrong");
    }
    let regex = /\S+@\S+\.\S+/;
    if(!regex.test(String(email.value).toLowerCase())){
        ok=false;
        email.classList.add("wrong");
    }else{
        email.classList.remove("wrong");
    }
    if(adresseLivr.value.trim() == ""){
        ok=false;
        adresseLivr.classList.add("wrong");
    }else{
        adresseLivr.classList.remove("wrong");
    }
    if(adresseLivr.value.trim() == ""){
        ok=false;
        adresseLivr.classList.add("wrong");
    }else{
        adresseLivr.classList.remove("wrong");
    }
    if(paysLivr.value.trim() == ""){
        ok=false;
        paysLivr.classList.add("wrong");
    }else{
        paysLivr.classList.remove("wrong");
    }
    if(villeLivr.value.trim() == ""){
        ok=false;
        villeLivr.classList.add("wrong");
    }else{
        villeLivr.classList.remove("wrong");
    }
    if(codeLivr.value.trim() == ""){
        ok=false;
        codeLivr.classList.add("wrong");
    }else{
        codeLivr.classList.remove("wrong");
    }
    if(!(adresseFact.value.trim() == "" 
        && adresse2Fact.value.trim() == ""
        && paysFact.value.trim() == ""
        && villeFact.value.trim() == ""
        && codeFact.value.trim() == "")){
            if(adresseFact.value.trim() == ""){
                ok=false;
                adresseFact.classList.add("wrong");
            }else{
                adresseFact.classList.remove("wrong");
            }
            if(adresseFact.value.trim() == ""){
                ok=false;
                adresseFact.classList.add("wrong");
            }else{
                adresseFact.classList.remove("wrong");
            }
            if(paysFact.value.trim() == ""){
                ok=false;
                paysFact.classList.add("wrong");
            }else{
                paysFact.classList.remove("wrong");
            }
            if(villeFact.value.trim() == ""){
                ok=false;
                villeFact.classList.add("wrong");
            }else{
                villeFact.classList.remove("wrong");
            }
            if(codeFact.value.trim() == ""){
                ok=false;
                codeFact.classList.add("wrong");
            }else{
                codeFact.classList.remove("wrong");
            } 
        }
    if(ok){
        if(adresseFact.value.trim() == "" 
        && adresse2Fact.value.trim() == ""
        && paysFact.value.trim() == ""
        && villeFact.value.trim() == ""
        && codeFact.value.trim() == ""){
            adresseFact.value = adresseLivr.value;
            adresse2Fact.value = adresse2Livr.value;
            paysFact.value = paysLivr.value;
            villeFact.value = villeLivr.value;
            codeFact.value = codeLivr.value;
        }
        formulaire.submit();
    }
}