<?php

/**
 * Leer el mensaje del archivo
 * Authored by: David Quiroga and Alejandro Monroy
 * @return array con los mensajes
 */
function leerMessage(){
    $file = "message.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $messages = explode("\n", $texto);
    return $messages;
}

/**
 * Guardar el mensaje en el archivo
 * Authored by: David Quiroga and Alejandro Monroy
 * @param $usuario: nombre de usuario
 * @param $mensaje: mensaje del usuario
 * @return void
 */
function grabarMessage($usuario, $message, $fecha){
    $file = "Message.txt";
    $texto = $usuario . ":" . $message . ":" . $fecha . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
}


?>