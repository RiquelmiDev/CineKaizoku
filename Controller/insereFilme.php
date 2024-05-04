<?php

require_once '../Classes/Insercao.php';

 $nomeFilme = $_POST['nomeFilme'];
 $anoFilme = $_POST['anoFilme'];
 $idCategoria = $_POST['categoria'];
 $nomeImg = $_FILES['capaFilme'];
 $sinopse = $_POST['sinopse'];
 $dataCadastro = date("Y-m-d H:i:s");

if (!empty($nomeImg["name"])){

    preg_match('/\.(jpg|png|jpeg)$/', $nomeImg["name"], $ext);
  
    if($ext[1] == "jpg" || $ext[1] == "png" || $ext[1] == "jpeg"){
  
    $nome_img = md5(uniqid(time())) . "." . $ext[1];
  
    $caminho_img = "../imagensEnviadas/" . $nome_img;
  
    move_uploaded_file($nomeImg["tmp_name"], $caminho_img);
  
    }
  }

$insere = new Insercao();

$resultado = $insere->inserirFilmes($nomeFilme,$anoFilme,$idCategoria,$sinopse,$nome_img,$dataCadastro);

header("Location: ../index.php");
