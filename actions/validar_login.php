<?php
include("../conexion/conexion.php");

$con=conectar();

$usuario=$_POST["txtusuario"];
$contrasenia=$_POST["txtcontrasenia"];

$sql="call sp_autenticar_login('$usuario','$contrasenia')";

$result = mysqli_query($con,$sql);

$reg=mysqli_fetch_array($result);

//echo $reg["usuario"]." -- ". $reg["contrasenia"];

$OperadorID = $reg["OperadorID"];

if($OperadorID==0)
{
    ?>
    <script>
        alert("Mensaje: <?php echo $reg["Mensaje"] ?> ");
    </script>
    <?php
}
else{
    session_start();
    $_SESSION['OperadorID']=$reg["OperadorID"];
    $_SESSION['Nombres']=$reg["Nombres"];
    $_SESSION['Apellidos']=$reg["Apellidos"];
    $_SESSION['Tipo']=$reg["Tipo"];
    $_SESSION['Mensaje']=$reg["Mensaje"];


    header("Location: ../clientes.php");

}



?>
