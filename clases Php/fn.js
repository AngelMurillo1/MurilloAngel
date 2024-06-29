function usuario(){
    let validar = document.getElementById("valido").checked;
    

    if (!validar) {
        alert("Debe aceptar terminos y condiciones")
        return false
    }
    else{
        document.getElementById("formulario").submit();
    }
}