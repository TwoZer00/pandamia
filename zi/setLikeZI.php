<?php
session_start();
require '../db/loginDB.php';

if(!isset($_SESSION['userid'])){
    echo 'nouser';
}
else{

    $idIz = $_REQUEST['id'];
    $idUser = $_SESSION['userid'];

    if(empty($idIz)){
        echo 'nofoundid';
    }
    else{
        $query = "INSERT INTO likes(id_like,id_user,id_iz) VALUES ('','$idUser', '$idIz')";
        $query1 = "SELECT * from likes where id_user = '$idUser' and id_iz = '$idIz'";
        $resultt = $conn->query($query1);
        if(mysqli_num_rows($resultt)==0){
            $result = $conn->query($query);
            if(!$result){
                die($conn->error);
            }
            else{
                mysqli_close($conn);
                echo 'Hecho';
                //header("Location: ../zi.php");
            }
        }
        else{
            $removeQ = "delete from likes where id_user = '$idUser' and id_iz = '$idIz'";
            $result = $conn->query($removeQ);
            if(!$result){
                die($conn->error);
            }
            else{
                mysqli_close($conn);
            }
            echo "removed";
        }
    }
}





exit();
