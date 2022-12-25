    <?php
    include("../conexion/conexion.php");
    $con = conectar();
    
	$CodigoVoucher = $_POST["txtcodigo"];
	$BancoVoucher = $_POST["txtbanco"];
	$NroOperacionVoucher = $_POST["txtnroperacion"];
	$FechaHoraVoucher = $_POST["txtfechahora"];
	$MontoVoucher = $_POST["txtmonto"];
	$OperadorID = 1;
    $FechaHoraRegistro = (new \DateTime())->format('Y-m-d H:i:s');
    $Observacion = $_POST["txtobservacion"];
    $Medio = $_POST["txtmedio"];
    $MedioInfo = $_POST["txtmedioinfo"];

    $PlayerID = $_POST["txtplayerid"];


    //echo $FechaHoraRegistro;
    
    $sql="INSERT INTO tb_recarga_ns(CodigoVoucher,BancoVoucher,NroOperacionVoucher,FechaHoraVoucher,MontoVoucher,OperadorID,PlayerID,FechaHoraRegistro,Observacion,Medio,MedioInfo)  VALUES('$CodigoVoucher','$BancoVoucher','$NroOperacionVoucher','$FechaHoraVoucher','$MontoVoucher',$OperadorID,$PlayerID,'$FechaHoraRegistro','$Observacion','$Medio','$MedioInfo')";

    $result = mysqli_query($con,$sql);
    
    echo $sql;
    echo $result;
    header("Location: ../listarecargas.php?id=$PlayerID");


    ?>