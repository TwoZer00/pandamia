<?php
    header("Content-Type: text/html;charset=UTF-8");
    require 'db/loginDB.php';
        //mysql_query("set langES 'utf8'");
        $_query = "SELECT id_country,langES FROM `countries`
        ";//query de SQL
        $conn->set_charset("utf8");
        $result = $conn->query($_query); //objeto nuevo
        if (!$result){//revisamos errores
            die($conn->error);
        }
        $rows = $result->num_rows; //asignamos los renglones totales
        echo '<select name="country">';
        for ($j = 0 ; $j < $rows ; ++$j){
            $result->data_seek($j);//buscamos la inforamcion del renglon seleccionando
            $row = $result->fetch_array(MYSQLI_ASSOC);
           
            echo '<option value=' . $row['id_country'] . '>';
            echo $row['langES'];
            echo '</option>';
            

        }
echo '</select>';
?>