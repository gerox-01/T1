<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">

    <title>Perfil</title>
</head>

<body>
    <?php
    require_once('./tools.php');
    require_once('./nav.php');

    LimpiarEntradas();

    $user = $_SESSION['username'];
    $data = mostrarPerfil($user);
    ?>
    
    <!-- Actualizar el perfil -->
    <h1>Actualizar perfil</h1>
    <form action="perfil.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $data[0]; ?>">
        <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $data[1]; ?>">
        <input type="date" name="fecha" placeholder="Fecha de nacimiento" value="<?php echo $data[2]; ?>">
        <select class="r-selected" name="tipodoc" id="tipodoc" required="required">
            <option value="<?php echo $data[3]; ?>"><?php echo $data[3]; ?></option>
            <option value="CC">Cédula de ciudadanía</option>
            <option value="CE">Cédula de extranjería</option>
            <option value="TI">Tarjeta de identidad</option>
        </select>
        <!-- <input type="text" name="tipo" placeholder="Tipo de documento" value="<?php echo $data[3]; ?>"> -->
        <input type="text" name="documento" placeholder="Número de documento" value="<?php echo $data[4]; ?>">
        <input type="text" name="hijos" placeholder="Numero de hijos" value="<?php echo $data[5]; ?>">
        <input type="color" name="color" placeholder="Color favorito" value="<?php echo $data[6]; ?>">
        <input type="text" name="usuario" placeholder="Usuario" value="<?php echo $data[7]; ?>">
        <!-- <input type="password" name="contrasena" placeholder="Contraseña" value="<?php echo $data[8]; ?>"> -->
        <select name="usertype" id="usertype" required="required">
            <option value="<?php echo $data[9]; ?>"><?php echo $data[9]; ?></option>
            <option value="Vendedor">Vendedor</option>
            <option value="Comprador">Comprador</option>
        </select>
        <!-- <input type="text" name="rol" placeholder="Rol" value="<?php echo $data[9]; ?>"> -->
        <input type="submit" name="actualizar" value="Actualizar">
    </form>

    <?php
    if (isset($_POST['actualizar'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fecha = $_POST['fecha'];
        $tipodoc = $_POST['tipodoc'];
        $documento = $_POST['documento'];
        $hijos = $_POST['hijos'];
        $color = $_POST['color'];
        $usuario = $_POST['usuario'];
        $usertype = $_POST['usertype'];

        if(actualizarPerfil($nombre, $apellidos, $fecha, $tipodoc, $documento, $hijos, $color, $usuario, $usertype, $user)){
            echo '<script>alert("Perfil actualizado correctamente")</script>';
        } else {
            echo '<script>alert("Error al actualizar el perfil")</script>';
        }
    }
    ?>
</body>

</html>