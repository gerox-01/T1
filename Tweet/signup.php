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
    $nameErr = '';
    $lastname = '';
    $lastnameErr = '';
    $tipodoc = '';
    $tipodocErr = '';
    $num = '';
    $email = '';
    $emailErr = '';
    $web = '';
    $webErr = '';
    $username = '';
    $usernameErr = '';
    $password = '';
    $passwordErr = '';
    $confirmpassword = '';
    $confirmpasswordErr = '';
    $fechanacimiento;
    $archivo;
    $fileDestination;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }
        if (empty($_POST["lastname"])) {
            $lastnameErr = "lastname is required";
        } else {
            $lastname = test_input($_POST["lastname"]);
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);

            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["web"])) {
            $webErr = "web is required";
        } else {
            $web = test_input($_POST["web"]);
        }
        if (empty($_POST["tipodoc"])) {
            $tipodocErr = "You must select 1 or more";
        } else {
            $tipodoc = $_POST["tipodoc"];
        }
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
        if (empty($_POST["confirmpassword"])) {
            $confirmpasswordErr = "confirmpassword is required";
        } else {
            $confirmpassword = test_input($_POST["confirmpassword"]);
        }
    }
    function test_input($data)
    {
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
            && isset($_POST['confirmpassword'])  && isset($_POST['archivo'])) {
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
        } 
        else {
            $display = '<p>No se han completado todos los campos</p>';
        }
    }
    ?>


    <!-- <form action="signup.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">UPLOAD</button>
    </form> -->

    <form method="post" class="form-register" id="style-5" enctype="multipart/form-data">
        <div>
            <label for="archivo">Foto:</label>
            <input type="file" name="archivo" id="archivo" accept="image/*" requerid/><br><br>
        </div>
        <div>
            <label for="name">Name:</label>
            <input class="r-options" type="text" name="name" id="name" required="required" pattern="([A-Za-z0-9\. -]+)" title="Escriba el nombre">
        </div>
        <div>
            <label for="lastname">Lastname:</label>
            <input class="r-options" type="text" name="lastname" id="lastname" required="required" pattern="([A-Za-z0-9\. -]+)" title="Escriba apellidos">
        </div>
        <div>
            <label for="fecha">Fecha nacimiento: </label>
            <input class="r-options" type="date" name="fecha" id="fecha" required="required">
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
            <label for="numdoc">Numero de documento:</label>
            <input class="r-options" type="text" name="numdoc" id="numdoc" required="required">
        </div>
        <div>
            <label for='color'>Color favorito:</label>
            <input class="r-options" type='color' name='color' id='color' required='required'>
        </div>
        <div>
            <label for="email">Correo:</label>
            <input class="r-options" type="email" name="email" id="email" required="required" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" title="Escriba correo correctamente">
        </div>
        <div>
            <label for="web">Portal web:</label>
            <input class="r-options" type="url" name="web" id="web" required="required" pattern="[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)" title="Escriba url correctamente">
        </div>
        <div>
            <label for="username">Username:</label>
            <input class="r-options" type="text" name="username" id="username" required="required" pattern="^[a-z0-9_-]{3,16}$" title="Escriba usuario sin espacios y tildes, mas de 3 y menos de 13  caracteres">
        </div>
        <div>
            <label for="password">Password:</label>
            <input class="r-options" type="password" name="password" id="password" required="required" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" title="más de 8 caracteres, 1 minuscula, mayuscula, número y caracter especial">
        </div>
        <div>
            <label for="confirmpassword">Confirm Password:</label>
            <input class="r-options" type="password" name="confirmpassword" id="confirmpassword" required="required" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" title="más de 8 caracteres, 1 minuscula, mayuscula, número y caracter especial">

        </div>
        <div>
            <label for="usertype">Tipo de usuario: </label>
            <select name="usertype" id="usertype" required="required">
                <option value="">Seleccione un tipo de usuario</option>
                <option value="sale">Vendedor</option>
                <option value="buy">Comprador</option>
            </select>
        </div>
        <input type="submit" name="btnRegistrar" value="Register" class='button-r'>
    </form>

    <?php
    require_once "tools.php";

    if(isset($_POST['btnRegistrar']) )
        {
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
                        // $_SESSION['archivo'] =  '../uploaded_files/'.$archivo;
                        echo '<script>alert("Usuario Registrado")</script>';
                        echo '<script>window.location.href="index.php"; </script>';
                    }
                    else {
                        echo '<script>alert("Error. credenciales incorrectas")</script>';
                    }
                }
            }
        }
   

    if (isset($_POST['usertype'])) {
        $usertype = $_POST['usertype'];
        if ($usertype == 'sale') {
            $usertype = 'Vendedor';
        } else if ($usertype == 'buy') {
            $usertype = 'Comprador';
        }

        $_SESSION['usertype'] = $usertype;
    }

    if (isset($_POST['name'])) {
        $_SESSION['username'] =  $_POST['username'];
        $_SESSION['password'] =  $_POST['password'];

        $_SESSION['name'] =  $_POST['name'];
        $_SESSION['lastname'] =  $_POST['lastname'];
        $_SESSION['fecha'] =  $_POST['fecha'];
        $_SESSION['color'] =  $_POST['color'];
        $_SESSION['email'] =  $_POST['email'];
        $_SESSION['web'] =  $_POST['web'];
        $_SESSION['tipodoc'] =  $_POST['tipodoc'];
       

        if ($_POST['password'] == $_POST['confirmpassword']) {
            grabarUsuario($_SESSION['username'], $_SESSION['password'], 
            $_SESSION['name'], $_SESSION['lastname'], $_SESSION['fecha'], 
            $_SESSION['color'], $_SESSION['email'], $_SESSION['web'], $_SESSION['tipodoc'], 
            $_SESSION['usertype'], $_SESSION['archivo']);
            // header("Location: login.php");
            
        } else {
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