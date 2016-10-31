<?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING ^ E_DEPRECATED);
    $id=$_GET['cod'];
    require('conexion.php');
    $query="SELECT * FROM libros WHERE id=".$id;
    $rs=mysql_query($query);
    if(isset($rs)){$datos=mysql_fetch_row($rs);mysql_close();}
    else{echo "ERROR";mysql_close();}
    $texto=$datos[3];
    $autor=$datos[1];
    $titulo=$datos[2];
    $variable="<div style='width:100%;'>
                    <div style=\"background:  #323226;background-size: contain;float:left;width:17.2725%;height:530px;color: #FFFBDD;\">
                        <img style='margin-left: 25%; margin-top:25px;width: 55%;' src='/img/vice.png'>
                        <p style=\"text-align:center;font-size:8px;font-family:'Arial';padding-left:65px;padding-right:65px;padding-top:0px;font-weight:bold;\">
                            Biblioteca del Bicentenario de Bolivia
                        </p>
                        <p style=\"text-align: justify;font-family:'Arial';font-size:8px;padding-left:20px;padding-right:20px;\">
                            En el marco de la celebración de los 200 años de la Independencia de Bolivia, la Vicepresidencia del Estado Plurinacional de Bolivia, a través de su Centro de Investigaciones Sociales, propone la creación del proyecto editorial Biblioteca del Bicentenario de Bolivia (BBB) con el objetivo central de seleccionar, publicar y difundir 200 obras representativas del pensamiento de nuestro país; para promover la lectura, el estudio y la investigación de lo boliviano, fortalecer el sistema educativo y la reflexión sobre la identidad plural de Bolivia. Dividida en cuatro colecciones: Historias y geografías, Letras y artes, Sociedades y Diccionarios, la BBB es un proyecto que toma en cuenta aspectos cronológicos, históricos, geográficos, étnicos, culturales, lingüísticos, etc. con la intención de conformar un corpus de obras representativas de y para la historia de nuestro país.
                            <br>Este emprendimiento tiene como uno de sus fundamentos la distribución masiva de las obras a publicar. El público meta del proyecto son estudiantes de nivel secundario, universitarios, profesores, docentes, investigadores, así como la población general de Bolivia.
                        </p>
                        <img style='margin-left: 35%; margin-top:0px;width: 18%;' src='/img/cis.png'>
                    </div>
                    <div style=\"background: url('/img/izquierdo0.png');color: #FFFBDD;float:left;width:31.21%;height:530px;background-size: contain;\">
                        <img style='margin-left: 40%; margin-top:25px;width: 18%;' src='/img/bbblanco.png'>
                        <p style=\"text-align: justify;margin-left: 20px;margin-right:45px;padding-top:15px;font-family: 'Arial';font-size: 8px;\">
                            {$texto}
                        </p>
                        <p style=\"text-align: right;margin-right: 45px;font-size: 7px;font-family: 'Arial';\">
                            {$autor}
                        </p>
                    </div>
                    <div style=\"background: url('/img/medio.png');background-size: contain;width:3.02%;float:left;height:530px\"></div>
                    <div style=\"background: url('/img/derecho.png');background-size: contain;width:31.21%;float:left;height:530px\">
                        <img style='margin-left: 16px;margin-top: 28px;width: 342px; height: 350px;' src='{$datos[5]}'>                
                        <div style=\"font-family:'Arial';margin-top: 20px; margin-left: 25px;color: #FFFBDD;font-size:16px;\">
                            <b>{$titulo}</b><br>{$autor}
                        </div>
                    </div>
                    <div style=\"background: #F7F0C5;width:17.2725%;float:left;height:530px;color: #323226;\">
                    <p style=\"text-align:center;font-family:'Arial';font-size:8px;font-weight:bold;padding-left:30px;padding-right:60px;padding-top:60px;\">
                        Bolivia culta, Bolivia fuerte
                    </p>
                    <p style=\"text-align:justify;font-family:'Arial';font-size:8px;padding-left:30px;padding-right:30px;\">
                        Leemos para completar el círculo, porque quizás el pasado está adelante y el futuro atrás. Leemos para intuir, para descifrar, para unir los puntos, para conectarnos a la matrix. Leemos para crear, para vivir en el ahora y para planificar hacia dónde ir.
                        <br><br>Queremos que el proyecto Biblioteca del Bicentenario sirva para a Bolivia con 200 obras que son una muestra de nuestra sangre, el ADN documental de nuestro país. El proyecto llega en el momento ideal: la nueva Constitución que aprobada en 2008 reconfiguró política, jurídica e institucionalmente la educación y la cultura en Bolivia. El diseño continua, pero ha sentado bases en la ley de la educación “Avelino Siñañi – Elizardo Pérez”,  la ley del libro “Oscar Alfaro” y su reglamento. El proyecto Biblioteca del Bicentenario de Bolivia pretende ser el puntal para implementar esas nuevas políticas y directrices, todas ellas pensadas para el nuevo modelo autonómico de administración del país.
                        <br><br>Acompáñanos. Queremos releernos con el país y festejar nuestro cumpleaños número 200 con una Biblioteca del Bicentenario tatuada en la retina de la memoria colectiva de los bolivianos. Queremos pensar y descolonizar con nuestras palabras e ideas; por eso te invitamos a leer para despertar, para crecer. 
                        <br><br>Un país que lee, es un país libre.

                    </p>
                    </div>
            </div>";
    include("mpdf/mpdf.php");
    $mpdf=new mPDF('utf-8',array(330,139.7),'','',0,0,0,0,0,0);
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->list_indent_first_level = 0;
    $mpdf->WriteHTML($variable);         
    $mpdf->Output($autor.".pdf", 'I');
?>