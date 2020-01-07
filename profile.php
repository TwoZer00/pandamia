<!DOCTYPE html>
<html>
    <head>
        <title>Mi perfil</title>
        <?php include 'partials/head.php'  ?>
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="css/auth.css">
        <?php /*if(isset($_SESSION['userid'])){
                
                }
        else{
            header("Location: login.php");
        }*/
        ?>
    </head>
    <body>
        <?php include'partials/header.php' ?>
        <main class="container">
            <div class="profileMenu">
                <img src="img/logo.png" alt="Imagen de perfil">
                <div class="profileInformation">
                <?php
                    //session_start();
                    require 'db/loginDB.php';
                    $sql="SELECT users.id_user,username,email,password,f_name,l_name ,countries.langES   FROM users,countries WHERE id_user=". $_SESSION['userid'] ." AND users.id_country = countries.id_country;";
                    $conn->set_charset("utf8");
                    $result = $conn->query($sql); //objeto nuevo
                    if (!$result){//revisamos errores
                        die($conn->error);
                    }
                    $rows = $result->num_rows; //asignamos los renglones totales
                    for ($j = 0 ; $j < $rows ; ++$j){
                    $result->data_seek($j);//buscamos la inforamcion del renglon seleccionando
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    echo '<h1>'.$row['f_name'].' '.$row['l_name'].'</h1>';
                    echo '<p>'.$row['langES'].'</p>';

                }
                ?>
                </div>
            </div>
            
            <?php //include 'auth/partials/login.php'; ?>
            <?php //include 'auth/partials/register.php'; ?>
            <a href="auth/logoutUser.php">Logout</a>
            <div class="profileContent">
            </div>
        </main>
        <?php include'partials/footer.php' ?>
    </body>
</html>