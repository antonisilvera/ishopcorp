<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ISHOPCORP</title>
        <link rel="icon" type="favicon/x-icon" href="img/logo_ishopcorp.png" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="vista/assets/css/overhang.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
    </head>
    <body>
       
       
       <?php require("templates/cabecera.php"); ?>



        <!--Contenido-->
        <div id="contenido" class="projects">
            <?php
                require_once __DIR__."/controlador/ProductoControlador.php";
                if (isset($_POST['search']) && $_POST['busqueda'] != '') {
                    $busqueda = $_POST['busqueda'];
                    
                    $matrizProductos=ProductoControlador::getBuscarProducto($busqueda);

                    //var_dump($matrizProductos);
                    
    
                    //header("Location:index.php");
                }else{
                          
                    $matrizProductos=ProductoControlador::getProducto();
                    
                }
                foreach ($matrizProductos as $product):	
                	
            ?>
            <a href="vista/producto.php?idprod=<?php echo $product['idprod'] ?>">
            <div class="cards">
                <img src="/ISHOPCORP/img/productos/<?php echo $product['fotoprod1'] ?>" height="200px" width="200px">
                <div class="cards-body">
                    <p class="cardtitulo"><?php echo $product['nomprod'] ?></p>
                    <p class="cardprecio">S/. <?php echo $product['precioprod'] ?></p>
                </div>
            </div>
            </a>
            <?php
                    endforeach;

            ?>
        </div>
        
        <!--Contenido-->

        <?php   require("templates/footer.php");   ?>
