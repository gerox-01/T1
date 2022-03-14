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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["username"])) {
            $usernameErr = "username is required";
        } else {
            $username = test_input($_POST["username"]);
        }
        if (empty($_POST["password"])) {
            $passwordErr = "password is required";
        } else {
            $password = test_input($_POST["password"]);
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>



    <?php
    require_once('./nav.php');
    ?>

    <div class="formulario">
        <form method="post" action="">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required="required" placeholder="Digite usuario" pattern="^[a-z0-9_-]{3,16}$" title="Escriba usuario sin espacios y tildes, mas de 3 y menos de 13  caracteres">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required="required" placeholder="Digite contraseña" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" title="más de 8 caracteres, 1 minuscula, mayuscula, número y caracter especial">
            </div>
            <button name="send" value="send">Enviar</button>
        </form>
        <?php
        require_once('./tools.php');

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $msg = leerUsuario($_POST['username'], $_POST['password']) ? header("Location: index.php") : "Usuario y clave incorrectos";
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];            
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