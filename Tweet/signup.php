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
    require_once "tools.php";
    require_once './nav.php';
    LimpiarEntradas();
    // IniciarSesionSegura();
    ?>


    <?php
    #region Variables
    $name = '';
    $nameErr ='';
    $lastname = '';
    $lastnameErr = '';
    $tipodoc = '';
    $tipodocErr ='';
    $num = '';
    $email = '';
    $emailErr ='';
    $web ='';
    $webErr ='';
    $username = '';
    $usernameErr ='';
    $password = '';
    $passwordErr= '';
    $confirmpassword = '';
    $confirmpasswordErr = '';
    $fechanacimiento;
    $archivo;
    $fileDestination;
    #endregion

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
         }else {
            $name = test_input($_POST["name"]);
         }
         if (empty($_POST["lastname"])) {
            $lastnameErr = "lastname is required";
         }else {
            $lastname = test_input($_POST["lastname"]);
         }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        }else {
            $email = test_input($_POST["email"]);
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
            }
        }
        if (empty($_POST["web"])) {
            $webErr = "web is required";
         }else {
            $web = test_input($_POST["web"]);
         }
        if (empty($_POST["tipodoc"])) {
            $tipodocErr = "You must select 1 or more";
        }else {
            $tipodoc = $_POST["tipodoc"];	
        }
        if (empty($_POST["username"])) {
            $usernameErr = "username is required";
         }else {
            $username = test_input($_POST["username"]);
         }
         if (empty($_POST["password"])) {
            $passwordErr = "password is required";
         }else {
            $password = test_input($_POST["password"]);
         }
         if (empty($_POST["confirmpassword"])) {
            $confirmpasswordErr = "confirmpassword is required";
         }else {
            $confirmpassword = test_input($_POST["confirmpassword"]);
         }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['tipodoc']) && isset($_POST['num'])) {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $tipodoc = $_POST['tipodoc'];
        $num = $_POST['num'];

        if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) 
        && isset($_POST['confirmpassword']) && isset($_POST['archivo'])) {
            $archivo = $_POST['archivo'];
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
    

    <form method="post" class="form-register" id="style-5" enctype="multipart/form-data">
        <div>
            <label for="name">Nombre:</label>
            <input class="r-options" type="text" name="name" id="name" required="required"
            pattern="([A-Za-z0-9\. -]+)"title="Escriba el nombre">
        </div>
        <div>
            <label for="lastname">Apellido:</label>
            <input class="r-options" type="text" name="lastname" id="lastname" required="required" 
            pattern="([A-Za-z0-9\. -]+)"title="Escriba apellidos" >
        </div>
        <div>
            <label for="fecha">Fecha nacimiento: </label>
            <input class="r-options" type="date" name="fecha" id="fecha" required="required">
        </div>
        <div>
            <label for="tipodoc">Tipo de documento:</label>
            <select class="r-selected" name="tipodoc" id="tipodoc" required="required">
                <option value="">Seleccione una opción</option>
                <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                <option value="Cédula de extranjería">Cédula de extranjería</option>
                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
            </select>
        </div>
        <div>
            <label for="numdoc">Numero de documento:</label>
            <input class="r-options" type="text" name="numdoc" id="numdoc" required="required">
        </div>
        <div>
            <label for="archivo">Foto:</label>
            <input type="file" name="archivo" id="archivo" accept="image/*" requerid/><br><br>
        </div>
        <!-- Numero de hijos -->
        <div>
            <label for="numhijos">Numero de hijos:</label>
            <input class="r-options" type="number" name="numhijos" id="numhijos" required="required">
        </div>
        <!-- Color favorito del usuario -->
        <div>
            <label for='color'>Color favorito:</label>
            <input class="r-options" type='color' name='color' id='color' required='required'>
        </div>
        <div>
            <label for="username">Usuario:</label>
            <input class="r-options" type="text" name="username" id="username" required="required"
            pattern="^[a-z0-9_-]{3,16}$"title="Escriba usuario sin espacios y tildes, mas de 3 y menos de 13  caracteres">
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input class="r-options" type="password" name="password" id="password" required="required"
            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
            title="más de 8 caracteres, 1 minuscula, mayuscula, número y caracter especial">
        </div>
        <div>
            <label for="confirmpassword">Confirmar contraseña:</label>
            <input class="r-options" type="password" name="confirmpassword" id="confirmpassword" required="required"
            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
            title="más de 8 caracteres, 1 minuscula, mayuscula, número y caracter especial" >
        </div>
        <div>
            <label for="usertype">Tipo de usuario: </label>
            <select name="usertype" id="usertype" required="required">
                <option value="">Seleccione un tipo de usuario</option>
                <option value="Vendedor">Vendedor</option>
                <option value="Comprador">Comprador</option>
            </select>
        </div>
        <input type="submit" name="btnRegistrar" value="Registrarse" class='button-r'>
    </form>

    <?php

    #region CargarImagen
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


    #region TipodeUsuario
    if(isset($_POST['usertype'])){
        $usertype = $_POST['usertype'];
        if($usertype == 'Vendedor'){
            $usertype = 'Vendedor';
        }else if($usertype == 'Comprador'){
            $usertype = 'Comprador';
        }

        $_SESSION['usertype'] = $usertype;
    }
    #endregion

    #region GuardarDatos
    if (isset($_POST['name'])) {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['lastname'] =  $_POST['lastname'];
        $_SESSION['fecha'] =  $_POST['fecha'];
        $_SESSION['tipodoc'] =  $_POST['tipodoc'];
        $_SESSION['numdoc'] =  $_POST['numdoc'];
        $_SESSION['numhijos'] =  $_POST['numhijos'];
        $_SESSION['color'] =  $_POST['color'];
        $_SESSION['username'] =  $_POST['username'];
        $_SESSION['password'] =  $_POST['password'];
        $_SESSION['confirmpassword'] =  $_POST['confirmpassword'];
        $_SESSION['usertype'] =  $_POST['usertype'];

    
        if($_POST['password'] == $_POST['confirmpassword']){
            loadImage();
            grabarUsuario($_SESSION['name'], $_SESSION['lastname'], 
            $_SESSION['fecha'], $_SESSION['tipodoc'], $_SESSION['numdoc'],  
            $_SESSION['numhijos'], $_SESSION['color'], $_SESSION['username'], 
            $_SESSION['password'], $_SESSION['usertype'], $_SESSION['archivo']);
        }else{
            echo "<p style='color:red;'>Las contraseñas no coinciden</p>";
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