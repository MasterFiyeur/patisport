function stock_switch(){
    var src_image = document.getElementById("toggle_stock");
    var stocks = document.getElementsByClassName("stock");
    if(src_image.getAttribute("src")=="./img/produits/show.svg"){
        src_image.setAttribute("src","./img/produits/hide.svg");
    }else{
        src_image.setAttribute("src","./img/produits/show.svg");
    }
    for (let index = 0; index < stocks.length; index++) {
        let element = stocks[index];
        element.classList.toggle("hide_stock");
    }
}

function add_stock(forms_nombre){
    let nombre = parseInt(document.forms[forms_nombre].nombre_produit.value);
    let max_nombre = parseInt(document.getElementsByClassName("stock")[forms_nombre-1].textContent.substring(8));
    if(nombre<max_nombre){
        nombre +=1;
        document.forms[forms_nombre].nombre_produit.value = nombre;
    }
}

function del_stock(forms_nombre){
    let nombre = parseInt(document.forms[forms_nombre].nombre_produit.value);
    let max_nombre = parseInt(document.getElementsByClassName("stock")[forms_nombre-1].textContent.substring(8));
    if(nombre>0){
        nombre -=1;
        document.forms[forms_nombre].nombre_produit.value = nombre;
    }
}