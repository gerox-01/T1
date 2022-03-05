<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="eee.css">

    <title>WhatsApp</title>
</head>

<body>

    <?php
    require_once 'tools.php';
    session_start();

    $fecha = date('Y-m-d');
    ?>

    <div class="bg-verde"></div>

    <div class="bg-wpp">
        <div class="container">

            <div class="topbar">
                <div class="section-profile">
                    <div>
                        <img class="foto-perfil" src="profile.png" alt="Profile Photo">
                    </div>
                    <div class="section-icons">
                        <img class="status" src="status.png" alt="Status">
                        <img class="newchat" src="newchat1.png" alt="New Chat">
                        <img class="menu" src="menu.png" alt="Menu">
                    </div>
                </div>
            </div>

            <div class="content">

                <div class="l-bar">
                    <div class="search">
                        <div class="section-search">
                            <div class="search-bar">
                                <img class="icon-search" src="search.png" alt="Search Icon">
                                <input type="text" placeholder="Search or start new chat">
                            </div>
                        </div>
                    </div>

                    <!-- Contacts whastapp -->
                    <div class="contacts">
                        <div class="section-contacts">
                            <div class="contact">
                                <div class="contact-photo">
                                    <img class="photo-contact" src="profile.png" alt="Contact Photo">
                                </div>
                                <p>Alejandro Monroy</p>
                                <div class="contact-info">
                                    <div class="contact-name">
                                        <form method="post">
                                            <input type="submit" style="font-size: 1rem; padding-left: 20px; border: none; background-color: #F5F6F6 !important; cursor: pointer; font-weight:700;" name="alejandro" id="alejandro" class="button" value="Click 📩">
                                            <?php

                                            $alejo = $_POST['alejandro'] ?? '';

                                            if (isset($_POST['alejandro'])) {
                                                echo "<form method='post'>";
                                            ?>
                                                <div class="chats-chat">
                                                    <div class="content-msg">
                                                        <?php
                                                        echo "<div class='i-message' id='style-5'>";
                                                        echo "<div class='force-overflow'>";
                                                        $message = leerMessageAlejo();
                                                        foreach ($message as $t) {
                                                            $messageS = explode(":", $t);
                                                            if (isset($messageS) && count($messageS) > 2) {
                                                                echo "<div class='i-card'>";
                                                                echo "<div style='margin-right: 0.5rem;' class='i-card-header'>";
                                                                echo "<p style='font-size: 1rem !important;'>" . $messageS[1] . "</p>";
                                                                echo "</div>";
                                                                echo "<div style='font-size: 10px !important;' class='i-card-body'>";
                                                                echo "<p>" . $messageS[2] . "</p>";
                                                                echo "✅✅";
                                                                echo "</div>";
                                                                echo "</div>";
                                                            }
                                                        }
                                                        echo "</div>";
                                                        echo "</div>";
                                                        ?>
                                                    </div>
                                                    <div class="input-msg">
                                                        <img class="emoji" src="emoji.png" alt="Emoji">
                                                        <img style="width: 30px; height: 30px; cursor: pointer; margin-left: 30px;" src="clip.png" alt="clip">
                                                        <input type='text' class="input-type" name='message' id='message' placeholder="Escriba un mensaje">
                                                        <!-- <img class="send-input" src="send.png" type='submit' name='send' id='send' alt="send"> -->
                                                        <input type='submit' style="border: none; cursor: pointer;" name='send' id='send' value='Enviar' />
                                                    </div>
                                                </div>
                                            <?php
                                                echo "</form>";
                                            }
                                            ?>

                                            <?php

                                            if (isset($_POST['send']) && isset($_POST['message']) && !empty($_POST['message'])) {

                                                $message = $_POST['message'] ?? 'Vacio';
                                                $msg = grabarAlejandro($message, $fecha);
                                                // echo "<p>Mensaje: " . $msg . "</p>";
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="contact">
                                <div class="contact-photo">
                                    <img class="photo-contact" src="profile.png" alt="Contact Photo">
                                </div>
                                <p>Docente de Linea II</p>
                                <div class="contact-info">
                                    <div class="contact-name">
                                        <form method="post">
                                            <input type="submit" style="font-size: 1rem; padding-left: 20px; border: none; background-color: #F5F6F6 !important; cursor: pointer; font-weight:700;" name="docente" id="docente" class="button" value="Click 📩">
                                            <?php

                                            $alejo = $_POST['docente'] ?? '';

                                            if (isset($_POST['docente'])) {
                                                echo "<form method='post'>";
                                            ?>
                                                <div class="chats-chatd">
                                                    <div class="content-msg">
                                                        <?php
                                                        echo "<div class='i-message' id='style-5'>";
                                                        echo "<div class='force-overflow'>";
                                                        $message = leerMessageDocente();
                                                        foreach ($message as $t) {
                                                            $messageS = explode(":", $t);
                                                            if (isset($messageS) && count($messageS) > 2) {
                                                                echo "<div class='i-card'>";
                                                                echo "<div style='margin-right: 0.5rem;' class='i-card-header'>";
                                                                echo "<p style='font-size: 1rem !important;'>" . $messageS[1] . "</p>";
                                                                echo "</div>";
                                                                echo "<div style='font-size: 10px !important;' class='i-card-body'>";
                                                                echo "<p>" . $messageS[2] . "</p>";
                                                                echo "✅✅";
                                                                echo "</div>";
                                                                echo "</div>";
                                                            }
                                                        }
                                                        echo "</div>";
                                                        echo "</div>";
                                                        ?>
                                                    </div>
                                                    <div class="input-msg">
                                                        <img class="emoji" src="emoji.png" alt="Emoji">
                                                        <img style="width: 30px; height: 30px; cursor: pointer; margin-left: 30px;" src="clip.png" alt="clip">
                                                        <input type='text' class="input-type" name='message' id='message' placeholder="Escriba un mensaje">
                                                        <!-- <img class="send-input" src="send.png" type='submit' name='send' id='send' alt="send"> -->
                                                        <input type='submit' style="border: none; cursor: pointer;" name='send' id='send' value='Enviar' />
                                                    </div>
                                                </div>
                                            <?php
                                                echo "</form>";
                                            }
                                            ?>

                                            <?php

                                            if (isset($_POST['send']) && isset($_POST['message']) && !empty($_POST['message'])) {

                                                $message = $_POST['message'] ?? 'Vacio';
                                                $msg = grabarDocente($message, $fecha);
                                                // echo "<p>Mensaje: " . $msg . "</p>";
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="contact">
                                <div class="contact-photo">
                                    <img class="photo-contact" src="profile.png" alt="Contact Photo">
                                </div>
                                <p>Estudiante</p>
                                <div class="contact-info">
                                    <div class="contact-name">
                                        <form method="post">
                                            <input type="submit" style="font-size: 1rem; padding-left: 20px; border: none; background-color: #F5F6F6 !important; cursor: pointer; font-weight:700;" name="estudiante" id="estudiante" class="button" value="Click 📩">
                                            <?php

                                            $alejo = $_POST['estudiante'] ?? '';

                                            if (isset($_POST['estudiante'])) {
                                                echo "<form method='post'>";
                                            ?>
                                                <div class="chats-chate">
                                                    <div class="content-msg">
                                                        <?php
                                                        echo "<div class='i-message' id='style-5'>";
                                                        echo "<div class='force-overflow'>";
                                                        $message = leerMessageEstudiante();
                                                        foreach ($message as $t) {
                                                            $messageS = explode(":", $t);
                                                            if (isset($messageS) && count($messageS) > 2) {
                                                                echo "<div class='i-card'>";
                                                                echo "<div style='margin-right: 0.5rem;' class='i-card-header'>";
                                                                echo "<p style='font-size: 1rem !important;'>" . $messageS[1] . "</p>";
                                                                echo "</div>";
                                                                echo "<div style='font-size: 10px !important;' class='i-card-body'>";
                                                                echo "<p>" . $messageS[2] . "</p>";
                                                                echo "✅✅";
                                                                echo "</div>";
                                                                echo "</div>";
                                                            }
                                                        }
                                                        echo "</div>";
                                                        echo "</div>";
                                                        ?>
                                                    </div>
                                                    <div class="input-msg">
                                                        <img class="emoji" src="emoji.png" alt="Emoji">
                                                        <img style="width: 30px; height: 30px; cursor: pointer; margin-left: 30px;" src="clip.png" alt="clip">
                                                        <input type='text' class="input-type" name='message' id='message' placeholder="Escriba un mensaje">
                                                        <!-- <img class="send-input" src="send.png" type='submit' name='send' id='send' alt="send"> -->
                                                        <input type='submit' style="border: none; cursor: pointer;" name='send' id='send' value='Enviar' />
                                                    </div>
                                                </div>
                                            <?php
                                                echo "</form>";
                                            }
                                            ?>

                                            <?php

                                            if (isset($_POST['send']) && isset($_POST['message']) && !empty($_POST['message'])) {

                                                $message = $_POST['message'] ?? 'Vacio';
                                                $msg = grabarEstudiante($message, $fecha);
                                                // echo "<p>Mensaje: " . $msg . "</p>";
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="chats">
                    <div class="content-msg">
                        <p>Aquí van los mensajes</p>
                        <p>✅✅</p>
                    </div>
                    <div class="input-msg">
                        <img class="emoji" src="emoji.png" alt="Emoji">
                        <img style="width: 30px; height: 30px; cursor: pointer; margin-left: 30px;" src="clip.png" alt="clip">
                        <input class="input-type" type="text" placeholder="Escriba un mensaje">
                        <img class="send-input" src="send.png" alt="send">
                    </div>
                </div> -->

            </div>

        </div>


    </div>


    <?php
    // //Llamamos al componente nav
    // require_once('nav.php');
    // require_once('tools.php');

    // //Iniciar sesión
    // $message = leerMessage();
    // // var_dump($message);
    // //array(1) { [0]=> string(24) "usuario:message:fechamessage" }

    // echo "<div class='i-message' id='style-5'>";
    // echo "<div class='force-overflow'>";
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
    <!-- </div>
    </div> -->

    <!-- <footer class="i-footer">
        <p>&copy; T1</p>
        <div class="i-divfotter">
            <p class="i-integrantes">Integrantes: </p>
            <p>David Quiroga |</p>
            <p>| Alejandro Monroy</p>
        </div>
    </footer> -->


</body>

</html>