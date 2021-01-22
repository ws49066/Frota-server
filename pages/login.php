<?php
session_start();
$login = $_POST["username"];  
$senha = $_POST["password"];  
$host = "localhost";
$db   = "frota";
$user = "root";
$pass = "t00r@nimda";
$con = mysqli_connect($host, $user, $pass) or trigger_error(mysqli_error($db),E_USER_ERROR);
mysqli_select_db($con, $db);
$query = "SELECT * from usuario where login='$login' and senha='$senha'";
$verifica = mysqli_query($con, $query) or die("erro ao selecionar");


if (mysqli_num_rows($verifica)==0){
    echo "erro";

}else{
    $id_user = mysqli_fetch_array($verifica);
    $id_login_user = (String) $id_user['idusuario'];
    $id_nameuser = $id_user['nome'];
    $idveiculo = (String) $id_user['idveiculo'];
    $query_veiculo = "SELECT placa,modelo, marca from veiculo where idveiculo='$idveiculo'";
    $verifica_veiculo = mysqli_query($con, $query_veiculo) or die("erro ao selecionar");
    
    if (mysqli_num_rows($verifica)==0){
        echo "erro";
    }else{
        $dados_veiculo = mysqli_fetch_array($verifica_veiculo);
        $placa = $dados_veiculo['placa'];
        $modelo = $dados_veiculo['modelo'];
        $marca = $dados_veiculo['marca'];
        echo $id_nameuser;
        echo ",";
        echo $id_login_user;
        echo ",";
        echo $idveiculo;
        echo ",";
        echo $placa;
        echo ",";
        echo $modelo;
        echo ",";
        echo $marca;
    }

   
}

mysqli_close($verifica);

