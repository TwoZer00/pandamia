<form action="auth/registerUser.php" method="post">
   <h1>Registrarte</h1>
   <p>Crear una cuenta para poder compartir ideas y ser parte de esta; la infeccion mas grande de internet.</p>
    <input type="text" name="username" placeholder="usuario">
    <input type="mail" name="mail" placeholder="correo">
    <input type="password" name="password" placeholder="contraseña">
    <input type="text" name="f_name" placeholder="Nombre/s">
    <input type="text" name="l_name" placeholder="Apellido/s">
    <?php require 'partials/countries.php'; ?>
    <input type="submit" value="registrarse">
</form>