<?php
if (isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
// buscar como mostrar la imagen en nav
// guardar ruta de image en usuariotxt
    if  (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 1000000){
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                // header("Location: signup.php?uploadsuccess");
                // echo '<img src="../uploads/'.$fileDestination.'"/>';
                // echo "<img src=".$fileDestination." height=200 width=300 />";
            }
            // if($fileExt =="png")
            // {
            //     echo '<img src="../uploads/'.$_FILES["file"]["name"].'">';
            // }
            else {
                echo "You file is too big!";
            }
        }else{
            echo "There was an error uploading your file!";
        }

    }else{
        echo "You cannot upload files of this type!";
    }
}