<!DOCTYPE html>
<html>
    <head>
        <title>Mi página</title>
        <?php include 'partials/head.php'; ?>
        <link rel="stylesheet" href="css/auth.css">
    </head>
    <body>
        <?php include 'partials/header.php'; ?>
        <main class="container">
            <form action="auth/loginUser.php" method="post">
                <h1>Inicia sesión</h1>
                <p>Empieza a compartir tus ideas y se parte de la infeccion mas grande del internet o si aun no tienes una cuenta registrate <a href="register.php">aqui</a>.</p>
                <input type="text" name="username" placeholder="usuario">
                <input type="password" name="password" placeholder="contraseña" >
                <input type="submit" name="in" value="Inicia sesion">
            </form>
        </main>
        <?php include 'partials/footer.php'; ?>
    </body>
</html>