let menuItems = document.getElementById("menuItems");
menuItems.style.maxHeight="0px";


menuItems.style.maxHeight=="0px";
function menutoggle() {
    if(menuItems.style.maxHeight=="0px"){
        menuItems.style.maxHeight="200px";
    }else{
        menuItems.style.maxHeight="0px";
    }
   
}

// js for product gallery

let productImg = document.getElementById("productImg");
let SmallImg = document.getElementsByClassName("small-img");

SmallImg[0].onclick = function(){
    productImg.src = SmallImg[0].src;
}
SmallImg[1].onclick = function(){
    productImg.src = SmallImg[1].src;
}

SmallImg[2].onclick = function(){
    productImg.src = SmallImg[2].src;
}
SmallImg[3].onclick = function(){
    productImg.src = SmallImg[3].src;
}