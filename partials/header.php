<header class="container">
    <img src="img/logo.png" alt="logo">
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="zi.php">Zona de infección</a></li>
            <li><a href="foro.php">Foro</a></li>
            <li><a href="post.php">Publicaciones</a></li>
            <?php
            session_start();
            if(isset($_SESSION['userid'])){
                echo '<li id="profile"><a href="profile.php">'.$_SESSION['username'].'</a>';
                echo '</li>';
            }
            else{
                echo '<li><a href="login.php">Iniciar sesion</a></li>'.'<li><a href="register.php">Registrarse</a></li>';
            }
            ?>
            
        </ul>
    </nav>
</header>