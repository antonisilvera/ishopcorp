<?php

    require_once "../controlador/VentaControlador.php";

    if(isset($_POST)){
        $iduser = $_POST['iduser'];
        $direccion = $_POST['direccion'];
        $envio = $_POST['envio'];
        $total = $_POST['total'];


        //echo $iduser." - ".$envio." - ".$subtotal;

        $estado = VentaControlador::addVenta($iduser, $total, $envio, $direccion);


        if($estado){
            //La compra fue correcta
            

            header("location:/../ishopcorp/vista/vsuccess.php");
        }else{
            //Salio un error
            header("location:/../ishopcorp/vista/carrito.php");
        }

    }
?>