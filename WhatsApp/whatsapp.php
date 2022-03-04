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
    </form>


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
    </form>


</body>

</html>