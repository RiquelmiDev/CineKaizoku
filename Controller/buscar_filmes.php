<?php
require_once '../Classes/Selecao.php';
session_start();
session_destroy();

$busca = new Selecao();

// Verifica se o termo de busca foi recebido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
  $search_term = $_POST['search'];

  $resultado = $busca->selecionarFilmeUnicoPorPesquisa($search_term);
  $resultadoCategoria = $busca->selecionarCategorias();
    foreach ($resultadoCategoria as $listar) {
    $idCategoria[] = $listar['idcategoria'];
    $categoria[] = $listar['categoria'];
    $dataHoraCategoria[] = $listar['datahoraregistro'];
    }
  


  if ($resultado) {
    $output = '<div>
      <h3 class="linha-texto mb-3 fs-5">Resultado da busca</h3>
    </div>
    <div class="row">';
    foreach ($resultado as $listar) {
      $output .= '<div class="col-md-2 mb-3">
      <div class="card">
          <img class="img-fluid" alt="" src="./imagensEnviadas/' . $listar['imgnome'] . '">
          <div class="card-body">
              <span class="span-ano">' . $listar['anofilme'] . '</span>
              <h2 class="card-title">' . $listar['nomefilme'] . '</h2>
              <span class="span-categoria"> ';
                  for ($c = 0; $c < count($idCategoria); $c++) { 
                    if ($idCategoria[$c] == $listar['categorias_idcategoria']) { 
                      $output .= $categoria[$c];
                    } 
                  } 
              $output .= '</span>
              <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->

          </div>
      </div>
  </div>
            
            ';
    }
    $output .= '</div>';
    echo $output;
  } else {
    echo "
    <div style='background-color: #292930; text-align: center; border-radius: 10px; '>
      <p class='mt-3'>Desculpe, nenhum resultado foi encontrado.</p>
      <p>Tente novamente com um termo diferente, ou aguarde até adicionarmos.</p>
    </div>
    <div style='display: flex; align-items: center; justify-content: center; margin-top: 20px;'>
      <img style='width: 20%;' src='./src/img/GonKillua.png' alt='gon e killua'>
    </div>
    ";
  }
}
