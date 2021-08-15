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
	$header .= "CC: antoni.silvera@gmail.com" . "\r\n";
	//$header .= "X-Mailer: PHP/". phpversion();
	$asunto = "Boleta de compra - ISHOPCORP";
    $msg="
        <html>
            <style>
                *{
                    padding: 0px;
                    margin: 0px auto;
                }
                .clearfix{
                    float: none;
                    clear: both;
                }
                #cabecera{
                    border: 2px solid black;
                    width: 605px;
                    padding: 10px;
                    font-family: verdana;
                }
                .imagen{
                    float: inline-start;
                    width: 343px;
                    heigth: 220px;
                    //border: 1px solid red;
                }
                .imagen img{
                    width: 246px;
                    padding-inline: 48px;
                }
                .cabecerader{
                    float: right;
                    width: 254px;
                    height: 102px;
                }
                .cabecerader div{
                    width: 100%;
                    height: 30px;
                    border: 2px solid green;
                    text-align: center;
                    line-height: 30px;
                    font-size: 22px;
                }
                .top{
                    border-radius: 6px 6px 0px 0px;
                }
                .mid{
                    background-color: green;
                    color: white;
                    font-weight: bold;
                }
                .bottom{
                    border-radius: 0px 0px 6px 6px;
                }
                .menu{
                    margin-top: 10px;
                    width: 100%;
                }
                .especialidad{
                    float: left;
                    width: 449px;
                    height: 60px;
                    font-size: 16px;
                    font-style: italic;
                    line-height: 60px;
                    text-align: center;
                }
                .fecha{
                    float: right;
                    width: 150px;
                    height: 60px;
                    text-align: center;
                }
                .data div{
                    float: left;
                    width: 32%;
                    height: 30px;
                    line-height: 30px;
                    border: 1px solid green;
                    background-color: green;
                    color: white;
                    font-weight: bold;
                }

                .round1{
                    border-radius: 5px 0px 0px 0px;
                }
                .round2{
                    border-radius: 0px 5px 0px 0px;
                }
                .datadown div{
                    float: left;
                    width: 32%;
                    border: 1px solid green;
                    height: 30px;
                    line-height: 30px;
                }
                .round3{
                    border-radius: 0px 0px 0px 5px;
                }
                .round4{
                    border-radius: 0px 0px 5px 0px;
                }
                .datos{
                    text-align: center;
                    margin-top: 10px;
                }
                .icono{
                    width: 19px;
                }
                .user{
                    //border: 1px solid black;
                    margin-top: 10px;
                }
                .fila1{
                    width: 100%;
                }
                .part1{
                    float: left;
                }
                .part2{
                    float: right;
                }
                .fila2{
                    width: 100%;
                    margin-top: 7px;
                }
                .tabla{
                    margin-top: 20px;
                    width: 100%;
                    border: 2px solid black;
                    border-collapse: collapse;
                }
                .tabla th{
                    background-color: green;
                    color: white;
                    border: 2px solid black;
                    padding: 10px;
                }
                .tabla td{
                    border: 2px solid black;
                }
                .centrar{
                    text-align: center;
                }
                .espacio{
                    padding: 10px;
                }
                .derecha{
                    text-align: right;
                }
                .fin{
                    float: right;
                    margin-top: 10px;
                    width: 174px;
                }
                .fin span{
                    border: 3px solid green;
                    border-radius: 5px;
                    display: inline-block;
                    height: 33px;                   
                    width: 78px;
                    line-height: 31px;
                    padding-inline: 10px;
                }
            </style>
            <body>
                <div id='cabecera'>
                    <div class='imagen'>
                        <img src='../img/logoishopfrase.jpeg'>
                    </div>
                    <div class='cabecerader'>
                        <div class='top'>R.U.C. 10459533848</div>
                        <div class='mid'>BOLETA DE VENTA</div>
                        <div class='bottom'>001- 0000".$idventa."</div>
                    </div>
                    <div class='clearfix'></div>
                    <div class='menu'>
                        <div class='especialidad'>
                            <h3>VENTA DE PRODUCTOS TECNOLÓGICOS</h3>
                        </div>
                        <div class='fecha'>
                            <div class='data'>
                                <div class='round1'>DIA</div>
                                <div>MES</div>
                                <div class='round2'>AÑO</div>
                            </div>
                            <div class='clearfix'></div>
                            <div class='datadown'>
                                <div class='round3'>".$dia."</div>
                                <div>".$mes."</div>
                                <div class='round4'>".$ano."</div>
                            </div>
                            
                        </div>
                        <div class='clearfix'></div>
                    </div>
                    <div class='clearfix'></div>
                    <div class='datos'>
                        <p>Río Huaura N°475 - San Juan de Lurigancho 15434 - Lima - Lima</p>
                        <p><img class='icono' src='../img/whatsapp.jpg'/> 923 707 929  - <img class='icono' src='../img/facebook.jpg'/> Ishopcorp  - <img class='icono' src='../img/instagram.jpg'/> Ishopcorporacion</p>
                        <p>e-mail: ishopcorporacion@gmail.com</p>
                    </div>
                    <div class='user'>
                        <div class='fila1'>
                            <div class='part1'>Señor(es): <u> ".$user. " </u></div>
                            <div class='part2'>Doc. Ident: <u> ".$numdni." </u></div>
                            <div class='clearfix'></div>
                        </div>
                        
                        <div class='fila2'>Dirección: <u>" . $direccion." </u></div>                      
                    </div>
                    <table class='tabla' >
                        <tr>
                            <th>CANT.</th>
                            <th>DESCRIPCIÓN</th>
                            <th>P. UNIT.</th>
                            <th>IMPORTE</th>
                        </tr>
                        <tr>
                            <td class='centrar'>1</td>
                            <td class='espacio'>Costo de Envio</td>
                            <td class='centrar'>".$cosenvio."</td>
                            <td class='centrar'>".$cosenvio."</td>
                        </tr>
                        <tr>
                            <td class='centrar'>1</td>
                            <td class='espacio'>Costo de Envio</td>
                            <td class='centrar'>".$cosenvio.".00</td>
                            <td class='centrar'>".$cosenvio.".00</td>
                        </tr>
                        <tr>
                            <td class='centrar'>1</td>
                            <td class='espacio'>Costo de Envio Costo de Envio</td>
                            <td class='centrar'>".$cosenvio."</td>
                            <td class='centrar'>".$cosenvio."</td>
                        </tr>
                    </table>
                    <div class='fin'>TOTAL  
                        <span> S/. ".$total.".00</span>
                        
                    </div>
                    <div class='clearfix'></div>
                </div>

                
  
            </body>
        </html>    
        ";

        
        echo $msg;
        /*
			$mail = @mail($email,$asunto,$msg,$header);
			if($mail){
				$respuesta = true;
			}else{
				$respuesta = false;
			}

        var_dump($respuesta);
        */
?>