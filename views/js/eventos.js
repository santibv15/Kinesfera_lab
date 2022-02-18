"use strict"
const ul = document.querySelector("ul");

//Buena forma

function frames (){
    const animacion = ul.animate([
        //keyframes
        {transform: "TranslateY(0px)"},
        {transform: "TranslateY(-100px)"}
    ],{
        //options
        casing: "linear",
        iterations: 1,
        duration:200 //milisegundos
    });

    return animacion.finished;
}

function displace(){
    frames()
    .then((res)=>{
        console.log(res);
        ul.appendChild(document.querySelectorAll("ul > li")[0])
    })
}

setInterval(() =>{
    displace();
}, 1000);