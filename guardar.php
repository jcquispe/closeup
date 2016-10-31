<?php
require('conexion.php');
$nombre= TildesHtml($_POST['nombre']);
$titulo= TildesHtml(strtoupper($_POST['titulo']));
$texto= TildesHtml($_POST['texto']);
function TildesHtml($cadena) { 
    return str_replace(array("á","é","í","ó","ú","ñ","Á","É","Í","Ó","Ú","Ñ"),
                       array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;",
                             "&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Ntilde;"), $cadena);     
}
$query=("INSERT INTO libros(nombre, titulo, texto, fecha, imagen) VALUES('".$nombre."','".$titulo."','".$texto."','".date('Y-m-d H:i:s')."','".$_POST['img64']."' );");
$rs= mysql_query($query);
$id=mysql_insert_id();
if(isset($rs)){mysql_close();header("Location:imprime.php?cod=$id");}
else{mysql_close();echo "Error, intentelo nuevamente";}
?>