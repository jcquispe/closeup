<?php 
	
	require('conexion.php');
	$query="SELECT * FROM libros";
	$resp= mysql_query($query);
	$tabla="";
	while ($row = mysql_fetch_assoc($resp)) {
		$tabla.="<tr>
	    			<td>{$row['nombre']}</td>
	    			<td>{$row['titulo']}</td>
	    			<td>{$row['fecha']}</td>
	    			<td><img width='40' src='{$row['imagen']}'></td>
	    			<td><a target='_blank' href=\"/imprime.php?cod={$row['id']}\">IMPRIMIR</a></td>
	    		 </tr>";
	}
	mysql_close();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilos.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
        <link rel="shortcut icon" href="/img/icono.ico"> 
        <title>LISTADO</title>
    </head>
    <body>
        <div id=banner>
            <h1 id="titbanner">LISTADO</h1>
        </div>
        <div id="msg">
            <img id="loading" src="img/loading.gif">
        </div>
        <div id="contenido">
            <input type="button" id="volver" class="jc-button" value="VOLVER">
            <br><br>
            <table id="jc-lista" class="display" cellspacing="0" width="90%">
    			<thead>
                <tr>
                    <th>AUTOR</th>
                    <th>TITULO</th>
                    <th>FECHA</th>
                    <th>IMAGEN</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tabla;?>
            </tbody>
    		</table>
        </div>
        <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    	<script type="text/javascript" src="js/lista.js"></script>
    	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    </body>
</html>