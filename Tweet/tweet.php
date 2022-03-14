<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">

    <title>Tweet</title>
</head>

<body>

    <?php
    require_once './nav.php';
    $tweet = $_POST['tweet'] ?? '';
    ?>

    <form method="post">
        <div class="form-register">
            <h1>Tweet</h1>
            <div>
                <label for="tweet">Tweet: </label>
                <textarea name="tweet" id="tweet" cols="30" rows="10" maxlength="140" placeholder="Escribe tu tweet"></textarea>
            </div>
            <div>
                <input type="submit" value="Tweet">
            </div>
    </form>

    <?php
    require_once './tools.php';

    
    $tweet = $_POST['tweet'] ?? '';
    $DateAndTime = date('m-d-Y');

    if(isset($_POST['tweet'])){
        $msg = grabarTweet($_SESSION['username'], $tweet, $DateAndTime);
        echo "$msg";
    }


    ?>

</body>

</html>