
<?php 
    include("conexion/conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM tb_cliente_ns";
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
            <p class="text-danger"><a style="text-decoration:none; cursor: pointer;" onclick="CerrarSesion()"> (Cerrar Sesión)</a></p>
        </div>
        </nav>

        <div class="container">

                <div class="card shadow-sm">
                    <div class="card-header">
                        
                            <span style="font-weight:700;"><h4>Clientes</h4></span>        
                            <h6>Registrados</h6>
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                        <thead class="thead-light">
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th></th>
                                <th></th>        
                        </thead>                    
                        <tbody>
                        <?php
                        while($fila=mysqli_fetch_array($result))
                        {
                        ?>   
                            <tr>
                                <td><?php echo $fila["Nombres"] ?> </td>
                                <td><?php echo $fila["Apellidos"] ?> </td>
                                <td><?php echo $fila["Dni"] ?> </td>
                                <td><a href="recargar.php?id=<?php echo $fila['PlayerID'] ?>&idr=0&o=c" >Recargar</a></td>
                                <td><a href="listarecargas.php?id=<?php echo $fila['PlayerID'] ?>" >Movimientos</a></td>

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