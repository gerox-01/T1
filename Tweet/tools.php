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
function grabarUsuario($usuario, $clave)
{
    
    // a = append = agregar al final
    // w = write = sobreescribir
    // r = read = leer

    $file = "usuario.txt";
    $texto = $usuario . ":" . $clave . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
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
        if ($usuS[0] == $usuario && $usuS[1] == $clave) {
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
function grabarTweet($usuario, $tweet, $fecha){
    $file = "tweet.txt";
    $texto = $usuario . ":" . $tweet . ":" . $fecha . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
}

/**
 * Guardar el tweet en el archivo
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $usuario: nombre de usuario
 * @param $tweet: tweet del usuario
 * @return void
 */
function grabarMessage($usuario, $message, $fecha){
    $file = "Message.txt";
    $texto = $usuario . ":" . $message . ":" . $fecha . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
}

/**S
 * Leer el tweet del archivo
 * Authored by: David Quiroga and Alejandro Monroy
 * @return array con los tweets
 */
function leerTweet(){
    $file = "tweet.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $tweets = explode("\n", $texto);
    return $tweets;
}

/**S
 * Leer el tweet del archivo
 * Authored by: David Quiroga and Alejandro Monroy
 * @return array con los tweets
 */
function leerMessage(){
    $file = "message.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $messages = explode("\n", $texto);
    return $messages;
}

/**
 * Restore password
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $claveactual: nombre de usuario
 * @param $clavenueva: clave del usuario
 * @return true si el usuario y clave existen en el archivo 
 */
function restorepassword($usuario, $claveactual, $clavenueva){
    $file = "usuario.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $usuarios = explode("\n", $texto);
    foreach ($usuarios as $u) {
        $usuS = explode(":", $u);
        if ($usuS[0] == $usuario && $usuS[1] == $claveactual) {
            $usuS[1] = str_replace($usuario, $claveactual, $clavenueva);
            $texto2 = $usuS[0] . ":" . $usuS[1];
            $textot = str_replace($u, $texto2, $texto);
            $fp = fopen($file, "w");
            fwrite($fp, $textot);
            fclose($fp);

            return True;
        }
    }

    return False;
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