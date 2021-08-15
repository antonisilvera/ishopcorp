<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script type="text/javascript" src="/../ishopcorp/vista/assets/js/category.js"></script>
</head>
<body>
    <?php
        $conexion = new PDO('mysql:host=localhost; dbname=bdishop' , 'root' , '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        
        $variable= array();

        if(isset($_POST['enviar'])){

            $idprod=$_POST['idprod'];
            //$idcategoria=$_POST['idcategoria'];
            $idsubcateg=$_POST['idsubcateg'];
            $marcaprod=$_POST['marcaprod'];
            $nomprod=$_POST['nomprod'];
            $detprod=$_POST['detprod'];
            $precioprod=$_POST['precioprod'];
            $stockprod=$_POST['stockprod'];
            $colorprod=$_POST['colorprod'];
            $anchoprod=$_POST['anchoprod'];
            $largoprod=$_POST['largoprod'];
            $altoprod=$_POST['altoprod'];
            $estadoprod=$_POST['estadoprod'];
            $fecha = date("d/m/Y H:i");

            $categ = ['-','CELULARES Y TABLETS', 'TV, AUDIO Y FOTO', 'CONSOLAS Y VIDEOJUEGOS', 'COMPUTACIÓN', 'HOGAR', 'ELECTROHOGAR', 'MODA', 
                        'RELOJES Y ACCESORIOS', 'BELLEZA Y CUIDADO PERSONAL', 'SALUD Y BIENESTAR', 'JUGUETES, NIÑOS Y BEBES', 'DEPORTES', 'MASCOTAS'];
            for($i=0; $i<26; $i++){
                if($i==$_POST['idcategoria']){
                    $idcategoria = $categ[$i];
                }
            }

            $query1 = "INSERT INTO productos (idprod, idcategoria, idsubcateg, marcaprod, nomprod, detprod, precioprod, stockprod, colorprod, anchoprod, largoprod, altoprod, fechaprod"; 
            $query2 = " VALUES (NULL, :idcategoria, :idsubcateg, :marcaprod, :nomprod, :detprod, :precioprod, :stockprod, :colorprod, :anchoprod, :largoprod, :altoprod, :fechaprod"; 
           

            //$variable= array();
            for ($i=0; $i < 5; $i++) {
                $var = "fotoprod".($i+1);
                if($_FILES[$var]['name']!=""){
                    //echo "hay imagen <br>";
                    $variable[$i]=$_FILES[$var]['name'];
                    $tipo_imagen=$_FILES[$var]['type'];
                    $tamano_imagen=$_FILES[$var]['size'];
                    if ($tamano_imagen<=3000000) {
                        if ($tipo_imagen=='image/jpeg' || $tipo_imagen=='image/jpg' || $tipo_imagen=='image/png' || $tipo_imagen=='image/gif') {                   
                            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/ishopcorp/img/productos/';       
                            move_uploaded_file($_FILES[$var]['tmp_name'], $carpeta_destino.$variable[$i]);
                            $query1 .= ", ".$var;
                            $query2 .= ", :".$var;
                        }else{
                            echo "Solo se puede subir imagenes como JPEG/JPG/PNG/GIF";
                        }               
                    }else{
                        echo "El tamaño es demasiado grande";
                    }
                }
            }
            
            $query1 .= ", estadoprod)";
            $query2 .= ", :estadoprod)";
            $queryTotal="";
            $queryTotal .= $query1 . $query2;

            echo "newquery => " .$queryTotal."<br>";
            
            echo $fecha;
            $resultado = $conexion->prepare($queryTotal);
            $resultado->bindValue(":idcategoria", $idcategoria);
            $resultado->bindValue(":idsubcateg", $idsubcateg);
            $resultado->bindValue(":marcaprod",$marcaprod);
            $resultado->bindValue(":nomprod", $nomprod);
            $resultado->bindValue(":detprod", $detprod);
            $resultado->bindValue(":precioprod",$precioprod);
            $resultado->bindValue(":stockprod", $stockprod);
            $resultado->bindValue(":colorprod", $colorprod);
            $resultado->bindValue(":anchoprod", $anchoprod);
            $resultado->bindValue(":largoprod", $largoprod);
            $resultado->bindValue(":altoprod", $altoprod);
            $resultado->bindValue(":fechaprod", $fecha);
            $resultado->bindValue(":estadoprod", $estadoprod);
            
            
            for ($i=0; $i < 5; $i++) { 
                $data=":fotoprod". ($i+1);
                $var="fotoprod". ($i+1);
                if($_FILES[$var]['name']!=""){
                    $resultado->bindValue($data, $variable[$i]);
                    echo "varaible(".$i.") =>".$variable[$i]."<br>";
                }          
            }
            
            if($resultado->execute()){
                //return true;
                header("Location:../vista/stock.php");
                //echo "Cargo correctamente";
            }else{
                //return false;
                echo "Fallo la carga";
            }
        }
    ?>

    <div class="mx-5 my-5 border px-5 py-5">
        <h1>AGREGAR PRODUCTO</h1>
    <form class="row g-3" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="idprod" id="idprod" value="<?=$product['idprod'];?>">
        <div class="col-3">
            <label for="idcategoria" class="form-label">Categoría</label>
            <?php 
                $categ = ['CELULARES Y TABLETS', 'TV, AUDIO Y FOTO', 'CONSOLAS Y VIDEOJUEGOS', 'COMPUTACIÓN', 'HOGAR', 'ELECTROHOGAR', 'MODA', 
                        'RELOJES Y ACCESORIOS', 'BELLEZA Y CUIDADO PERSONAL', 'SALUD Y BIENESTAR', 'JUGUETES, NIÑOS Y BEBES', 'DEPORTES', 'MASCOTAS'];
            ?>
            <select class="form-select" name="idcategoria" id="idcategoria" onchange="cambiaCateg()">
                <option>Seleccione...
                <?php for($i=0; $i<13; $i++){ ?>
                <option value="<?= $i+1;?>"><?= $categ[$i];?>
                <?php } ?>  
            </select>
        </div>
        <div class="col-6">
            <label for="idsubcateg" class="form-label">Sub-Categoría</label>
            <select class="form-select" name="idsubcateg" id="idsubcateg">
                <option value="-">Seleccione...
                
            </select>
        </div>
        
        <div class="col-4">
            <label for="marcaprod" class="form-label">Marca</label>
            <input type="text" class="form-control" name="marcaprod" id="marcaprod">
        </div>
        
        <div class="col-8">
            <label for="nomprod" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nomprod" id="nomprod">
        </div>
        <div class="col-md-4">
            <label for="stockprod" class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="stockprod" id="stockprod">
        </div>
        
        <div class="col-md-4">         
            <label for="precioprod" class="form-label">Precio</label>
            <div class="input-group">
                <span class="input-group-text">S/.</span>
                <input type="text" class="form-control" name="precioprod" id="precioprod" >
            </div>
        </div>
        <div class="col-md-4">
            <label for="colorprod" class="form-label">Color</label>
            <input type="text" class="form-control" name="colorprod" id="colorprod">
        </div>
        <div class="col-md-3">
            <label for="anchoprod" class="form-label">Ancho</label>
            <input type="text" class="form-control" name="anchoprod" id="anchoprod">
        </div>
        <div class="col-md-3">
            <label for="largoprod" class="form-label">Largo</label>
            <input type="text" class="form-control" name="largoprod" id="largoprod">
        </div>
        <div class="col-md-3">
            <label for="altoprod" class="form-label">Alto</label>
            <input type="text" class="form-control" name="altoprod" id="altoprod">
        </div>
        <div class="col-md-3">
            <label for="estadoprod" class="form-label">Estado</label>
            <input type="text" class="form-control" name="estadoprod" id="estadoprod">
        </div>
        <div class="col-12">
            <label for="detprod" class="form-label">Descripcion</label>
            <textarea class="form-control" name="detprod" id="detprod" rows="10"></textarea>
        </div>


        <div class="col-md-4">
            <label for="fotoprod1" class="form-label">Imagen 1</label>
            <input type="file" class="form-control" name="fotoprod1" id="fotoprod1" >
        </div>
        <div class="col-md-4">
            <label for="fotoprod2" class="form-label">Imagen 2</label>
            <input type="file" class="form-control" name="fotoprod2" id="fotoprod2" >
        </div>
        <div class="col-md-4" class="form-label">
            <label for="fotoprod3">Imagen 3</label>
            <input type="file" class="form-control" name="fotoprod3" id="fotoprod3" >
        </div>
        <div class="col-md-4" class="form-label">
            <label for="fotoprod4">Imagen 4</label>
            <input type="file" class="form-control" name="fotoprod4" id="fotoprod4" >
        </div>
        <div class="col-md-4" class="form-label">
            <label for="fotoprod5">Imagen 5</label>
            <input type="file" class="form-control" name="fotoprod5" id="fotoprod5" >
        </div>
        <div class="col-md-4">
            <button type=Submit name="enviar" class="btn btn-success col-12">Enviar</button>
        </div>
    </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>
</html>