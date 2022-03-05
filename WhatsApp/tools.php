<?php

/**
 * Leer el mensaje del archivo
 * Authored by: David Quiroga and Alejandro Monroy
 * @return array con los mensajes
 */
function leerMessageAlejo(){
    $file = "alejo.txt";
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
function grabarAlejandro($message, $fecha){
    $usuario = 'Alejandro';
    $file = "alejo.txt";
    $texto = $usuario . ":" . $message . ":" . $fecha . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
}

/**
 * Mensajes de Docente
 * Authored by: David Quiroga and Alejandro Monroy
 * @return void
 */
function grabarDocente($message, $fecha){
    $usuario = 'Docente';
    $file = "docente.txt";
    $texto = $usuario . ":" . $message . ":" . $fecha . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
}

/**
 * Leer el mensaje del archivo Docente
 * Authored by: David Quiroga and Alejandro Monroy
 * @return array con los mensajes
 */
function leerMessageDocente(){
    $file = "docente.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $messages = explode("\n", $texto);
    return $messages;
}

/**
 * Mensajes de Estudiante
 * Authored by: David Quiroga and Alejandro Monroy
 * @return void
 */
function grabarEstudiante($message, $fecha){
    $usuario = 'Estudiante';
    $file = "estudiante.txt";
    $texto = $usuario . ":" . $message . ":" . $fecha . "\n";
    $fp = fopen($file, "a");
    fwrite($fp, $texto);
    fclose($fp);
}

/**
 * Leer el mensaje del archivo Estudiante
 * Authored by: David Quiroga and Alejandro Monroy
 * @return array con los mensajes
 */
function leerMessageEstudiante(){
    $file = "estudiante.txt";
    $fp = fopen($file, "r");
    $texto = fread($fp, filesize($file));
    $messages = explode("\n", $texto);
    return $messages;
}

?>