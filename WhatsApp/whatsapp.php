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
    <div class="bg-verde">
        <div class="container">
        </div>
    </div>
   
    <form method="post">
        <div id='bodybox'>
            <div id='chatborder'>
                <input type="text" name="message" id="chatbox" required="required" value="<?php if (isset($message) && $message == '') {
                 echo $message;
                 } ?>" placeholder="¡Hola! Escribe aquí" onfocus="placeHolder()">
            </div>
            <br>
            <div>
                <input type="submit" value="message">
            </div>
    </form>
    <div><br></div>
    <form method="post">
        <input type="submit" name="alejandro"
                class="button" value="Alejandro" />
          
        <input type="submit" name="geronimo"
                class="button" value="Geronimo" />
    </form>
    <?php
     if(isset($_POST['alejandro'])) {
        alejandro();
    }
    else   if(isset($_POST['geronimo'])) {
        geronimo();
    }
    function alejandro() {
        // echo "This is Alejandro that is selected";
    }
    function geronimo() {
        // echo "This is Geronimo that is selected";
    }
?>
   
    <?php
        require_once 'tools.php';  
        session_start();
        $success = '';
        $message = $_POST['message'] ?? '';
        $contact = $_POST['contact'] ?? '';
        $DateAndTime = date('m-d-Y');

        if (isset($_POST['message'])) {
            $msg = grabarMessage($contact, $message, $DateAndTime);
            echo "$msg";
        }

        if ($message != '') {
            $success = 'success';
        } else {
            // Upon Failure.
            echo '<p class="error">Fill in all fields.</p>';
            // Set $success variable to an empty string.
            $success = '';
        }

    echo "<div class='i-message' id='style-5'>";
    echo "<div class='force-overflow'>";
    $message = leerMessage();
    foreach ($message as $t) {
        $messageS = explode(":", $t);
        if (isset($messageS) && count($messageS) > 2) {
            echo "<div class='i-card'>";
            echo "<div class='i-card-header'>";
            echo "<h2>" . $messageS[0] . "</h2>";
            echo "<p>" . $messageS[2] . "</p>";
            echo "</div>";
            echo "<div class='i-card-body'>";
            echo "<p>" . $messageS[1] . "</p>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo "</div>";
    echo "</div>";
    ?>
    

</body>

</html>