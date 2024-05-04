<?php
require_once '../Classes/Insercao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idfilme = $_POST['filmeId'];
    
    
    $insere = new Insercao();
    
    $resultado = $insere->inserirMyList($idfilme);
    
    if ($resultado) {
        echo 'Filme adicionado à lista com sucesso!';
    } else {
        echo 'Erro ao adicionar filme à lista.';
    }
} else {
    echo 'Método inválido.';
}