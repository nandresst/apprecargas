    <?php
    session_start();
    
    if($_SESSION['OperadorID']>0)
    {

            include("../conexion/conexion.php");
            $con = conectar();

            
            $RecargaID = $_POST["txtrecargaid"];
            $CodigoVoucher = $_POST["txtcodigo"];
            $BancoVoucher = $_POST["txtbanco"];
            $NroOperacionVoucher = $_POST["txtnroperacion"];
            $FechaHoraVoucher = $_POST["txtfechahora"];
            $MontoVoucher = $_POST["txtmonto"];
            $OperadorID = $_SESSION['OperadorID'];
            $FechaHoraRegistro = (new \DateTime())->format('Y-m-d H:i:s');
            $Observacion = $_POST["txtobservacion"];
            $Medio = $_POST["txtmedio"];
            $MedioInfo = $_POST["txtmedioinfo"];

            $PlayerID = $_POST["txtplayerid"];    


            //echo $FechaHoraRegistro;

            if($RecargaID==0)
            {
                $sql="INSERT INTO tb_recarga_ns(CodigoVoucher,BancoVoucher,NroOperacionVoucher,FechaHoraVoucher,MontoVoucher,OperadorID,PlayerID,FechaHoraRegistro,Observacion,Medio,MedioInfo)  VALUES('$CodigoVoucher','$BancoVoucher','$NroOperacionVoucher','$FechaHoraVoucher','$MontoVoucher',$OperadorID,$PlayerID,'$FechaHoraRegistro','$Observacion','$Medio','$MedioInfo')";
            }
            else
            {
                $sql="UPDATE tb_recarga_ns SET CodigoVoucher='$CodigoVoucher', BancoVoucher='$BancoVoucher', NroOperacionVoucher='$NroOperacionVoucher', 
                        FechaHoraVoucher='$FechaHoraVoucher', MontoVoucher='$MontoVoucher', OperadorID='$OperadorID', Observacion='$Observacion',
                        Medio='$Medio', MedioInfo='$MedioInfo'
                    WHERE RecargaID='$RecargaID'";
            }
            
            

            $result = mysqli_query($con,$sql);
            
            //echo $sql;
            //echo $result;
            header("Location: ../listarecargas.php?id=$PlayerID");

    }
    else{
        header("Location: ../login.html");
    }

    ?>