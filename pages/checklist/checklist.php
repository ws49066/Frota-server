<?php

    $host = "localhost";
    $db   = "frota";
    $user = "root";
    $pass = "t00r@nimda";

    $lataria = "ok";
    $pneus = "ok"; 
    $vidroel = "ok";
    $retrovisor = "ok"; 
    $buzina = "ok"; 
    $lanternas = "ok";
    $farois = "ok";
    $setas = "ok";
    $luzdere = "ok";
    $lparabrisa = "ok";
    $freiodemao = "ok";
    $painel = "ok";
    $volante = "ok";
    $alarme = "ok";
    $luzinterior = "ok";
    $freio = "ok";
    $outros = "ok";

    $tipo = $_POST['tipo'];
    $idveiculo = $_POST['idveiculo'];
    $iduser = $_POST['iduser'];
    $kmatual = $_POST['kmatual'];
    $data = date("d/m/y H:i:s");


    $listItems = $_POST["listItems"];
    $listItems = str_replace('[','',$listItems);
    $listItems = str_replace(']','',$listItems);
    $listItems = str_replace(' ','',$listItems);
    $listItemsSplit = explode(',', $listItems);

    $listComments = $_POST["listComments"];
    $listComments = str_replace('[','',$listComments);
    $listComments = str_replace(']','',$listComments);
    $listComments = str_replace(' ','',$listComments);
    $listCommentsSplit = explode(',', $listComments);


    for($i =0; $i < count($listItemsSplit); $i++){
        switch($listItemsSplit[$i]){
            case "lataria":
                $lataria = $listCommentsSplit[$i];
                break;
            case "pneus":
                $pneus = $listCommentsSplit[$i];
                break;
            case "vidroel":
                $vidroel = $listCommentsSplit[$i];
                break;
            case "retrovisor":
                $retrovisor = $listCommentsSplit[$i];
                break;
            case "buzina":
                $buzina = $listCommentsSplit[$i];
                break;
            case "lanternas":
                $lanternas = $listCommentsSplit[$i];
                break;
            case "farois":
                $farois = $listCommentsSplit[$i];
                break;
            
            case "setas":
                $setas = $listCommentsSplit[$i];
                break;
            
            case "luzdere":
                $luzdere = $listCommentsSplit[$i];
                break;
            case "lparabrisa":
                $lparabrisa = $listCommentsSplit[$i];
                break;

            case "freiodemao":
                $freiodemao = $listCommentsSplit[$i];
                break;
            
            case "painel":
                $painel = $listCommentsSplit[$i];
                break;

            case "volante":
                $volante = $listCommentsSplit[$i];
                break;

            case "alarme":
                $alarme = $listCommentsSplit[$i];
                break;

             case "luzinterior":
                $luzinterior = $listCommentsSplit[$i];
                break;
                
            case "freio":
                $freio = $listCommentsSplit[$i];
                break;

            case "outros":
                $outros = $listCommentsSplit[$i];
                break;
        }
    }    

    
    $connect = mysqli_connect($host,$user,$pass) or trigger_error(mysqli_error(),E_USER_ERROR);
    $db = mysqli_select_db($connect,$db);
    $query = "INSERT INTO checklist values('','$lataria','$pneus','$vidroel','$retrovisor','$buzina','$lanternas'
            , '$farois','$setas','$luzdere','$lparabrisa','$freiodemao','$painel','$volante','$alarme','$luzinterior','$freio'
            , '$outros','$tipo','$data','$idveiculo','$idveiculo','$kmatual')";
    $result = mysqli_query($connect, $query) ;

    if(isset($result)){
       echo "ok";
    }else{
        echo "erro";
    }