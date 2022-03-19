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
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $data[0]; ?>">
        <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $data[1]; ?>">
        <input type="date" name="fecha" placeholder="Fecha de nacimiento" value="<?php echo $data[2]; ?>">
        <select class="r-selected" name="tipodoc" id="tipodoc" required="required">
            <option value="<?php echo $data[3]; ?>"><?php echo $data[3]; ?></option>
            <option value="CC">Cédula de ciudadanía</option>
            <option value="CE">Cédula de extranjería</option>
            <option value="TI">Tarjeta de identidad</option>
        </select>
        <input type="text" name="documento" placeholder="Número de documento" value="<?php echo $data[4]; ?>">
        <input type="file" name="archivo" id="archivo" accept="image/*">
        <input type="text" name="hijos" placeholder="Numero de hijos" value="<?php echo $data[5]; ?>">
        <input type="color" name="color" placeholder="Color favorito" value="<?php echo $data[6]; ?>">
        <select name="usertype" id="usertype" required="required">
            <option value="<?php echo $data[9]; ?>"><?php echo $data[9]; ?></option>
            <option value="Vendedor">Vendedor</option>
            <option value="Comprador">Comprador</option>
        </select>
        <input type="submit" name="actualizar" value="Actualizar">
    </form>

    <?php
    if (isset($_POST['actualizar'])) {
        
        #region Foto
        function loadImage(){
            $archivo = $_FILES['archivo']['name'];
            if(isset($archivo) && $archivo != ""){
                $tipo = $_FILES['archivo']['type'];
                $tamano = $_FILES['archivo']['size'];
                $temp = $_FILES['archivo']['tmp_name'];
                
                $fileExt = explode('.', $archivo);
                $fileActualExt = strtolower(end($fileExt));
    
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                    echo '<script>alert("Error. La extensión o el tamaño de los archivos no es correcta")</script>';
                }
                else {
                    //Imagen concuerda, Entra
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../uploaded_files/'.$fileNameNew;
                    if (move_uploaded_file($temp, $fileDestination)) {
                        //Permisos
                        $_SESSION['archivo'] =  $fileDestination;
                        echo '<script>alert("Usuario Registrado")</script>';
                        echo '<script>window.location.href="index.php"; </script>';
                    }
                    else {
                        echo '<script>alert("Error. credenciales incorrectas")</script>';
                    }
                }
            }
        }
        #endregion

        #region Actualización datos
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fecha = $_POST['fecha'];
        $tipodoc = $_POST['tipodoc'];
        $documento = $_POST['documento'];
        $hijos = $_POST['hijos'];
        $color = $_POST['color'];
        $usertype = $_POST['usertype'];
        $usuario = $_SESSION['username'];
        #endregion
        loadImage();

        if(actualizarPerfil($nombre, $apellidos, $fecha, $tipodoc, $documento, $_SESSION['archivo'], $hijos, $color, $usertype, $usuario)){
            echo '<script>alert("Perfil actualizado correctamente")</script>';
        } else {
            echo '<script>alert("Error al actualizar el perfil")</script>';
        }
    }
    ?>
</body>

</html>