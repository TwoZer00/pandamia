<?php
session_start();
require '../db/loginDB.php';
$content = mysqli_real_escape_string($conn,$_POST['content']);
$title = mysqli_real_escape_string($conn,$_POST['title']);
$urlImagen = mysqli_real_escape_string($conn,$_POST['img']);
$type = mysqli_real_escape_string($conn,$_POST['fcomputer']);
if(!(empty($title) && empty($urlImagen) && empty($_SESSION['userid'])) && empty($type)){
    $id_user = $_SESSION['userid'];
    $date = date('Y/m/d H:i:s');
    $query = "INSERT INTO infection_zone(id_iz,id_user,title,content,date,image,id_comment) VALUES ('','$id_user', '$title','$content','$date','$urlImagen','')";
    $result = $conn->query($query);
    if(!$result){
        die($conn->error);
    }
    else{
        mysqli_close($conn);
        header("Location: ../zi.php");
    }
}
else{
    $id_user = $_SESSION['userid'];
    $date = date('Y/m/d H:i:s');
    $query = "INSERT INTO infection_zone(id_iz,id_user,title,content,date,image,id_comment) VALUES ('','$id_user', '$title','$content','$date','$target_path','')";
    $result = $conn->query($query);
    if(!$result){
        die($conn->error);
    }
    else{
        mysqli_close($conn);
        header("Location: ../zi.php");
    }
}
exit();