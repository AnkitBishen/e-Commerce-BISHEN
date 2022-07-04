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
//   js for toggle form 
var LoginForm = document.getElementById("LoginForm");
var RegForm = document.getElementById("RegForm");
var Indicator = document.getElementById("Indecator");

function register() {
    RegForm.style.transform="translateX(0px)";
    LoginForm.style.transform="translateX(0px)";
    Indecator.style.transform="translateX(60px)";
}
function login() {
    RegForm.style.transform="translateX(330px)";
    LoginForm.style.transform="translateX(330px)";
    Indecator.style.transform="translateX(-60px)";
}
// registratio validation
function regisValid(){
    var inpRname = document.myregis.inpRname.value;
    var inpRemail = document.myregis.inpRemail.value;
    var inpRpass = document.myregis.inpRpass.value;
    var attr = inpRemail.indexOf("@");
    var dot = inpRemail.indexOf(".");

    if(inpRname==null || inpRname=="" || inpRname==" "){
        document.getElementById("showRname").innerHTML="Name can't be blank";
        return false;
    }
    if(attr<1 || dot<at+2 || dot+2>=x.length){
        document.getElementById("showRemail").innerHTML="plz enter correct email address";
        return false;
    }
    if(inpRpass==null || inpRpass=="" || inpRpass==" "){
        document.getElementById("showRpass").innerHTML="Password can't be blank";
        return false;
    }
    return true;
}
function inpvalid(){
    var msg;
    if(document.myregis.inpRname.value!=""){
        msg="";
        document.getElementById("showRname").innerText=msg;
    }
    if(document.myregis.inpRemail.value!=""){
        msg="";
        document.getElementById("showRemail").innerText=msg;
    }
    if(document.myregis.inpRpass.value!=""){
        msg="";
        document.getElementById("showRpass").innerText=msg;
    }
}