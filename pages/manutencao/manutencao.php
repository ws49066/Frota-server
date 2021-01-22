<?php

    $host = "localhost";
    $db   = "frota";
    $user = "root";
    $pass = "t00r@nimda";

    $kmatual = $_POST['kmatual'];
    $pecas = $_POST['pecas'];
    $servicos = $_POST['servicos'];
    $valorpecas = $_POST['valorpecas'];
    $valorservico = $_POST['valorservico'];
    $valortotal = $_POST['valortotal'];
    $idveiculo = $_POST['idveiculo'];
    $iduser = $_POST['iduser'];
    $data = date("d/m/y h:i:s");

    $connect = mysqli_connect($host,$user,$pass) or trigger_error(mysqli_error(),E_USER_ERROR);
    $db = mysqli_select_db($connect,$db);
    $query = "INSERT INTO manutencao values('','$pecas','$servicos','$valorpecas','$valorservico','$kmatual','$data','$idveiculo','$iduser','$valortotal')";
    $result = mysqli_query($connect, $query) ;

    if(isset($result)){
        $queryselectlast = "SELECT idmanutencao from manutencao ORDER BY idmanutencao DESC LIMIT 1";
        $resultado = mysqli_query($connect, $queryselectlast) ;

        if(isset($resultado)){
            $idabastece = mysqli_fetch_array($resultado);
            $id = $idabastece['idmanutencao'];
            echo $id;
        }else{
            echo "erro";
        }
        echo "ok";
    }else{
        echo "erro";
    }