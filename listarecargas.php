
<?php 
    include("conexion/conexion.php");
    $con=conectar();
    
    if(isset($_GET["id"]))
    {
        $PlayerID=$_GET["id"];

        //$sql="SELECT *  FROM tb_recarga_ns where PlayerID=$PlayerID order by RecargaID desc limit 20";        
        $sql="call sp_lista_recargas_cliente_ns('$PlayerID')";
    }
    else
    {
        //$sql="SELECT *  FROM tb_recarga_ns order by RecargaID desc limit 20";
        $sql="call sp_lista_recargas_general_ns()";
    }
    
    $result=mysqli_query($con,$sql);   
    session_start();  
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
                    <a class="nav-link text-light" href="listarecargas.php">Lista de Recargas</a>
                    </li>                
                </ul>
                </div>
                <p class="text-info" style="font-weight:700"><?php echo $_SESSION["Tipo"] .": " ?></p>
                <p class="text-info" style=""><?php echo " - ".$_SESSION["Apellidos"].", ".$_SESSION["Nombres"] ?></p>
                <p class="text-danger"><a style="text-decoration:none; cursor: pointer;" onclick="CerrarSesion()"> (Cerrar Sesi??n)</a></p>
            </div>
        </nav>

        <div class="container">
                
                <div class="card shadow-sm">
                    <div class="card-header">                      
                        <?php
                       if(isset($_GET["id"]))
                       {    
                            $con=conectar();
                            $PlayerID=$_GET["id"];

                            $sql="SELECT * FROM tb_cliente_ns where PlayerID=$PlayerID";                            
                            $resultc=mysqli_query($con,$sql);
                            $reg=mysqli_fetch_array($resultc);


                            
                           
                            $sql2="SELECT SUM(MontoVoucher) as saldo FROM tb_recarga_ns where PlayerID='$PlayerID'";
                            $result2=mysqli_query($con,$sql2);                            

                            $reg2=mysqli_fetch_array($result2);
                        ?>                     
                        
                            <div class="row">
                                
                                <div class="col-md-1" style="margin-top:12px">
                                    <a class="btn btn-sm btn-warning" href="clientes.php" > << </a>
                                </div>
                                <div class="col-md-9">                                    
                                    <span style="font-weight:700;"> <h4>Recargas del Cliente: </h4></span> 
                                    <h6> <span><?php echo $reg["Apellidos"]?></span>
                                        <span><?php echo $reg["Nombres"]?></span> 
                                    </h6>
                                    <span class="badge bg-info text-dark" style="font-size:1rem; margin-right:10px;"><?php echo "Saldo: ".$reg2["saldo"] ?> </span>
                                </div>
                                <div class="col-md-2"> 
                                    <a class="btn btn-sm btn-dark" href="recargar.php?id=<?php echo $reg['PlayerID'] ?>&idr=0&o=lc" >Recargar</a>                                                       
                                </div>
                            </div>
                        
                        
                        <?php
                       }
                       else{
                        ?>
                        <span style="font-weight:700">Ultimas Recargas</span>                        
                       <?php
                       }
                       ?>

                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead class="thead-light">
                                    <th>ID Recarga</th>
                                    <th>Cliente</th>
                                    <th>Dni</th>
                                    <th>Nro OP. Voucher</th>
                                    <th>C??digo Voucher</th>
                                    <th>Monto</th>
                                    <th>Fecha y Hora</th>
                                    <th>Observaci??n</th>
                                    <th></th>        
                            </thead>                    
                            <tbody>
                            <?php
                            while($fila=mysqli_fetch_array($result))
                            {
                            ?>   
                                <tr>
                                    <td><?php echo $fila["RecargaID"] ?> </td>
                                    <td><?php echo $fila["Apellidos"].", ".$fila["Nombres"] ?> </td>
                                    <td><?php echo $fila["Dni"] ?> </td>
                                    <td><?php echo $fila["NroOperacionVoucher"] ?> </td>
                                    <td><?php echo $fila["CodigoVoucher"] ?> </td>
                                    <td><?php echo $fila["MontoVoucher"] ?> </td>
                                    <td><?php echo $fila["FechaHoraVoucher"] ?> </td>
                                    <td><?php echo $fila["Observacion"] ?> </td>
                                    <?php
                                    if(isset($_GET["id"]))
                                    {
                                    ?>
                                        <td><a href="recargar.php?idr=<?php echo $fila["RecargaID"] ?>&o=lc">ver</a> </td>
                                    <?php
                                    }
                                    else{
                                    ?>
                                        <td><a href="recargar.php?idr=<?php echo $fila["RecargaID"] ?>&o=l">ver</a> </td>
                                    <?php
                                    }
                                    ?>
                                
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
        </div>
    
    
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="js/login.js"></script>
</html>