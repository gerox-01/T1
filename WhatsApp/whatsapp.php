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

    <form method="post">
        <input type="submit" name="alejandro" class="button" value="Alejandro" />
        <?php
        require_once 'tools.php';
        session_start();

        $alejo = $_POST['alejandro'] ?? '';        
        $message = $_POST['message'] ?? 'Vacio';

        if (isset($_POST['alejandro'])) {
            echo "<h1>Alejandro</h1>";
            echo "<form method='post'>";
            echo "<textarea name='message' id='message' placeholder='Mensaje'></textarea>";
            echo "<input type='submit' name='send' id='send' value='Enviar' />";
            echo "</form>";

            $fecha = date('Y-m-d');

            // if (isset($_POST['message']) && !empty($_POST['message'])) {
            $msg = alejandro($message, $fecha);
            echo "<p>Mensaje: " . $msg . "</p>";
            // }else{
            //     echo "<p>No hay mensaje</p>";
            // }
        }
        ?>


        <input type="submit" name="geronimo" class="button" value="Geronimo" />
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