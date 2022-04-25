const nodeMysql = require("node-mysql");

//lista de regex para la validacion de los datos de entrada
const fullname = /^(?:[A-ZÁÉÍÓÚa-zñáéíóú]{2,15} ?\b){3,4}$/;
const emailreg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
const pass= /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$/;
const phone = /(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/;
const idnum = /((([X-Z])|([LM])){1}([-]?)((\d){7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]))/;
const validaddress = /[A-ZÁÉÍÓÚa-zñáéíóú0-9'\.\-\s\,]/;
const validzip = /^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/;

//onclick="validateInput()"
let name=document.getElementById("Name");
let userName=document.getElementById("Username");
let email=document.getElementById("Email");
let phonenum=document.getElementById("Phone");
let pwd=document.getElementById("Pass");
let conPwd=document.getElementById("Pass2");
let form=document.querySelector("form");
let identification=document.getElementById("IDnum");
let addressinput=document.getElementById("Address");
let zipcode=document.getElementById("Zipcode");

function validateInput(){
    if(name.value.trim()===""){
        onError(name,"nombre y appelidos esta vacio");
    }else{
        if(!fullname.test(name.value.trim())) {
            onError(name, "nombre y appelidos no valido (3 palabras)");
        } else {
            onSuccess(name);
        }
    }

    if(identification.value.trim()===""){
        onError(identification,"campo DNI no puede estar vacio");
    }else{
        if(!idnum.test(identification.value.trim())) {
            onError(identification, "numero de identidad no valido");
        } else {
            onSuccess(identification);
        }
    }

    if(addressinput.value.trim()===""){
        onError(addressinput,"la direccion no puede estar vacia");
    }else{
        if(!validaddress.test(addressinput.value.trim())) {
            onError(addressinput, "la direccion no es valida");
        } else {
            onSuccess(addressinput);
        }
    }

    if(zipcode.value.trim()===""){
        onError(zipcode,"el campo de codigo postal esta vacio");
    }else{
        if(!validzip.test(zipcode.value.trim())) {
            onError(zipcode, "el codigo postal no es valido");
        } else {
            onSuccess(zipcode);
        }
    }

    if(phonenum.value.trim()===""){
        onError(phonenum,"numero de telefono esta vacio");
    }else{
        if(!phone.test(phonenum.value.trim())) {
            onError(phonenum, "numero de telefono no valido");
        } else {
            onSuccess(phonenum);
        }
    }

    if(email.value.trim()===""){
        onError(email,"correo esta vacio");
    }else{
        if(!emailreg.test(email.value.trim())){
            onError(email,"el correo introducido no es valido");
        }else{
            onSuccess(email);
        }
    }

    if(pwd.value.trim()===""){
        onError(pwd,"la contrasena esta vacia");
    }else{
        if(!pass.test(pwd.value.trim())){
            onError(pwd,"contrasena no valida");
        }else{
            onSuccess(pwd);
        }
    }
    if(conPwd.value.trim()===""){
        onError(conPwd,"debes introducir una contrasena");
    }else{
        if(pwd.value.trim()!==conPwd.value.trim()){
            onError(conPwd,"la contrasena no coincide");
        }
        else
            onSuccess(conPwd);
    }
}

/*document.querySelector("button")
    .addEventListener("click",(event)=>{
        event.preventDefault();

        validateInput();
    });*/
document.querySelectorAll("input").forEach(item => {
    item.addEventListener('change', event => {
        event.preventDefault();

        validateInput();
    });
});

function onSuccess(input){
    let parent=input.parentElement;
    let messageEle=parent.querySelector("small");
    messageEle.style.visibility="hidden";
    parent.classList.remove("error");
    parent.classList.add("success");
}
function onError(input,message){
    let parent=input.parentElement;
    let messageEle=parent.querySelector("small");
    messageEle.style.visibility="visible";
    messageEle.innerText=message;
    parent.classList.add("error");
    parent.classList.remove("success");

}

function registro(){
    MySQL.Async.insert('INSERT INTO account (id, iban, name, balance) VALUES (1,1,1,1)');
}