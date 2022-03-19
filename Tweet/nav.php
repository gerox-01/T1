<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="styleheet" href="css/styles.css">
</head>

<body>

    <?php
    require_once './tools.php';
    IniciarSesionSegura();

    $usert = '';
    ?>

    <nav class="navbar">
        <div style="padding: 5px; display: grid;justify-content: space-around;">

            <div style=" display: flex; flex-direction: row; justify-content: center;  align-items: center;  margin-top: 10px;">
                <?php
                if (isset($_SESSION['username']) && isset($_SESSION['password']) && $_SESSION['username'] != "") {
                    echo "<div>
                    <a href='index.php'>💬 Inicio</a>
                </div>
                <div>
                    <a href='tweet.php'>🐦Tweet</a>
                </div>
                <div>
                    <a href='perfil.php'>🔎 Perfil</a>
                </div>
                <div>
                    <a href='./restorepassword.php'>🖊 Cambiar contraseña</a>
                </div>
                <div>
                    <form method='post'>
                        <input type='submit' style='border: 5px solid #0000; cursor: pointer; ' value='🔓 Salir' name='exit' id='exit'>
                    </form>
                </div>";
                } else {
                    echo "
                    <div>
                        <a href='login.php'>🙋‍♂️ Ingresar</a>
                    </div>
                    <div>
                        <a href='signup.php'>🗳 Registrar</a>
                    </div>";
                }

                if (isset($_POST['exit'])) {
                    session_destroy();
                    header("Location: index.php");
                }
                ?>
            </div>

            <div>
                <?php
                $_SESSION['username'] = $_SESSION['username'] ?? '';

                #region UserType
                if ($_SESSION['username'] == '' || $_SESSION['username'] == null && $_SESSION['password'] == '' || $_SESSION['password'] == null) {
                    echo "";
                } else {
                    $usertype = getUserType($_SESSION['username'], $_SESSION['password']);

                    if ($usertype == '' || $usertype == null) {
                        echo "Ups";
                    } else if ($usertype == 'Vendedor') {
                        echo  $_SESSION['username']  . " es vendedor";
                    } else if ($usertype == 'Comprador') {
                        echo $_SESSION['username'] . " es comprador";
                    } else {
                        echo "Hola";
                    }
                }
                #endregion

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
                        echo 'NO SIRVEEE!! :(';
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

        </div>
    </nav>


</body>

</html>