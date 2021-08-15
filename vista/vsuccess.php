<?php 

    $idventa = 24;
    $nombres = "Antoni Isaac";
    $apellidos = "Silvera Gomez";
    $user = strtoupper($apellidos . ", " . $nombres);
    $tipodoc = "DNI";
    $numdni = "47101163";
    $email = "atonpruebas@gmail.com";
    $cosenvio = 15.00;
    $total = 45.00;
    $fecventa = "23/03/2021";
    $dia = 23;
    $mes = "03";
    $ano = 2021;
    $direccion = "MZ A Lt 24 1ETAPA URB. CANTO REY - SAN JUAN DE LURIGANCHO - LIMA -LIMA";

    $header = "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $header .= "From: ishopcorporacion@gmail.com" . "\r\n";
	//$header .= "CC: andreasanro0@gmail.com" . "\r\n";
	//$header .= "X-Mailer: PHP/". phpversion();
	$asunto = "Boleta de compra - ISHOPCORP";
    $msg='<html>'.
	'<head><title>Email con HTML</title></head>'.
    //'<style> body{background-color: #cccc; color:green;}</style>'.
	'<body style="background-color:#F5F5F5;border: 15px double darkgreen;margin: 20px;padding: 20px;">'.
    '<h1 style="color:white;font-size: 42px;text-shadow: 0px 0px 2px #444, 0px 1px 3px #444, 0px 2px 3px #444, 0px 3px 4px #444, 0px 4px 5px #444;letter-spacing: 2px;font-family: Teko;background-color: green;text-align: center;margin-bottom: 0px;">ISHOPCORP</h1>'.
    '<hr>'.
    '<div style="border:6px dotted green;padding: 30px; font-family:verdana;">'.
    '<div style="text-align: center;border-bottom: 6px dotted darkgreen;">'.
    '<p>Hola, '.$nombres.': </p>'.
    '<p>¡Buenas noticias!<br>'.
    '¡Un artículo de tu pedido ha sido enviado!<br>'.
    'Si compraste varios artículos, recibirás una notificación por cada artículo enviado por separado.</p>'.
    '</div>'.
	'Esto es un email que se envía en el formato HTML'.
	'Enviado por mi programa en PHP'.
    '</div>'.
	'</body>'.
	'</html>';
    echo $msg;

			$mail = mail($email,$asunto,$msg,$header);
			if($mail){
				$respuesta = true;
			}else{
				$respuesta = false;
			}

        //var_dump($respuesta);
?>
