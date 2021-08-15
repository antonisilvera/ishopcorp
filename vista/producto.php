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
       
<?php 
    //echo __DIR__ . "<br>";
    require "../templates/cabecera.php";
?>

<?php
    if(isset($_GET["idprod"])){
        $idprod = $_GET["idprod"];
    }

    require_once "../controlador/ProductoControlador.php";
            
    $matrizProductos=ProductoControlador::getOneProducto($idprod);

?>

<?php 

    foreach ($matrizProductos as $product):
        //echo $product['nomprod'];
?>


<div id="container">
    <!--Inicio web central-->
    <div id="central">
        <div class="imagen">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">   
                    <div class="carousel-item active">
                        <img src="/ISHOPCORP/img/productos/<?php echo $product['fotoprod1'] ?>" alt="..." height="600px">
                    </div>  
                    <div class="carousel-item">
                        <img src="/ISHOPCORP/img/productos/<?php echo $product['fotoprod2'] ?>" alt="..." height="600px">
                    </div>
                    <div class="carousel-item">
                        <img src="/ISHOPCORP/img/productos/<?php echo $product['fotoprod3'] ?>" alt="..." height="600px">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <hr class="separador">
        <div class="descripcion">
            <h4>Descripción</h4>
            <p><?php echo nl2br($product['detprod']); ?></p>
        </div>
    </div>
    <!--Fin web central-->
    
    <!--Inicio Lateral-->
    <div id="lateral">
        <form id="form-producto" action="agregarCarrito.php" method="post">
            <h4 class="titulo"><?php echo $product['nomprod'] ?></h4>
            <h4 class="precio">S/. <?php echo $product['precioprod'] ?></h4>
            <div class="selector">
                <div class="input-group">
                    <select class="custom-select" name="cantidad">
                        <option value="1" selected>1 unidad</option>
                        <?php for($i=1; $i<10; $i++){ ?>
                            <option value="<?php echo $i+1?>"><?php echo $i+1?> unidades</option>
                        <?php } ?>

                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text">(<?php echo $product['stockprod'] ?> disponibles)</label>
                    </div>
                </div>
            </div>    
            <div>
                <input type="hidden" name="idproducto" value="<?php echo $idprod ?>">
                <input type="hidden" name="iduser" value="<?php echo $_SESSION['usuario']['idusuario'] ?>">
                <button class="btn boton" type="submit" value="Comprar">Comprar</button>
            </div>
        </form>
        <p class="subtexto">Compra Protegida, recibe el producto que esperas o te devolvemos tu dinero</p>
    </div>

    <div class="clearfix"></div>
    <!--Fin Lateral-->
</div>



<?php
    endforeach
?>








<!--Footer-->
<?php   require("../templates/footer.php");   ?>
