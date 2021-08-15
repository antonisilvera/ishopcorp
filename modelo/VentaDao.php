<?php

include 'Conexion.php';
require_once __DIR__."/../entidades/Venta.php";
require_once __DIR__."/../entidades/DetalleVenta.php";

class VentaDao extends Conectar
{
	protected static $conn;

	private static function getConexion(){
		self::$conn = Conectar::conexion();
	}

	private static function desconectar(){
		self::$conn = null;
	}

	//metodo para agregar un item al carrito
	public static function addVenta($objventa, $direccion){

        //Se crea la venta
		$query = "INSERT INTO venta (idventa ,iduser, costoenvio, total, fecventa, estado) 
                            VALUES (NULL, :iduser, :costoenvio, :total, :fecventa, 'POR_ENTREGAR')";
		self::getConexion();
		$resultado = self::$conn->prepare($query);
		$resultado->bindValue(":iduser", $objventa->getIduser());
        $resultado->bindValue(":costoenvio", $objventa->getCostoenvio());
		$resultado->bindValue(":total", $objventa->getTotal());      
		$resultado->bindValue(":fecventa", date("d/m/Y H:i"));
        
        $pasa= $resultado->execute();
        $idventa = self::$conn->lastInsertId();
        
        //Si se crea la venta, se procede a crear el detalle
		if($pasa){
            //Consulto el idproducto y cantidad
            $sql = "SELECT c.idcarrito, c.idproducto, p.stockprod, p.precioprod,c.cantidad 
                    FROM carrito c INNER JOIN productos p ON c.idproducto = p.idprod 
                    WHERE c.idusuario = :idusuario AND c.estado = 'PENDIENTE'";
            
            self::getConexion();
            $result = self::$conn->prepare($sql);
            $result->bindValue(":idusuario", $objventa->getIduser());
            $result->execute();

            //Inserto un detalle por cada producto
            while ($filas = $result->fetch()) {

                $idcarrito=$filas['idcarrito'];
                $idprod=$filas['idproducto'];
                $stockprod=$filas['stockprod'];
                $preciunit=$filas['precioprod'];
                $cant= $filas['cantidad'];
                
                $sql = "INSERT INTO detalleventa (iddetalle, idventa, idproducto, precunit, cantidad, direccionentrega) 
                VALUES (NULL, :idventa, :idproducto, :precunit, :cantidad, :direccionentrega)";
                
                self::getConexion();
                $newresult = self::$conn->prepare($sql);
                $newresult->bindValue(":idventa", $idventa);
                $newresult->bindValue(":idproducto", $idprod);
                $newresult->bindValue(":precunit", $preciunit);
                $newresult->bindValue(":cantidad", $cant);
                $newresult->bindValue(":direccionentrega", $direccion);
                
                //Actualizo las tablas
                if($newresult->execute()){

                    //Actualizacion tabla carrito columna estado
                    $sqlcar = "UPDATE carrito SET estado='PAGADO' WHERE idcarrito = :idcarrito";
                    self::getConexion();
                    $resultcar = self::$conn->prepare($sqlcar);
                    $resultcar->bindValue(":idcarrito", $idcarrito);
                    $resultcar->execute();

                    //Actualizacion stock de productos
                    $newstock = $stockprod-$cant;
                    $sqlprod = "UPDATE productos SET stockprod=:stockprod WHERE idprod = :idprod";
                    self::getConexion();
                    $resultprod = self::$conn->prepare($sqlprod);
                    $resultprod->bindValue(":idprod", $idprod);
                    $resultprod->bindValue(":stockprod", $newstock);
                    $resultprod->execute();

                }
            }

            //Mensaje de correo de confirmación
            $sqlventa = "SELECT v.idventa, u.nombres, u.apellidos, u.tipodoc, u.numdni, u.email, v.costoenvio, v.total, v.fecventa
                    FROM venta v INNER JOIN usuarios u ON v.iduser = u.idusuario 
                    WHERE v.idventa = :idventa AND v.estado = 'POR_ENTREGAR'";
            
            self::getConexion();
            $report = self::$conn->prepare($sqlventa);
            $report->bindValue(":idventa", $idventa);
            $report->execute();

            while ($filas = $report->fetch()) {
                $nombres = $filas['nombres'];
                $apellidos = $filas['apellidos'];
                $tipodoc = $filas['tipodoc'];
                $numdni = $filas['numdni'];
                $email = $filas['email'];
                $cosenvio = $filas['costoenvio'];
                $total = $filas['total'];
                $fecventa = $filas['fecventa'];
            }

            
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= "From: ishopcorporacion@gmail.com" . "\r\n";
			$header .= "CC: antoni.silvera@gmail.com" . "\r\n";
			//$header .= "X-Mailer: PHP/". phpversion();
			$asunto = "Boleta de compra - ISHOPCORP";
            $msg="
            <html>
            <body>
                <table border=1>
                    <tr>
                        <td rowspan=4 colspan=3>Imagen</td>
                        <td colspan=4>R.U.C. 10459533848</td>
                    </tr>
                    <tr>
                        <td colspan=4>BOLETA DE VENTA</td>
                    </tr>
                    <tr>
                        <td colspan=4>001 - <?=$idventa?></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td rowspan=2 colspan=4><h3>VENTA DE PRODUCTOS TECNOLÓGICOS</h3></td>
                        <td>DIA</td>
                        <td>MES</td>
                        <td>AÑO</td>
                    </tr>
                    <tr>
                        <td><?=$dia?></td>
                        <td><?=$mes?></td>
                        <td><?=$año?></td>
                    </tr>
                    <tr>
                        <td colspan=7 align=center>
                            <p>Río Huaura N° 475 - San Juan de Lurigancho 15434 - Lima - Lima <br/>
                            Cel: 923 707 929 ó 922 401 586  ||  Redes Sociales: F Ishopcorp I Isopcorporacion <br/>
                            e-mail: ishopcorporacion@gmail.com</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=4>Señor(es): ".$apellidos. ", ".$nombres. "</td>
                        <td colspan=3>Doc. Ident: ".$numdni."</td>
                    </tr>
                    <tr>
                        <td colspan=7>Dirección: ". $direccion." </td>
                        
                    </tr>
                    <tr>
                        <td>ITEM</td>
                        <td>CANT.</td>
                        <td colspan=2>DESCRIPCION</td>
                        <td>P. UNIT.</td>
                        <td>IMPORTE</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td colspan=2>DESCRIPCION DESCRIPCION DESCRIPCION</td>
                        <td>15.00</td>
                        <td>30.00</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>.</td>
                        <td colspan=2>.</td>
                        <td>.</td>
                        <td>.</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>.</td>
                        <td colspan=2>.</td>
                        <td>.</td>
                        <td>.</td>
                    </tr>
                    <tr>
                        <td colspan=5 align=right>Total</td>
                        <td>S/. 00.00</td>
                    </tr>
                </table>    
            </body>
            </html>    
            ";
			

			$mail = @mail($email,$asunto,$msg,$header);
			if($mail){
				$respuesta = true;
			}else{
				$respuesta = false;
			}

			return true;
		}else{
			return false;
		}
        
		
	}


}

?>