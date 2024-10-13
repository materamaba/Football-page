function czas(){
    document.body.style.transition = "1s";
}



function Jasne() {
    document.body.style.backgroundColor = "white";
    document.body.style.color = "black";
    
    bordery = document.querySelectorAll('.live, .liga, .kluby, table, td, th');
    console.log(bordery)
    for(i = 0; i<bordery.length; i++){
        bordery[i].style.borderColor = "black"
        bordery[i].style.borderWidth = "1px" ;
        bordery[i].style.borderStyle = "solid" ;
    }
    
    var a = document.querySelectorAll('a');
    for (var i = 2; i < a.length; i++) {
        a[i].style.color = "black";
    }
    hr = document.querySelectorAll('hr');
    for (i = 0; i < hr.length; i++) {
        hr[i].color = "black";; 
    }
    document.getElementById('guzik').innerHTML = '<button type="button" style="color:white" class="btn btn-dark" onclick="czas(); Ciemne();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16"><path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5z"></path></svg></button>';

    localStorage.setItem("styl", "jasny");
}

function Ciemne() {

    document.body.style.backgroundColor = "#242424";
    document.body.style.color = "white";

    bordery = document.querySelectorAll('.live, .liga, .kluby, table, td, th');
    for(i = 0; i<bordery.length; i++){
        bordery[i].style.borderColor = "white"
        bordery[i].style.borderWidth = "1px" ;
        bordery[i].style.borderStyle = "solid" ;
    }
    

    a = document.querySelectorAll('a');
    for (i = 2; i < a.length; i++) {
        a[i].style.color = "white";
    }

    hr = document.querySelectorAll('hr');
    for (i = 0; i < hr.length; i++) {
        hr[i].color = "white"; 
    }
    document.getElementById('guzik').innerHTML = '<button type="button" style="color:black" class="btn btn-light" onclick="czas(); Jasne();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16"><path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5z"></path></svg></button>';
    localStorage.setItem("styl", "ciemny");
}

if (localStorage.getItem("styl") == "jasny") {
    Jasne();

} else {
    Ciemne();
}

