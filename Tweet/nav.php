<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="styleheet" href="css/style.css">
</head>

<body>

    <?php
    session_start();
    require_once './tools.php';
    ?>

    <nav class="navbar">
        <div class="options">
            <div>
                <a href="index.php">💬 Inicio</a>
            </div>
            <div>
                <a href="login.php">🙋‍♂️ Ingresar</a>
            </div>
            <div>
                <a href="signup.php">🗳 Registrar</a>
            </div>
            <div>
                <a href="tweet.php">🐦Tweet</a>
            </div>
            <div>
                <a href="./restorepassword.php">🖊 Cambiar contraseña</a>
            </div>
            <div>
                <form method="post">
                    <input type="submit" value="Cerrar" name="exit">
                </form>
            </div>
            <div>
                <?php
                $_SESSION['username'] = $_SESSION['username'] ?? '';
                if ($_SESSION['username'] == '' || $_SESSION['username'] == null && $_SESSION['password'] == '' || $_SESSION['password'] == null) {
                    echo "<p>No estás logueado</p>";
                } else {
                    $usertype = getUserType($_SESSION['username'], $_SESSION['password']);

                    if ($usertype == '' || $usertype == null) {
                        // echo '<a href="login.php">🙋‍♂️ Ingresar</a>';
                    } else if ($usertype == 'Vendedor') {
                        echo "Es un vendedor";
                    } else {
                        echo "Es un comprador";
                    }
                }
                ?>
            </div>
            <div>
                <?php
                // $_SESSION['archivo'] = $_SESSION['archivo'] ?? '';
                $filef  = leerImagen($_SESSION['username']);
                if (isset($filef)) {

                    if ($filef != '') {
                        // echo 'sirve!!!';
                        echo '<b>Foto:</b><br><img style="height:100px; width: 100px;"  src="' . $filef . '"><br><br>';
                    } else {
                        echo '';
                    }
                } else {
                    // $foto = $_SESSION['archivo'];
                    // echo '$foto';
                    // echo "<img src=".$foto." height=200 width=300 />";
                    // echo '
                    echo "No sirve";
                }
                ?>
            </div>



            <div>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<p>Bienvenido " . $_SESSION['username'] . "</p>";
                } else {
                    echo "<p>No estás logueado</p>";
                }
                ?>
            </div>
            <?php
            if (isset($_POST['exit'])) {
                session_destroy();
                header("Location: index.php");
            }
            ?>
        </div>
    </nav>


</body>

</html>