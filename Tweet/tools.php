<?php

/**
 * Iniciar la sesión
 * Authored by: David Quiroga and Alejandro Monroy
 * */
function iniciarSesion()
{
    session_start();
}

/** 
 *    Grabar usuario y clave
 *    Authored by: David Quiroga and Alejandro Monroy
 *    @param $usuario: nombre de usuario
 *    @param $clave: clave del usuario
 */
function grabarUsuario($name, $lastname, $fecha, $tipodoc, $numdoc, $numhijos, $color, $username, $password, $usertype, $fileDestination)
{

    // a = append = agregar al final
    // w = write = sobreescribir
    // r = read = leer

    $encryptPass = encriptarPassword($password);

    $file = "usuario.txt";
    $texto = $name . ":" . $lastname . ":" . $fecha . ":" . $tipodoc . ":" . $numdoc . ":" . $numhijos . ":" . $color . ":" . $username . ":" . $encryptPass . ":" . $usertype . ":" . $fileDestination . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
}

/**
 * Retornar el tipo de usuario
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $usuario: nombre de usuario
 * @param $clave: clave del usuario
 * @return $usertype: tipo de usuario
 */
function getUserType($usuario)
{

    $file = "usuario.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $usuarios = explode("\n", $texto);

    $usertype = "";
    if ($usuario == "" || $usuario == null) {
    } else {
        foreach ($usuarios as $u) {
            $user = explode(":", $u);
            $username = $user[7] ?? "";
            if ($username == $usuario) {
                $usertype = $user[9];
            }
        }
    }

    if ($usertype == "") {
        $usertype = "No existe el usuario";
    }

    return $usertype;
}

/** *
 *   Leer usuario y clave en $_SESSION
 *   Authored by: David Quiroga and Alejandro Monroy
 *   @param $usuario: nombre de usuario
 *   @param $clave: clave del usuario
 *   @return true si el usuario y clave existen en el archivo
 */
function leerUsuario($usuario, $clave)
{
    //Archivo
    $file = "usuario.txt";
    //Abrir archivo
    $fp = fopen($file, "r");
    //Leer archivo
    $texto = fread($fp, filesize($file));

    //Explode = separa
    $usuarios = explode("\n", $texto);
    foreach ($usuarios as $u) {
        $usuS = explode(":", $u);
        $usua = $usuS[7] ?? "";
        if ($usua == $usuario && $usuS[8] == $clave) {
            return True;
        }
    }

    return False;
}


/**
 * Guardar el tweet en el archivo
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $usuario: nombre de usuario
 * @param $tweet: tweet del usuario
 * @return void
 */
function grabarTweet($usuario, $tweet, $fecha)
{
    $file = "tweet.txt";
    $texto = $usuario . ":" . $tweet . ":" . $fecha . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
}

/**S
 * Leer el tweet del archivo
 * Authored by: David Quiroga and Alejandro Monroy
 * @return array con los tweets
 */
function leerTweet()
{
    $file = "tweet.txt";
    $fp = fopen($file, "r");
    $fs = filesize($file);


    if ($fs > 0) {
        $texto = fread($fp, filesize($file));
        $tweets = explode("\n", $texto);

        fclose($fp);
        return $tweets;
    } else {
        return 'Hola';
    }
}

/**
 * Leer la imagen
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $user: nombre del usuario
 * @return string con el nombre de archivo
 */
function leerImagen($user)
{
    //Archivo
    $file = "usuario.txt";
    //Abrir archivo
    $fp = fopen($file, "r");
    //Leer archivo
    $texto = fread($fp, filesize($file));
    $filef = "";

    //Explode = separa
    $usuarios = explode("\n", $texto);
    foreach ($usuarios as $u) {
        $usuS = explode(":", $u);
        $useri = $usuS[7] ?? "";
        if ($useri == $user) {

            if (!isset($usuS[10])) {
                $filef = '';
                return $filef;
            } else {

                $filef = $usuS[10];
            }
        }
    }

    return $filef;
}


/**
 * Restore password
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $claveactual: nombre de usuario
 * @param $clavenueva: clave del usuario
 * @return true si el usuario y clave existen en el archivo 
 */
function restorepassword($usuario, $clavenueva, $confirmpassword)
{
    $file = "usuario.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $usuarios = explode("\n", $texto);
    foreach ($usuarios as $u) {
        $usuS = explode(":", $u);
        $username = $usuS[7] ?? "";
        if ($username == $usuario) {
            if ($confirmpassword == $clavenueva) {
                $claveactual = $usuS[8] ?? "";
                $encryptPass = encriptarPassword($clavenueva);
                $usuS[8] = str_replace($usuario, $claveactual, $encryptPass);
                $texto2 = $usuS[0] . ":" . $usuS[1] . ":" . $usuS[2] . ":" . $usuS[3] . ":" . $usuS[4] . ":" . $usuS[5] . ":" . $usuS[6] . ":" . $username . ":" . $usuS[8] . ":" . $usuS[9] . ":" . $usuS[10] . "\n";
                $textot = str_replace($u, $texto2, $texto);
                $fp = fopen($file, "w");
                fwrite($fp, $textot);
                fclose($fp);

                return True;
            } else {
                return False;
            }
        }
    }

    return False;
}


/**
 * Eliminar un tweet
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $usuario: nombre de usuario
 * @param $tweet: tweet del usuario
 * @return void
 */
function eliminarTweet($usuario, $tweet, $fecha)
{
    // Eliminar el registro que corresponde con el usuario y tweet
    $file = "tweet.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    fclose($fp);

    $texto = str_replace($usuario . ":" . $tweet . ":" . $fecha . "\n", "", $texto);

    $fp = fopen($file, "w");
    fwrite($fp, $texto);
    fclose($fp);
}

/**
 * Limpiar Cadena de texto para evitar inyecciones
 * Authored by: David Quiroga and Alejandro Monroy
 */
function LimpiarCadena($cadena)
{
    $patron = array('/<script>.*<\/script>/');
    $cadena = preg_replace($patron, '', $cadena);
    $cadena = htmlspecialchars($cadena);
    return $cadena;
}

/**
 * Limpiar entradas de texto utilizando la funcion limpiar cadena de texto
 * Authored by: David Quiroga and Alejandro Monroy
 */
function LimpiarEntradas()
{
    if (isset($_POST)) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = LimpiarCadena($value);
        }
    }
}

/**
 * Iniciar sesión segura con Cookies
 * Authored by: David Quiroga and Alejandro Monroy
 */
function IniciarSesionSegura()
{

    //Obtener los parametros de la cookie de sesión
    $cookieParams = session_get_cookie_params();
    $path = $cookieParams['path'];

    //Inicio y control de la sesión
    $secure = false;
    $httponly = true;
    $samesite = 'strict';

    session_set_cookie_params([
        'lifetime' => $cookieParams['lifetime'],
        'path' => $path,
        'domain' => $_SERVER['HTTP_HOST'],
        'secure' => $secure,
        'httponly' => $httponly,
        'samesite' => $samesite
    ]);

    session_start();
    session_regenerate_id(true);
}


/**
 * Mostrar datos de perfil del usuario
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $usuario: nombre de usuario
 * @return array con los datos del usuario
 */
function mostrarPerfil($usuario)
{
    $file = "usuario.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $usuarios = explode("\n", $texto);
    foreach ($usuarios as $u) {
        $usuS = explode(":", $u);
        $username = $usuS[7] ?? "";
        if ($username == $usuario) {
            return $usuS;
        }
    }
}

/**
 * Actualizar el perfil del usuario
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $nombre: nombre del usuario
 * @param $apellido: apellido del usuario
 * @param $fecha: fecha de nacimiento del usuario
 * @param $tipodoc: tipo de documento del usuario
 * @param $documento: documento del usuario
 * @param $hijos: cantidad de hijos del usuario
 * @param $color: color del usuario
 * @param $usuario: nombre de Usuario
 * @param $usertype: tipo de usuario
 * @return void
 */
function actualizarPerfil($nombre, $apellido, $fecha, $tipodoc, $documento, $foto, $hijos, $color, $usertype, $usuario)
{
    $file = "usuario.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $usuarios = explode("\n", $texto);
    $texto2 = "";
    foreach ($usuarios as $u) {
        $usuS = explode(":", $u);
        $username = $usuS[7] ?? "";
        if ($username == $usuario) {
            $texto2 = $texto2 . $nombre . ":" . $apellido . ":" . $fecha . ":" . $tipodoc . ":" . $documento . ":" . $hijos . ":" . $color . ":" . $usuS[7] . ":" . $usuS[8] . ":" . $usertype . ":" . $foto . "\n";
        } else {
            $texto2 = $texto2 . $u . "\n";
        }
    }
    $fp = fopen($file, "w");
    fwrite($fp, $texto2);
    fclose($fp);
}

/**
 * Encriptar la contraseña de la cuenta
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $password: contraseña a encriptar
 * @return string con la contraseña encriptada
 */
function encriptarPassword($password)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    return $password;
}


/**
 * Cambiar color de fondo de la aplicación según el color con el que se registro el usuario
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $user: nombre de usuario
 * @return string con el color del fondo
 */

function leerColor($user){
    $file = "usuario.txt";
    $fp = fopen($file, "r");
    
    $texto = fread($fp, filesize($file));
    $usuarios = explode("\n", $texto);
    
    $color = "#f5f5f5";
    
    foreach ($usuarios as $u) {
        $usuS = explode(":", $u);
        $username = $usuS[7] ?? "";
        if ($username == $user) {
            $color = $usuS[6] ?? "#f5f5f5";
            return $color;
        }
    }

}


/** 
 *  Cerrar sesión usuarios
 *  Authored by: David Quiroga and Alejandro Monroy
 *  @return void
 **/
function cerrarSesion()
{
    session_destroy();
}
