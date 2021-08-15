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
        
        <div id="registro">
            <br><br>
            <h3>REGISTRAR UNA NUEVA CUENTA</h3><br>
            <form id="f1" method="POST" action="/../ishopcorp/vista/validarCodeAdd.php" validate>
                <div id="user">
                    <br>
                    <text>Usuario</text><br><br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="email">Dirección De Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required/>
                            <div id="alertmail"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required/>
                            <div id="alertpass"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="renewpassword">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="renewpassword" name="renewpassword" required/>
                            <div id="alertrepass"></div>
                        </div>
                        
                    </div>
                </div>
                <div id="user">
                    <br>
                    <text>Datos Personales</text><br><br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" required/>
                            <div id="alertnom"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required/>
                            <div id="alertape"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tipodoc">Tipo de Documento</label>
                            <select class="custom-select" name="tipodoc" id="tipodoc" required>
                                <option value="">Seleccione...</option>
                                <option value="DNI">DNI</option>
                                <option value="LibretaElectoral">Libreta Electoral</option>
                                <option value="Pasaporte">Passaporte</option>
                            </select>
                            <div id="alerttip"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dni">Número</label>
                            <input type="text" class="form-control" id="dni" name="dni" required/>
                            <div id="alertdni"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="celular">Teléfono Móvil</label>
                            <input type="text" class="form-control" id="celular" name="celular" required/>
                            <div id="alertcel"></div>
                        </div>
                    </div>
                </div>
                <div id="user">
                    <br>
                    <text>Domicilio de entrega</text><br><br>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="departamento">Departamento</label>
                            <select class="custom-select" name="departamento" id="departamento" onchange="cambia()" required>
                                <option value="">Seleccione...
                                <?php
                                    $departamentos = ['AMAZONAS', 'ANCASH', 'APURIMAC', 'AREQUIPA', 'AYACUCHO', 'CAJAMARCA', 'CUSCO', 
                                        'HUANCAVELICA', 'HUANUCO', 'ICA', 'JUNIN', 'LA LIBERTAD', 'LAMBAYEQUE', 'LIMA', 'LORETO', 'MADRE DE DIOS', 
                                        'MOQUEGUA', 'PASCO', 'PIURA', 'PUNO', 'SAN MARTIN', 'TACNA', 'TUMBES', 'UCAYALI'];
                                    for($i=0; $i<24; $i++){
                                    ?>
                                        <option value="<?= $i+1 ?>"><?= $departamentos[$i] ?>
                                    <?php
                                        }
                                    ?>  
                            </select>
                            <div id="alertdep"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="provincia">Provincia</label>
                            <select class="custom-select" name="provincia" id="provincia" onchange="cambiaDistrito()" required>
                                <option value="">-
                            </select>
                            <div id="alertpro"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="distrito">Distrito</label>
                            <select class="custom-select" name="distrito" id="distrito" required>
                                <option value="">-
                            </select>
                            <div id="alertdis"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="direccion">Dirección De Domicilio</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required/>
                            <div id="alertdir"></div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <button type="submit" onclick="validarFormulario()" class="btn btn-success btn-lg col-md-12 bton">Crear mi cuenta</button>
                    </div>
                </div>
            </form>
            <br><br>
        </div>
        <div id="iniciosesion">
            <br><br>
            <h3>INICIAR SESION</h3><br>
            <form id="sesionForm" action="/../ishopcorp/vista/validarCode.php" method="post" role="form">
                <div id=user>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="email">Dirección De Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-lg col-md-12">Inicia sesión</button>
                            <br><br>
                            <a href="/../ishopcorp/vista/forgetpass.php">¿Olvidaste la contraseña?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



<!--Footer-->
<?php   require("../templates/footer.php");   ?>
