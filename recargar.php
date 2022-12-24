
<?php

if(isset($_GET["id"]))
{
    include("conexion/conexion.php");
    $con = conectar();
    $PlayerID = $_GET["id"];
    $result=mysqli_query($con,"select * from tb_cliente_ns where PlayerID=$PlayerID");
    $reg=mysqli_fetch_array($result);

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

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="panel.php">Panel</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Clientes</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Movimientos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled">Voucher</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <br>
        <br>
            <div class="card">
                <div class="card-header">
                    <span style="font-weight:700;">Cliente:</span> 
                    <span><?php echo $reg["Apellidos"]?></span>
                    <span><?php echo $reg["Nombres"]?></span>
                    
                </div>
                <div class="card-body">
                     <span style="font-weight:700;">Datos de Recarga:</span> 
                        <form action="#">                           
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label class="form-label">Banco</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>[Seleccionar...]</option>
                                        <option value="1">BBVA</option>
                                        <option value="2">INTERBANK</option>
                                        <option value="3">SCOTIABANK</option>
                                        <option value="3">BCP</option>
                                        <option value="3">PICHINCHA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-3">
                                    <label class="form-label">codigo Voucher</label>
                                    <input type="text" class="form-control form-control-sm" id="txtcodigo" name="txtcodigo">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label">Nro Operación Voucher</label>
                                    <input type="text" class="form-control form-control-sm" id="txtbanco" name="txtbanco">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label">Fecha Hora</label>
                                    <input type="datetime-local" class="form-control form-control-sm" id="txtfechahora" name="txtfechahora" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label">Monto</label>
                                    <input type="numeric" class="form-control form-control-sm" id="txtmonto" name="txtmonto" value="" placeholder="0.00">
                                </div>
                            </div>
                            
                            <div class="">
                                <a onClick="probando();" class="btn btn-sm btn-dark" >Registrar Recarga</a>
                            </div>
                        </form>
                        
                </div>

            </div>
    </div>
    

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="recargar.js"></script>
</html>
<?php
}
?>