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
function grabarUsuario($usuario, $clave, $name, $lastname, $fecha, $color, $email, $web, $tipodoc, $usertype, $fileDestination)
{

    // a = append = agregar al final
    // w = write = sobreescribir
    // r = read = leer

    $file = "usuario.txt";
    $texto = $usuario . ":" . $clave . ":" . $name . ":" . $lastname . ":" . $fecha . ":" . $color . ":" . $email . ":" 
    . $web . ":" . $tipodoc . ":" . $usertype . ":" . $fileDestination . "\n";
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
function getUserType($usuario, $clave)
{

    $file = "usuario.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $usuarios = explode("\n", $texto);

    if ($usuario == "" || $usuario == null && $clave == "" || $clave == null) {
        return "";
    } else {
        foreach ($usuarios as $u) {
            $user = explode(":", $u);
            if ($user[0] == $usuario && $user[1] == $clave) {
                $usertype = $user[9];
            }
        }
    }

    if ($usertype == "" || $usertype == null) {
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

    // foreach ($tweets as $t) {
    //     $datos = explode(":", $t);

    //         if(isset($_SESSION['username'])){
    //             if($datos[0]==$_SESSION['username']){
    //                 echo "<a href='delete.php?id=$datos[3]'><button class='btn btn-danger'>Eliminar</button></a>";
    //             }
    //         }
    //     }
    //     fclose($fp);
    //     return $datos;

    // }
    // return $tweets;

    // if($fs > 0){
    //     $texto = fread($fp, filesize($file));
    //     $tweets = explode("\n", $texto);
    //     fclose($fp);
    //     return $tweets;
    // }else{
    //     return 'Hola';
    // }
}

/**
 * Leer el tweet del archivo
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
       if ($usuS[0] == $user) {
           
           if (!isset($usuS[11] )){
               $filef = '';
               return $filef;
               
            }else{
                
                $filef = $usuS[11];
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
function restorepassword($usuario, $claveactual, $clavenueva, $confirmpassword)
{
    $file = "usuario.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $usuarios = explode("\n", $texto);
    foreach ($usuarios as $u) {
        $usuS = explode(":", $u);
        if ($usuS[0] == $usuario && $usuS[1] == $claveactual) {
            if ($confirmpassword == $clavenueva) {
                $usuS[1] = str_replace($usuario, $claveactual, $clavenueva);
                $texto2 = $usuS[0] . ":" . $usuS[1];
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
function eliminarTweet($usuario, $tweet)
{
    // Eliminar el registro que corresponde con el usuario y tweet
    $file = "tweet.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $tweets = explode("\n", $texto);
    $texto2 = "";
    foreach ($tweets as $t) {
        $datos = explode(":", $t);
        if ($datos[0] == $usuario && $datos[1] == $tweet) {
            $texto2 = str_replace($t, "", $texto);
        }else{
            $texto2 = $texto2 . $t . "\n";
        }
    }
    $fp = fopen($file, "w");
    fwrite($fp, $texto2);
    fclose($fp);
        
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
