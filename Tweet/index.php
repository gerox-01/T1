<?php

/**
 * Autores: Alejandro Monroy & Gerónimo Quiroga
 * Fecha: 19/03/2022
 * Materia: Linea de profundización 2
 * Descripción: parcial 1
 */


header('Content-Type: text/html; charset=UTF-8');
require_once('./nav.php');


if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    header('Location: login.php');
    die();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">

    <title>T1</title>
</head>

<body>

    <?php
    require_once('./tools.php');
    LimpiarEntradas();
    IniciarSesionSegura();
    //Iniciar sesión
    $tweet = leerTweet();



    if ($tweet == 'Hola') {
        echo "<div class='i-tweet' id='style-5' >";
        echo "<div class='force-overflow'>";
        echo "<h1>No hay Tweets</h1>";
        echo "</div>";
        echo "</div>";
    } else {
        $userTweet = $_SESSION['username'];
        if (count($tweet) > 0) {
            echo "<div class='i-tweet' id='style-5'>";
            echo "<div class='force-overflow'>";
            foreach ($tweet as $t) {
                $tweetS = explode(":", $t);
                if (isset($tweetS) && count($tweetS) > 2) {
                    echo "<div class='i-card'>";
                    echo "<div class='i-card-header'>";
                    echo "<h2>" . $tweetS[0] . "</h2>";
                    echo "<p>" . $tweetS[2] . "</p>";
                    echo "</div>";
                    echo "<div class='i-card-body'>";
                    echo "<p>" . $tweetS[1] . "</p>";
                    echo "</div>";
                    echo "</div>";

                    if ($tweetS[0] == $userTweet) {
                        echo '<form method="post">';
                        echo '    <div>';
                        echo '        <input type="hidden" name="tweet" value="<?php echo $tweetS[1]; ?>">';
                        echo '        <input type="submit" value="Eliminar">';
                        echo '    </div>';
                        echo '</form>';
                        if (isset($_POST['tweet'])) {
                            $tweet = $_POST['tweet'];
                            eliminarTweet($_SESSION['username'], $tweet);
                        }
                    }
                }
                // else{
                //     if (isset($tweetS) && count($tweetS) > 2) {
                //         echo "<div class='i-card'>";
                //         echo "<div class='i-card-header'>";
                //         echo "<h2>" . $tweetS[0] . "</h2>";
                //         echo "<p>" . $tweetS[2] . "</p>";
                //         echo "</div>";
                //         echo "<div class='i-card-body'>";
                //         echo "<p>" . $tweetS[1] . "</p>";
                //         echo "</div>";
                //         echo "</div>";
                //     }
                // }
            }
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div class='i-tweet' id='style-5'>";
            echo "<div class='force-overflow'>";
            echo "</div>";
            echo "</div>";
        }
    }
    ?>
    </div>
    </div>

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