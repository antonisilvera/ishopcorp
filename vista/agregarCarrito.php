<?php
    require_once "../controlador/CarritoControlador.php";

    if(isset($_POST['idcarrito'])){
        $cant = $_POST['cantidad'];
        $idprodu = $_POST['idproducto'];
        $iduser = $_POST['iduser'];
        $idcarrito = $_POST['idcarrito'];
        if($cant == 0){
            //eliminar un item del carrito
            $estado = CarritoControlador::deleteCarrito($idcarrito, $iduser);
        }else{
            //actualiza la cantidad del carrito
            $estado = CarritoControlador::updateCarrito($iduser, $idprodu, $cant);
        } 
        
        //echo  "Hay carrito";
    }else{
        $cant = $_POST['cantidad'];
        $idprodu = $_POST['idproducto'];
        $iduser = $_POST['iduser'];
        //$idcarrito = $_POST['idcarrito'];
        //Llena el carrito con ese producto 
        $estado = CarritoControlador::getAddCarrito($iduser, $idprodu, $cant);

        //echo  "NO Hay carrito";
        //echo $estado;
    }

    

    if($estado){
        header("location:/../ishopcorp/vista/carrito.php");
    }else{
        echo 'regresa';
    }
  
        
        

?>