<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">

    <title>Message</title>
</head>

<body>

    <?php
    require_once 'tools.php';
    session_start();

    $fecha = date('Y-m-d');
    ?>

    <form method="post">
        <input type="submit" name="alejandro" id="alejandro" class="button" value="Alejandro">
        <?php

        $alejo = $_POST['alejandro'] ?? '';

        if (isset($_POST['alejandro'])) {
            echo "<h1>Alejandro</h1>";
            echo "<form method='post'>";
            echo "<input type='text' name='message' id='message' placeholder='Mensaje'>";
            echo "<input type='submit' name='send' id='send' value='Enviar' />";
            echo "</form>";
        }
        ?>

        <?php

        if (isset($_POST['send']) && isset($_POST['message'])) {

            $message = $_POST['message'] ?? 'Vacio';
            $msg = alejandro($message, $fecha);
            echo "<p>Mensaje: " . $msg . "</p>";
        }
        ?>


        <!-- <input type="submit" name="geronimo" class="button" value="Geronimo" /> -->
    </form>

    <?php


    function geronimo()
    {
        // echo "This is Geronimo that is selected";
    }
    ?>

    <?php
    // if ($message != '') {
    //     $success = 'success';
    // } else {
    //     // Upon Failure.
    //     echo '<p class="error">Fill in all fields.</p>';
    //     // Set $success variable to an empty string.
    //     $success = '';
    // }

    // echo "<div class='i-message' id='style-5'>";
    // echo "<div class='force-overflow'>";
    // $message = leerMessage();
    // foreach ($message as $t) {
    //     $messageS = explode(":", $t);
    //     if (isset($messageS) && count($messageS) > 2) {
    //         echo "<div class='i-card'>";
    //         echo "<div class='i-card-header'>";
    //         echo "<h2>" . $messageS[0] . "</h2>";
    //         echo "<p>" . $messageS[2] . "</p>";
    //         echo "</div>";
    //         echo "<div class='i-card-body'>";
    //         echo "<p>" . $messageS[1] . "</p>";
    //         echo "</div>";
    //         echo "</div>";
    //     }
    // }
    // echo "</div>";
    // echo "</div>";
    ?>


</body>

</html>