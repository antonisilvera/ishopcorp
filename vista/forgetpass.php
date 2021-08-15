<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ISHOPCORP</title>
        <link rel="icon" type="favicon/x-icon" href="../img/logo_ishopcorp.png" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="/../ishopcorp/vista/assets/css/overhang.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script type="text/javascript" src="/../ishopcorp/vista/assets/js/lugares.js"></script>
    </head>
    <body>

    <?php 
    //echo __DIR__ . "<br>";
    require "../templates/cabecera.php";
    ?>
    
    <div id="container">
        <div id="forgetpass">

            <form id="forget" action="/../ishopcorp/vista/enviarcorreo.php" method="POST">
                <div class="form-row">
                    <div class="cabeza">
                        <h3>RECUPERACIÓN DE CONTRASEÑA</h3>
                    </div>
                    <div class="form-group col-md-12 cuerpo">
                        <label for="email">Dirección De Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email"/>
                        <button class="btn btn-success btnenviar" type="submit">ENVIAR</button>
                    </div>
                    
                </div>
            </form>
            
        </div>
    </div>


    <!--Footer-->
    <?php   require("../templates/footer.php");   ?>
