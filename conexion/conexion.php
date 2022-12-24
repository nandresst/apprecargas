<?php
    function conectar(){
        $host="localhost";
        $user="root";
        $password="3597";
        $bd="bdrecargas";


        $con=mysqli_connect($host,$user,$password,$bd);

        if ($con->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
        }
        
        
        return $con;
    }
?>