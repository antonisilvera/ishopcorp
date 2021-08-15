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
        
        <div id="contacto">
        <h1>CONTACTO</h1>
        <br><hr/><br>
        <form id="formcontact" method="POST" action="../helps/enviar_mail.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular"/>
                </div>
                <div class="form-group col-md-8">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="asunto">Asunto</label>
                    <input type="text" class="form-control" id="asunto" name="asunto"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="mensaje">Mensaje</label>
                <textarea class="form-control" id="Mensaje" rows="4" name="mensaje"></textarea>
                </div>
            </div>
            <br><hr><br>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary btn-lg col-md-12">Enviar</button>
                </div>
            </div>
        </form>
        </div>
    </div>


<!--Footer-->
<?php   require("../templates/footer.php");   ?>
