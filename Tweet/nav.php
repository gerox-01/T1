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
        <div style="padding: 5px; display: grid ;justify-content: space-around;">

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
                    <form method='post' style='margin-top: 0 !important;' >
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

            <div style="display: flex; justify-content: center;">
                <?php
                $usuario = $_SESSION['username'] ?? '';
                $datausuario  = mostrarPerfil($usuario);
                $nombre = $datausuario[0] ?? '';
                $apellido = $datausuario[1] ?? '';
                $date = $datausuario[2] ?? '';
                $tipodocumento = $datausuario[3] ?? '';
                $documento = $datausuario[4] ?? '';
                $hijos = $datausuario[5] ?? '';
                $color = $datausuario[6] ?? '';
                $user = $datausuario[7] ?? '';
                $rol = $datausuario[9] ?? '';

                if (isset($_SESSION['username'])) {
                ?>
                    <!-- Muestra nombre usuario -->
                    <div>
                        <p><?php echo '<strong>Nombre: </strong>' . $nombre ?></p>
                    </div>
                    <!-- Muestra el apellido del usuario -->
                    <div>
                        <p><?php echo '<strong>Apellido: </strong>' . $apellido ?></p>
                    </div>
                    <!-- Fecha nacimiento del usuario -->
                    <div>
                        <p><?php echo '<strong>Fecha nacimiento: </strong>' . $date ?></p>
                    </div>
                    <!-- Tipo de documento -->
                    <div>
                        <p><?php echo '<strong>Tipo de documento: </strong>' . $tipodocumento ?></p>
                    </div>
                    <!-- Numero de documento -->
                    <div>
                        <p><?php echo '<strong>Número de documento: </strong>' . $documento ?></p>
                    </div>
                    <!-- Cantidad de hijos -->
                    <div>
                        <p><?php echo '<strong>Cantidad de hijos: </strong>' . $hijos ?></p>
                    </div>
                    <!-- Color -->
                    <div>
                        <p><?php echo '<strong>Color: </strong>' . $color ?></p>
                    </div>
                    <!-- Usuario -->
                    <div>
                        <p><?php echo '<strong>Nombre de usuario: </strong>' . $user ?></p>
                    </div>
                    <!-- Tipo de usuario -->
                    <div>
                        <p><?php echo '<strong>Tipo de usuario: </strong>' . $rol ?></p>
                    </div>
                <?php
                }
                ?>

                <div>
                    <?php
                    $filef  = leerImagen($usuario);
                    if (isset($filef)) {
                        if ($filef != '') {
                            echo '<b>Foto:</b><br><img style="height:100px; width: 100px;"  src="' . $filef . '"><br><br>';
                        } else {
                            echo '';
                        }
                    } else {
                        echo "No tiene avatar.";
                    }
                    ?>
                </div>
            </div>

        </div>
    </nav>


</body>

</html>