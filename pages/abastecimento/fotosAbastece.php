<?php

    $host = "localhost";
    $db   = "frota";
    $user = "root";
    $pass = "t00r@nimda";

    $encoded_string = $_POST["encoded_string"];
    $image_name = $_POST["image_name"];
    $idabastece = $_POST['idabastece'];


    $decoded_string = base64_decode($encoded_string);
    $path = '/var/www/html/frota/src/img/abastecimento/'.$image_name.'.jpg';
    $file = fopen($path, 'wb');
    $is_written = fwrite($file, $decoded_string);
    fclose($file);


    $connect = mysqli_connect($host,$user,$pass) or trigger_error(mysqli_error(),E_USER_ERROR);
    $db = mysqli_select_db($connect,$db);
    $query = "INSERT INTO fotos_abastece  values('','$path','$idabastece')";
    $result = mysqli_query($connect, $query) ;


    if(isset($result)){
        echo "ok";
    }else{
        echo "erro";
    }
?>
