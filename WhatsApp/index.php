<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="es.css">

    <title>WhatsApp</title>
</head>

<body>

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
                                <div class="contact-info">
                                    <div class="contact-name">
                                        <h3 style="font-size: 1rem; padding-left: 20px">Universidad de Cundinamarca</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="contact">
                                <div class="contact-photo">
                                    <img class="photo-contact" src="profile.png" alt="Contact Photo">
                                </div>
                                <div class="contact-info">
                                    <div class="contact-name">
                                        <h3 style="font-size: 1rem; padding-left: 20px">Gabriel Rojas</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="contact">
                                <div class="contact-photo">
                                    <img class="photo-contact" src="profile.png" alt="Contact Photo">
                                </div>
                                <div class="contact-info">
                                    <div class="contact-name">
                                        <h3 style="font-size: 1rem; padding-left: 20px">Estudiantes</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chats">
                    <!-- <div class="chat">
                        <div class="section-chat">
                            <div class="chat-header">
                                <div class="chat-header-info">
                                    <div class="chat-header-photo">
                                        <img class="photo-chat" src="profile.png" alt="Chat Photo">
                                    </div>
                                    <div class="chat-header-name">
                                        <p>Universidad de Cundinamarca</p>
                                    </div>
                                </div>
                                <div class="chat-header-icons">
                                    <img class="icon-chat" src="icon-chat.png" alt="Icon Chat">
                                    <img class="icon-video" src="icon-video.png" alt="Icon Video">
                                    <img class="icon-audio" src="icon-audio.png" alt="Icon Audio">
                                    <img class="icon-file" src="icon-file.png" alt="Icon File">
                                </div>
                            </div>
                            <div class="chat-body">
                                <div class="chat-message">
                                    <div class="chat-message-photo">
                                        <img class="photo-message" src="profile.png" alt="Message Photo">
                                    </div>
                                    <div class="chat-message-text">
                                        <p>Hola, como estas?</p>
                                    </div>
                                </div>
                                <div class="chat-message">
                                    <div class="chat-message-photo">
                                        <img class="photo-message" src="profile.png" alt="Message Photo">
                                    </div>
                                    <div class="chat-message-text">
                                        <p>Bien, gracias</p>
                                    </div>
                                </div>
                                <div class="chat-message">
                                    <div class="chat-message-photo">
                                        <img class="photo-message" src="profile.png" alt="Message Photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
                </div>

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