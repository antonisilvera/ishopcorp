<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ISHOPCORP</title>
        <link rel="icon" type="favicon/x-icon" href="../img/logo_ishopcorp.png" />
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
    </head>
    <body>
<!--Cabecera-->
<?php 
    //echo __DIR__ . "<br>";
    require ("../templates/cabecera.php");
?>
<!--Fin cabecera-->

<?php
    require_once "../controlador/CarritoControlador.php";
    $directotal = strtoupper($_SESSION['usuario']['direccion'] ." - ". $_SESSION['usuario']['distrito'] ." - ". $_SESSION['usuario']['provincia'] ." - ". $_SESSION['usuario']['departamento']);
    $matrizCarrito=CarritoControlador::getCarrito($_SESSION['usuario']['idusuario']);  

?>


<!--Cuerpo para llenar la lista del carrito-->
<div id="container">
    <?php if(empty($matrizCarrito)){ ?>
    <div id="carvacio">
        <img src="../img/carrito_vacio.jpg">
    </div>
    <?php }else{ ?>
    <div id="carmid">
        <?php
            $subtotal=0;
            foreach ($matrizCarrito as $carr):		
        ?>
        <div id="caja">
            <div class="izquierda">
                <img src="<?php echo $carr['fotoprod1']?>" width="200px"/>
            </div>
            <div class="derecha">
                <h3 class="titl"><?php echo $carr['nomprod']?></h3>
                <form action="agregarCarrito.php" method="POST">
                    <text class="prec">S/. <?php echo $carr['precioprod']?></text>       
                    <text class="cant">
                        Cantidad: 
                        <select class="custom-select" name="cantidad" onchange="this.form.submit()">
                            <option selected><?php echo $carr['cantidad']?> unid.</option>
                            <option value="0">0 unid.</option>
                            <?php for($i=0; $i<9; $i++){ ?>
                            <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> unid.</option>
                            <?php } ?>
                        </select>
                    </text>
                    <input type="hidden" name="idcarrito" value="<?php echo $carr['idcarrito']?>" />
                    <input type="hidden" name="idproducto" value="<?php echo $carr['idproducto']?>" />
                    <input type="hidden" name="iduser" value="<?php echo $carr['idusuario']?>" />
                    <input type="hidden" name="tipo" value="update" />
                </form>
            </div>
        </div>
        <?php
            $subtotal=$subtotal+($carr['precioprod']*$carr['cantidad']);
            endforeach;
            $envio = 15.00;
            $total = $subtotal + $envio;
        ?>

    
    </div>
    
    <div id="carlat">
        <div class="titder">
            <text>DETALLES DEL PEDIDO</text>
        </div>
        <form id="formPago" action="pagarprod.php" method="POST">
        <div class="bodyder">
            <div class="boderte">Subtotal </div><div class="boderteder">S/. <?php echo $subtotal; ?></div>
            <div class="boderte">Envio </div><div class="boderteder">S/. <?php echo $envio; ?></div>
            <div class="boderte total">Total </div><div class="boderteder total">S/. <?php echo $total; ?></div>
        </div>
        <input type="hidden" name="direccion" value="<?=$directotal?>"/>
        <input type="hidden" name="iduser" value="<?=$carr['idusuario']?>" />
        <input type="hidden" name="envio" value="<?=$envio?>" />
        <input type="hidden" name="total" value="<?=$total?>" />
        <button class="btn btn-primary btn-lg" type="submit">PAGAR</button>
        </form>
    </div>
    <?php } ?>
    
</div>


<!--Fin del cuerpo para llenar la lista del carrito-->

<!--Footer-->
<?php   require("../templates/footer.php");   ?>
<!--Fin Footer-->