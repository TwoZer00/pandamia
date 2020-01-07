<?php
$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
    include '../zi/addPost.php';
} else{
    header("Location: ../zi.php");
    echo "There was an error uploading the file, please try again!";
}