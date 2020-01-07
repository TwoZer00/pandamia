<?php

if(isset($_POST['in'])){
    require '../db/loginDB.php';
    $username=$_POST['username'];
    
    $password=$_POST['password'];
    
    if(empty($username) || empty($password)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else{
        $sql="SELECT * FROM users WHERE username=?;";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){  
        header("Location: ../index.php?error=sqlerror");
        exit(); 
        }
        else{
            mysqli_stmt_bind_param($stmt, "s",$username);
            mysqli_stmt_execute($stmt);
            
            
            //$stmt->bind_result($result);
            
            $result=mysqli_stmt_get_result($stmt);
            
            if($row=mysqli_fetch_assoc($result)){
                $pswcheck= password_verify($password,$row['password']);
                
                if($pswcheck==false){
                    header("Location: ../login.php?error=wrongpwd");
                    exit(); 
                }
                else if($pswcheck==true){
                    session_start();
                    $_SESSION['userid']=$row['id_user'];
                    
                    $_SESSION['username']=$row['username'];
                    //echo $row['id_user'];
                    //echo $_SESSION['userid'];
                    header("Location: ../profile.php?login=succes");
                    exit(); 
                    
                }
                else{
                    header("Location: ../login.php?error=wrongpwd");
                    exit(); 
                }
                
            }
            else{
            header("Location: ../index.php?error=nouser");
                exit(); 
            }
        }
    }
    
    
}
else{
    header("Location: ../index.php");
    exit();
}

