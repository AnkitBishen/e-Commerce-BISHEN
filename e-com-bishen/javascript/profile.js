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

// edit profile==========
function edVisi(){
    document.getElementById("ep_close").style.display="flex";
} 
const edClose =()=>{
    document.getElementById("ep_close").style.display="none";
} 
