<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/styles.css">

    <title>Cambiar contraseña</title>
</head>

<body>

    <?php
    require_once('././nav.php');
    ?>

    <form method="post">
        <div class="form-register">
            <h1>Cambiar contraseña</h1>
            <div>
                <label for="password">Contraseña actual: </label>
                <input type="password" name="password" id="password" placeholder="Contraseña actual">
            </div>
            <div>
                <label for="password">Contraseña nueva: </label>
                <input type="password" name="passwordn" id="passwordn" placeholder="Contraseña nueva">
            </div>
            <div>
                <label for="confirmpassword">Confirmar contraseña: </label>
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirmar contraseña">
            </div>
            <div>
                <input type="submit" value="Cambiar contraseña">
            </div>
    </form>

    <?php
    require_once('tools.php');
    // session_start();

    $_SESSION['username'] =  $_SESSION['username'];
    $password = $_POST['password'] ?? '';
    $passwordn = $_POST['passwordn'] ?? '';
    $confirmpassword = $_POST['confirmpassword'] ?? '';

    if (isset($_POST['passwordn']) == isset($_POST['confirmpassword'])) {
            $msg = restorepassword($_SESSION['username'], $passwordn, $confirmpassword) ? "Contraseña cambiada exitosamente" : "Contraseña no cambiada";

            echo "<div class='alert'>";
            echo "<p>$msg</p>";
            echo "</div>";
    }else{
        echo "<div class='alert'>";
        echo "<p>No coinciden!</p>";
        echo "</div>";
    }
    ?>

</body>

</html>