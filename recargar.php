
<?php

if(isset($_GET["id"]))
{   
    include("conexion/conexion.php");    
    $con = conectar();
    $PlayerID = $_GET["id"];
    $result=mysqli_query($con,"select * from tb_cliente_ns where PlayerID=$PlayerID");
    $reg=mysqli_fetch_array($result);
    
    session_start(); 

    $RecargaID = $_GET["idr"];
    if($RecargaID==0)
    {
        $recarga = array(
            "RecargaID"=>"0",
            "CodigoVoucher"=>"",
            "BancoVoucher"=>"",
            "NroOperacionVoucher"=>"",
            "FechaHoraVoucher"=>"",
            "MontoVoucher"=>"",
            "OperadorID"=>"",
            "PlayerID"=>"",
            "FechaHoraRegistro"=>"",
            "Observacion"=>"",
            "Medio"=>"0",
            "MedioInfo"=>""
        );
    }
    else{
        $sqlr ="SELECT * FROM tb_recarga_ns WHERE RecargaID=$RecargaID";
        $resultr = mysqli_query($con,$sqlr);
        $regi=mysqli_fetch_array($resultr);

        $recarga = array(
            "RecargaID"=>$regi["RecargaID"],
            "CodigoVoucher"=>$regi["CodigoVoucher"],
            "BancoVoucher"=>$regi["BancoVoucher"],
            "NroOperacionVoucher"=>$regi["NroOperacionVoucher"],
            "FechaHoraVoucher"=>$regi["FechaHoraVoucher"],
            "MontoVoucher"=>$regi["MontoVoucher"],
            "OperadorID"=>$regi["OperadorID"],
            "PlayerID"=>$regi["PlayerID"],
            "FechaHoraRegistro"=>$regi["FechaHoraRegistro"],
            "Observacion"=>$regi["Observacion"],
            "Medio"=>$regi["Medio"],
            "MedioInfo"=>$regi["MedioInfo"]
        );
        
    }

 

    if(isset($_GET["o"]))
    {
        $origen = $_GET["o"];
        
        if($origen=='c')
        { 
            $volver = 'href="clientes.php"'; 
        } 
        else 
        { 
            $volver = 'href="listarecargas.php?id='.$PlayerID.'"'; 
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>    
</head>
<body>  

        <nav class="navbar navbar-expand-lg bg-dark mb-4">
            <div class="container-fluid">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">                
                <ul class="navbar-nav" style="font-weight:700">                
                    <li class="nav-item">
                    <a class="nav-link text-light" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-light" href="listarecargas.php">Movimientos</a>
                    </li>                
                </ul>
                </div>
                <p class="text-info" style="font-weight:700"><?php echo $_SESSION["Tipo"] .": " ?></p>
                <p class="text-info" style=""><?php echo " - ".$_SESSION["Apellidos"].", ".$_SESSION["Nombres"] ?></p>
            </div>
        </nav>

    <div class="container">
        <br>
        <br>
            <div class="card shadow-sm">
                <div class="card-header">
                    <a class="btn btn-sm btn-warning" <?php echo $volver ?> > << </a>    
                    <span style="font-weight:700;">Cliente:</span> 
                    <span><?php echo $reg["Apellidos"]?></span>
                    <span><?php echo $reg["Nombres"]?></span>
                    
                </div>
                <div class="card-body">
                    
                        <form action="actions/agregar_saldo.php" method="post" name="frmrecarga">   
                        <br>                        
                        <span style="font-weight:700;">Datos de Recarga:</span> 
                        <br> 
                        <br> 
                            <div class="row mb-3">
                                <div class="form-group  col-md-3">
                                    <label class="form-label">Banco</label>
                                    <select class="form-select form-select-sm" aria-label="Default select example" id="txtbanco" name="txtbanco">
                                        <option value="0"  <?php if($recarga["BancoVoucher"]==0){ echo "selected"; } ?> >[Seleccionar...]</option>
                                        <option value="1"  <?php if($recarga["BancoVoucher"]==1){ echo "selected"; } ?> >BBVA</option>
                                        <option value="2"  <?php if($recarga["BancoVoucher"]==2){ echo "selected"; } ?> >INTERBANK</option>
                                        <option value="3"  <?php if($recarga["BancoVoucher"]==3){ echo "selected"; } ?> >SCOTIABANK</option>
                                        <option value="4"  <?php if($recarga["BancoVoucher"]==4){ echo "selected"; } ?> >BCP</option>
                                        <option value="5"  <?php if($recarga["BancoVoucher"]==5){ echo "selected"; } ?> >PICHINCHA</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label">Nro Operación</label>
                                    <input type="text" class="form-control form-control-sm" value="<?php echo $recarga["NroOperacionVoucher"] ?>" id="txtnroperacion" name="txtnroperacion">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label">codigo Voucher</label>
                                    <input type="text" class="form-control form-control-sm" id="txtcodigo" name="txtcodigo" value="<?php echo $recarga["CodigoVoucher"] ?>">
                                </div> 
                                <div class="form-group col-md-3">
                                    <label class="form-label">Fecha Hora</label>
                                    <input type="datetime-local" class="form-control form-control-sm" id="txtfechahora" name="txtfechahora" value="<?php echo $recarga["FechaHoraVoucher"] ?>">
                                </div> 
                            </div>
                            <div class="row mb-3">                                                            
                                
                                <div class="form-group col-md-3">
                                    <label class="form-label">Monto</label>
                                    <input type="numeric" class="form-control form-control-sm" id="txtmonto" name="txtmonto" placeholder="0.00" value="<?php echo $recarga["MontoVoucher"] ?>">
                                </div>
                                <div class="form-group col-md-9">
                                    <label class="form-label">Observación</label>
                                    <input type="text" class="form-control form-control-sm" id="txtobservacion" name="txtobservacion" value="<?php echo $recarga["Observacion"] ?>">
                                </div> 
                            </div> 
                            <br>
                            <span  style="font-weight:700;">Canal de Comunicación:</span>
                            <br><br>
                            
                            <div class="row mb-4">
                                <div class="form-group col-md-3">
                                    <label for="" class="form-label">Medio</label>
                                    <select class="form-select form-select-sm" aria-label="Default select example" id="txtmedio" name="txtmedio">
                                        <option value="0" <?php if($recarga["Medio"]==0){ echo "selected"; } ?> >[Seleccionar...]</option>
                                        <option value="1" <?php if($recarga["Medio"]==1){ echo "selected"; } ?> >WhatsApp</option>
                                        <option value="2" <?php if($recarga["Medio"]==2){ echo "selected"; } ?> >Telegram</option>
                                        <option value="3" <?php if($recarga["Medio"]==3){ echo "selected"; } ?> >Correo Electronico</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="form-label">Informacion del Medio utilizado</label>
                                    <input type="text" name="txtmedioinfo" id="txtmedioinfo" class="form-control form-control-sm" placeholder="#99999999 ó  correo@dominio.com"
                                    value="<?php echo $recarga["MedioInfo"] ?>" >
                                </div>
                            </div>
                            
                            <div class="">
                                <a onClick="validarsaldorecarga();" class="btn btn-sm btn-dark" >Registrar Recarga</a>
                            </div>
                            <input type="text" hidden value="<?php echo $PlayerID ?>" name="txtplayerid" id="txtplayerid">
                        </form>
                        
                </div>

            </div>
    </div>
    

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="js/recargar.js"></script>
</html>
<?php
}
else{
    echo "no hemos recibido parametro, sin Cliente Seleccionado";
    header("Location: clientes.php");
}
?>