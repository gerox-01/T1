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
    //Llamamos al componente nav
    require_once('./nav.php');
    require_once('./tools.php');

    //Iniciar sesión
    $tweet = leerTweet();


    if ($tweet == 'Hola') {
        echo "<div class='i-tweet' id='style-5' >";
        echo "<div class='force-overflow'>";
        echo "<h1>No hay Tweets</h1>";
        echo "</div>";
        echo "</div>";
    } else {
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
                }
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