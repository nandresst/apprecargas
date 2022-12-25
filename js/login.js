ValidarLogin=()=>{
    var usuario = document.getElementById("txtusuario").value;
    var contrasenia = document.getElementById("txtcontrasenia").value;
    
    var c=0;

    if(usuario.length==0)
    {
        alert("Falta Usuario");
    }
    else{
        c=c+1;
        if(contrasenia.length==0)
            {
                alert("Falta Contrasenia");
            }
            else{
                c=c+1;
            }
    }
   

    if(c==2)
    {
        document.frmlogin.submit();
    }
    
}

CerrarSesion=()=>{

    window.location='actions/salir.php';

}