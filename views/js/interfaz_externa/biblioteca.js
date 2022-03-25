var caja1 = document.getElementById(caja1), 
caja1 = document.getElementById(caja1),
contador=0;

function cambio()

{ if(contador==0){
    caja1.classList.add(abre);
    contador=1;
}
else{
    contador=0;
}
}

 caja1.addEventListener('click',cambio,true)