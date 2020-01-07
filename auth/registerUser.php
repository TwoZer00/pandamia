<?php
require '../db/loginDB.php';
$message='';

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);


$mail=mysqli_real_escape_string($conn,$_POST['mail']);

$fname=mysqli_real_escape_string($conn,$_POST['f_name']);

$lname=mysqli_real_escape_string($conn,$_POST['l_name']);

$country=mysqli_real_escape_string($conn,$_POST['country']);


 if(!empty($username) && !empty($password)){
    $_query = "INSERT INTO users (username,password,f_name,l_name,id_country,email) VALUES (?,?,?,?,?,?)";//query de SQL

    $stmt = mysqli_stmt_init($conn);
     
     if(! mysqli_stmt_prepare($stmt,$_query)){
                header("Location: ../index.php?error=sqlerror");         
                exit();
                }
     else{
         $hashPwd=password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ssssss", $username,$hashPwd,$fname,$lname,$country,$mail);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?singup=success");
                    exit();
         
     }
     
     
     
    /* 
    $result = $conn->query($_query); //objeto nuevo
    if (!$result){ //revisamos errores
        die($conn->error);
    }*/
    // Si todo sale bien, hay que avisarle al usuario
    echo "Una pelicula has sido grabada.";
    echo "<br>En 3 segundos volverás a la página anterior.";
    mysqli_close($conn);

    header( "refresh:3;url=../index.php" );

     
     /*
     
     if ($stmtm->execute()){
         $message='Connection success';
         echo "Una pelicula has sido grabada.";
         echo "<br>En 3 segundos volverás a la página anterior.";
         
    header( "refresh:3;url=index.php" );
         //revisamos errores
         //die($conn->error);
     }
     else{
         $message='Conection failed';
         
         echo "error ";
         
     }
   // Si todo sale bien, hay que avisarle al usuario*/
    
    //mysqli_close($conn);
}
else{
    echo"campos vacios";
    
    header( "refresh:3;url=../index.php" );
}

    mysqli_stmt_close($stmt);
    msqli_close($conn);





?>
