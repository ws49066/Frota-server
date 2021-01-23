<?php

    $host = "localhost";
    $db   = "frota";
    $user = "root";
    $pass = "t00r@nimda";

    $kmatual = $_POST['kmatual'];
    $combustivel = $_POST['combustivel'];
    $litros = $_POST['litros'];
    $requisicao = $_POST['requisicao'];
    $idveiculo = $_POST['idveiculo'];
    $iduser = $_POST['iduser'];
    $data = date("d/m/y H:i:s");

    $connect = mysqli_connect($host,$user,$pass) or trigger_error(mysqli_error(),E_USER_ERROR);
    $db = mysqli_select_db($connect,$db);
    $query = "INSERT INTO abastece values('','$data','$combustivel','$requisicao','$kmatual','$idveiculo','$iduser')";
    $result = mysqli_query($connect, $query) ;

    if(isset($result)){
        $queryselectlast = "SELECT idabastece from abastece ORDER BY idabastece DESC LIMIT 1";
        $resultado = mysqli_query($connect, $queryselectlast) ;

        if(isset($resultado)){
            $idabastece = mysqli_fetch_array($resultado);
            $id = $idabastece['idabastece'];
            echo $id;
        }else{
            echo "erro";
        }
    }else{
        echo "erro";
    }