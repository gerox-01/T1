<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/styles.css">

    <title>Log in</title>
</head>

<body>

    <?php
    require_once('./nav.php');
    ?>

    <div class="formulario">
        <form method="post" action="">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required="required" placeholder="Digite usuario">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required="required" placeholder="Digite contraseña">
            </div>
            <button name="send" value="send">Enviar</button>
        </form>
        <?php
        require_once('./tools.php');
        iniciarSesion();

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $msg = leerUsuario($_POST['username'], $_POST['password']) ? header("Location: tweet.php") : "Usuario y clave incorrectos";
            $_SESSION['username'] = $_POST['username'];
            echo "<div class='alert'>";
            echo "<p>$msg</p>";
            echo "</div>";
        } else {
            // echo "<p>No se ha enviado ningún dato</p>";
        }
        ?>
    </div>



    <footer class="i-footer">
        <p>&copy; T1</p>
        <div class="i-divfotter">
            <p class="i-integrantes">Integrantes: </p>
            <p>David Quiroga |</p>
            <p>| Alejandro Monroy</p>
        </div>
    </footer>
</body>

</html>