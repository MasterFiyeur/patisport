function verification_contact(){
    let ok=true;
    var formulaire=document.forms["contact_form"];

    let nom = document.getElementById("nom");
    let prenom = document.getElementById("prenom");
    let email = document.getElementById("mail");
    let date_de_naissance = document.getElementById("ddn");
    let metier = document.getElementById("metier");
    let sujet = document.getElementById("sujet");
    let contenu = document.getElementById("contenu");

    let listeMetier = [
        "agriculture",
        "agroalimentaire",
        "animaux",
        "architecture",
        "artisanat",
        "banque",
        "batiment",
        "biologie",
        "commerce",
        "communication",
        "culture",
        "defense",
        "droit",
        "edition",
        "informatique",
        "enseignement",
        "environnement",
        "gestion",
        "hotellerie",
        "humanitaire",
        "industrie",
        "lettres",
        "mecanique",
        "numerique",
        "sante",
        "sciences",
        "secretariat",
        "social",
        "soins",
        "sport",
        "transport",
        "autre"
    ];

    if(nom.textContent.replace(/\s/g, "") == ""){
        ok=false;
        nom.classList.add("wrong");
    }else{
        nom.classList.remove("wrong");
    }
    if(prenom.textContent.replace(/\s/g, "") == ""){
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
    let date = new Date(date_de_naissance.value);
    if(!(date>=new Date("01/01/1900")) || !(date < new Date())){
        ok=false;
        date_de_naissance.classList.add("wrong");
    }else{
        date_de_naissance.classList.remove("wrong");
    }
    if(!listeMetier.includes(metier.value)){
        ok=false;
        metier.classList.add("wrong");
    }else{
        metier.classList.remove("wrong");
    }
    if(sujet.value.trim()==""){
        ok=false;
        sujet.classList.add("wrong");
    }else{
        sujet.classList.remove("wrong");
    }
    if(contenu.value.trim()==""){
        ok=false;
        contenu.classList.add("wrong");
    }else{
        contenu.classList.remove("wrong");
    }
    if(ok){
        formulaire.submit();
    }
}