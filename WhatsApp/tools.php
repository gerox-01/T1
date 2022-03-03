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
    $file = "message.txt";
    $texto = $usuario . ":" . $message . ":" . $fecha . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
}


/**
 * Mensajes de Alejandro
 * Authored by: David Quiroga and Alejandro Monroy
 * @return void
 */
function alejandro($message, $fecha){
    $usuario = 'Alejandro';
    $file = "alejo.txt";
    $texto = $usuario . ":" . $message . ":" . $fecha . "\n";
    $fp = fopen($file, "w");
    fwrite($fp, $texto);
    fclose($fp);
}

?>