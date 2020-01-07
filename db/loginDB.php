<?php
    $hn = 'localhost';
    $db = 'Pandamia'; //aqui pon el nombre de tu base de datos
    $un = 'leobardo'; //tu usuario en caso de que sea otro
    $pw = 'leobardo21'; //contraseña en caso de que la hayas configurado
    
    $conn = new mysqli($hn, $un, $pw, $db);
    //mysql_select_db('Pandamia', $conn);
    //mysql_query("SET NAMES 'utf8'", $conn);
    if ($conn->connect_error){//revisamos errores
        die($conn->connect_error);
    }
?>
