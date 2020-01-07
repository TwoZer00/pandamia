<!DOCTYPE html>
<html>
    <head>
        <title>Zona de infeccion</title>
        <?php include 'partials/head.php'; ?>
        <link rel="stylesheet" href="css/zi.css">
        <script src="js/zi_actions.js"></script>
    </head>
    <body>
        <?php include 'partials/header.php'; ?>
        <main class="container">
            <div class="input">
                <!--<form action="zi/addPost.php" method="post">
                    <input type="text" name="title" placeholder="Titulo">
                    <input type="textarea" name="content" placeholder="Contenido">
                    <input type="text" name="img" placeholder="link">
                    <input type="file" name="img" disabled >
                    <input type="submit" value="Subir">
                </form>
                -->
                <?php include 'uploadTest/uploadTabs.html' ?>   
            </div>
            
            <div class="zi">
                <?php require_once 'db/loginDB.php';
                    require_once 'zi/getLikes.php';
                    $likes = new likes();
                    $query = "SELECT id_iz,users.username,title,content,image,date FROM infection_zone INNER JOIN users ON infection_zone.id_user= users.id_user ORDER BY `infection_zone`.`date` DESC";
                    $result = $conn->query($query);
                    if(!$result){
                        die($conn->error);
                    }
                    $rows = $result->num_rows;
                    for($j = 0; $j<$rows; ++$j){
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        $date = new DateTime($row['date']);
                        $today = new DateTime();
                        if(!empty($_SESSION['userid'])){
                        $numLikes = $likes->getLikesByPerson($_SESSION['userid'],$row['id_iz']);}
                        echo '<section class="item">';
                        echo '<h1>'.$row['title'].'</h1>'.
                             '<h2>'.$row['username'].'</h2>';
                        //echo '<p>'.$date->diff($today).'</p>';
                        if((int)($date->diff($today)->format("%y"))>0){
                            echo "<a href='javascript:void(0)' title=".$row['date']."><p>".$date->diff($today)->format("%y years ago").'</p></a>';
                        }
                        elseif((int)($date->diff($today)->format("%m"))>0){
                           echo "<a href='javascript:void(0)' title=".$row['date']."><p>".$date->diff($today)->format("%m months ago").'</p></a>';
                        }
                        elseif((int)($date->diff($today)->format("%d"))>0){
                            echo "<a href='javascript:void(0)' title=".$row['date']."><p>".$date->diff($today)->format("%d days ago").'</p></a>';
                        }
                        elseif((int)($date->diff($today)->format("%G"))>0){
                            echo "<a href='javascript:void(0)' title=".$row['date']."><p>".$date->diff($today)->format("%G hours ago").'</p></a>';
                        }
                        elseif((int)($date->diff($today)->format("%i"))>0){
                            echo "<a href='javascript:void(0)' title=".$row['date']."><p>".$date->diff($today)->format("%i minutes ago").'</p></a>';
                        }
                        else{
                            echo "<a href='javascript:void(0)' title=".$row['date']."><p>".$date->diff($today)->format("%s seconds ago").'</p></a>';
                        }
                        //echo '<p>'.$date->diff($today)->format("%y years,%m months, %d days, %h hour and %i minutes ago").'</p>';
                        echo '<p>'.$row['content'].'</p>';
                        if($row['image'][0]=="u"){
                             echo '<img src="uploadTest/'.$row['image'].'" alt="Imagen no encontrada">';
                        }else{
                        echo '<img src="'.$row['image'].'" alt="Imagen no encontrada">';
                            }
                        echo '<section class="interactions">';
                        if($numLikes!=0){
                            echo '<a  id="like" onclick="like('.$row['id_iz'].',this)" style="background:#000; color:#fff;" >Me gusta '.$likes->getLikes($row['id_iz']).'</a>';
                        }
                        else{
                             echo '<a id="like" onclick="like('.$row['id_iz'].',this)" >Me gusta '.$likes->getLikes($row['id_iz']).'</a>';
                        }
                        echo '<a onclick="share('.$row['id_iz'].')">Compartir</a>
                        <a href="#">Comentar</a>
                    </section>';
                        echo '</section>';
                        
                    }
                ?>
            </div>
            <!-- The Modal -->
            <div id="alert" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <span class="close" onclick="CloseBox()">&times;</span>
                <p>Necesitas inicar sesion</p>

              </div>

            </div>
        </main>
        <script>
            /*function CloseBox(){
                console.log("Lol");
                document.getElementById("alert").style.display="none";
            }*/
        </script>
        <footer>
            <?php include 'partials/footer.php'; ?>
        </footer>
    </body>
</html>