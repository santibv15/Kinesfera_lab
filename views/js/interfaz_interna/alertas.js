
function confirmEliminar()
    {
    var respuesta_eliminar = confirm("¿Quieres eliminar a este usuario?");

    if (respuesta_eliminar == true)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function confirmAprendiz()
    {
    var respuesta_aprendiz = confirm("¿Quieres clasificar como aprediz a este usuario?");

    if (respuesta_aprendiz == true)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function confirmFormador()
    {
    var respuesta_formador = confirm("¿Quieres clasificar como formador a este usuario?");

    if (respuesta_formador == true)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function confirmSalir()
{
    var respuesta_formador = confirm("¿Quieres Salir?");

    if (respuesta_formador == true)
    {
        return true;
    }
    else
    {
        return false;
    }
}