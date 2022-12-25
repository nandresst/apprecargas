validarsaldorecarga=()=>{
    
    //validacion de datos 
    const monto = document.getElementById("txtmonto").value.length;
    const banco = document.getElementById("txtbanco").value;
    let sum=0;

    if(monto<=1)
    {
        alert("Por favor debe indicar el monto a recargar");
    }
    else{
        //document.frmrecarga.submit();
        sum = sum+1;
    }
    if(banco==0)
    {
        alert("Por favor debe indicar el Banco");
    }
    else{
        //document.frmrecarga.submit();
        sum = sum+1;
    }    

   if(sum==2)
   {

        if(document.getElementById("txtrecargaid").value!=0 && document.getElementById("txtoperadortipo").value=="Operador")
        {
            alert("Solo el Supervisor puede realizar la actualizacion.")
        }
        else{
            document.frmrecarga.submit();
        }           
   }     
}

