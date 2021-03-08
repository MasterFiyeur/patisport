function stock_switch(){
    var src_image = document.getElementById("toggle_stock");
    if(src_image.getAttribute("src")=="./img/produits/show.svg"){

        src_image.setAttribute("src","./img/produits/hide.svg");
    }else{

        src_image.setAttribute("src","./img/produits/show.svg");
    }
}

function add_stock(forms_nombre){
    let nombre = parseInt(document.forms[forms_nombre].nombre_produit.value);
    let max_nombre = parseInt(document.getElementsByClassName("stock")[forms_nombre].textContent.substring(8));
    if(nombre<max_nombre){
        nombre +=1;
        document.forms[forms_nombre].nombre_produit.value = nombre;
        if(nombre==1){
            document.getElementsByClassName("moins_stock")[forms_nombre].style.pointerEvents = "auto";
        }
    }
    if(nombre==max_nombre){
        console.log("maximum");
        document.getElementsByClassName("plus_stock")[forms_nombre].style.pointerEvents = "none";
    }
}

function del_stock(forms_nombre){
    let nombre = parseInt(document.forms[forms_nombre].nombre_produit.value);
    let max_nombre = parseInt(document.getElementsByClassName("stock")[forms_nombre].textContent.substring(8));
    if(nombre>0){
        nombre -=1;
        document.forms[forms_nombre].nombre_produit.value = nombre;
        if(nombre == max_nombre-1){
            document.getElementsByClassName("plus_stock")[forms_nombre].style.pointerEvents = "auto";
        }
    }
    if(nombre==0){
        console.log("minimum");
        document.getElementsByClassName("moins_stock")[forms_nombre].style.pointerEvents = "none";
    }
}