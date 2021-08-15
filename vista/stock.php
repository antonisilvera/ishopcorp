<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock de Productos</title>
</head>
<body>
    <?php

        $conexion = new PDO('mysql:host=localhost; dbname=bdishop' , 'root' , '');
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $conexion->exec("SET CHARACTER SET utf8");
        
        $productos=array();
        $query = "SELECT * FROM productos";
        $resultado = $conexion->prepare($query);
        $resultado->execute();
        while ($filas = $resultado->fetch()) {
            $productos[]=$filas;
        }

    ?>
    
    <h1>Stock de Productos</h1>
    <hr>
    <a href="newproduct.php">Agregar Producto</a>
    <table border="1">
        <tr>
            <th rowspan="2">ITEM</th>
            <th rowspan="2">IMAGEN</th>
            <th rowspan="2">NOMBRE</th>
            <th rowspan="2">DESCRIPCION</th>
            <th rowspan="2">CANTIDAD</th>
            <th rowspan="2">PRECIO</th>
            <th rowspan="2">COLOR</th>
            <th colspan="3">DIMENSION</th>
            <th rowspan="2">ESTADO</th>
            <th rowspan="2">ACCION</th>
        </tr>
        <tr>
            <th>ANCHO</th>
            <th>LARGO</th>
            <th>ALTO</th>
        <tr>
        <?php foreach ($productos as $product):	 ?>
        <tr>
            <td><?= $product['idprod'] ?></td>
            <td><img src="/ISHOPCORP/img/productos/<?= $product['fotoprod1'] ?>" height="200px" width="200px"></td>
            <td><?= $product['nomprod']?></td>
            <td><?= $product['detprod']?></td>
            <td><?= $product['stockprod'] ?> und.</td>
            <td>S/. <?= $product['precioprod']?></td>
            <td><?= $product['colorprod']?></td>
            <td><?= $product['anchoprod']?> cm</td>
            <td><?= $product['largoprod']?> cm</td>
            <td><?= $product['altoprod']?> cm</td>
            <td><?= $product['estadoprod'] ?></td>
            <td><a href="addproduct.php?idprod=<?= $product['idprod'] ?>">Editar</a></td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>