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


<!--Cuerpo para llenar la lista del carrito-->
<div id="container">
    <div id="miperfil">
        <legend>Mis Datos personales</legend>
        <hr/>
        <div class="fotoperfil">
            <img src="#"/>
        </div>
        <div class="derech">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombres">NOMBRES</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $_SESSION['usuario']['nombres']; ?>"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">APELLIDOS</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $_SESSION['usuario']['apellidos']; ?>"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="tipodoc">TIPO DE DOCUMENTO</label>
                    <input type="text" class="form-control" id="tipodoc" name="tipodoc" value="<?php echo $_SESSION['usuario']['tipodoc']; ?>"/>
                </div>
                <div class="form-group col-md-3">
                    <label for="dni">NÚMERO DE DOCUMENTO</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $_SESSION['usuario']['numdni']; ?>"/>
                </div>
                <div class="form-group col-md-3">
                    <label for="celular">CELULAR</label>
                    <input type="text" class="form-control" id="celular" name="celular" value="+51 <?php echo $_SESSION['usuario']['celular']; ?>"/>
                </div>
            </div>
        </div>
        <div class="form-row">
            
            <div class="form-group col-md-6">
                <label for="email">E-MAIL</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['usuario']['email']; ?>"/>
            </div>
        </div>

        <hr/>
        <legend>Dirección de entrega</legend>
        <hr/>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="departamento">DEPARTAMENTO</label>
                <input type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $_SESSION['usuario']['departamento']; ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label for="provincia">PROVINCIA</label>
                <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $_SESSION['usuario']['provincia']; ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label for="distrito">DISTRITO</label>
                <input type="text" class="form-control" id="distrito" name="distrito" value="<?php echo $_SESSION['usuario']['distrito']; ?>"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="direccion">DIRECCIÓN</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $_SESSION['usuario']['direccion']; ?>"/>
            </div>
        </div>
        
    </div>
</div>
<!--Fin del cuerpo para llenar la lista del carrito-->

<!--Footer-->
<?php   require("../templates/footer.php");   ?>
<!--Fin Footer-->