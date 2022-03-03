<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">

    <title>Signup</title>
</head>

<body>

    <?php
    require_once './nav.php';
    ?>


    <?php
    $name = '';
    $lastname = '';
    $tipodoc = '';
    $num = '';
    $email = '';
    $username = '';
    $password = '';
    $confirmpassword = '';
    $fechanacimiento;

    if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['tipodoc']) && isset($_POST['num'])) {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $tipodoc = $_POST['tipodoc'];
        $num = $_POST['num'];

        if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmpassword'])) {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];

            if (empty($password) && empty($confirmpassword)) {
                $display = '<p>Las contraseñas no pueden estar vacías.</p>';
            } else {
                if ($password == $confirmpassword) {
                    $display = '<p>El usuario se ha registrado correctamente</p>';
                } else {
                    $display = '<p>Las contraseñas no coinciden</p>';
                }
            }
        } else {
            $display = '<p>No se han completado todos los campos</p>';
        }
    }
    ?>

    <form method="post" class="form-register" id="style-5">
        <div>
            <label for="name">Name:</label>
            <input class="r-options" type="text" name="name" id="name" required="required">
        </div>
        <div>
            <label for="lastname">Lastname:</label>
            <input class="r-options" type="text" name="lastname" id="lastname" required="required" >
        </div>
        <div>
            <label for="fecha">Fecha nacimiento: </label>
            <input class="r-options" type="date" name="fecha" id="fecha" required="required">
        </div>
        <div>
            <label for='color'>Color favorito:</label>
            <input class="r-options" type='color' name='color' id='color' required='required'>
        </div>
        <div>
            <label for="email">Correo:</label>
            <input class="r-options" type="email" name="email" id="email" required="required" >
        </div>
        <div>
            <label for="web">Portal web:</label>
            <input class="r-options" type="url" name="web" id="web" required="required">
        </div>
        <div>
            <label for="tipodoc">Tipo de documento:</label>
            <select class="r-selected" name="tipodoc" id="tipodoc" required="required">
                <option value="">Seleccione una opción</option>
                <option value="CC">Cédula de ciudadanía</option>
                <option value="CE">Cédula de extranjería</option>
                <option value="TI">Tarjeta de identidad</option>
            </select>
        </div>
        <div>
            <label for="username">Username:</label>
            <input class="r-options" type="text" name="username" id="username" required="required">
        </div>
        <div>
            <label for="password">Password:</label>
            <input class="r-options" type="password" name="password" id="password" required="required">
        </div>
        <div>
            <label for="confirmpassword">Confirm Password:</label>
            <input class="r-options" type="password" name="confirmpassword" id="confirmpassword" required="required">
        </div>
        <input type="submit" name="btnRegistrar" value="Register" class='button-r'>
    </form>

    <?php
    require_once "tools.php";
    session_start();
    if (isset($_POST['name'])) {
        $_SESSION['username'] =  $_POST['username'];
        $_SESSION['password'] =  $_POST['password'];
        if($_POST['password'] == $_POST['confirmpassword']){
            grabarUsuario($_SESSION['username'], $_SESSION['password']);
            header("Location: login.php");
        }else{
            echo "Las contraseñas no coinciden";
        }
    }
    ?>

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