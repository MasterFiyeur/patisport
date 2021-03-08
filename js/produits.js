function stock_switch(e){
    console.log(this);
    var src_image = document.getElementById("toggle_stock");
    if(src_image.getAttribute("src")=="./img/produits/show.svg"){

        src_image.setAttribute("src","./img/produits/hide.svg");
    }else{

        src_image.setAttribute("src","./img/produits/show.svg");
    }
}