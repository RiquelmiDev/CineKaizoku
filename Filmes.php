<?php
require_once 'Classes/Selecao.php';

$busca = new Selecao();
$resultado = $busca->selecionarFilmesAleatorios();
foreach ($resultado as $listar) {
    $idFilme[] = $listar['idfilme'];
    $nomeFilme[] = $listar['nomefilme'];
    $anoFilme[] = $listar['anofilme'];
    $categoriaFilme[] = $listar['categorias_idcategoria'];
    $sinopse[] = $listar['sinopse'];
    $dataHoraRegistro[] = $listar['datahoraregistro'];
    $nomeImg[] = $listar['imgnome'];
}

$resultado = $busca->selecionarCategorias();
foreach ($resultado as $listar) {
    $idCategoria[] = $listar['idcategoria'];
    $categoria[] = $listar['categoria'];
    $dataHoraCategoria[] = $listar['datahoraregistro'];
}

$resultado = $busca->selecionarMyList();
$filmesNaLista = array_column($resultado, 'filmes_idfilme');
// Após receber o resultado da consulta, você a função array_column() extrai uma única coluna desse resultado.


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
    <link rel="shortcut icon" href="src/img/chapeuIcon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="./src/css/navbar.css">
    <link rel="stylesheet" href="./src/css/filmes.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg Navbar-bg">
        <!-- Container wrapper -->
        <div class="container-fluid" style="margin-left: 100px; margin-right: 100px;">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="./Cadastro/filmeCad.php">
                <img src="src/img/CineKaizokuLogo.png" height="50" alt="CineKaizoku Logo" loading="lazy" style="margin-top: -1px;" />
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icone-opcoes-nav fa-solid fa-bars-staggered"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="nav-ul collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="./index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Filmes.php">Filmes</a></li>
                    <li class="nav-item"><a class="nav-link" href="./myList.php">Minha lista</a></li>
                </ul>
                <!-- deixar responsivo -->
                <div class="search-bar">
                    <form class="form-search" action="">
                        <input class="input-search" id="termo-busca" name="search" type="search" placeholder="Buscar...">

                        <i class="fa-search fa fa-search"></i>

                    </form>
                </div>
                <!-- ;;;;;;;;;;;;;;;;;;;;;;;-->

                <ul class="navbar-nav d-flex flex-row">
                    <!-- Icon dropdown -->
                    <li class="nav-item me-3 me-lg-0 dropdown">
                        <a class="nav-icone nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu menu-nav" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item menu-item" href="#"><i class="fa-regular fa-user"></i> Conta</a>
                            </li>
                            <li>
                                <a class="dropdown-item menu-item" href="#"><i class="fa-regular fa-circle-question"></i> Ajuda</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-center logout-hover" href="#">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>

    <section class="pt-5 pb-5 mt-5">
        <div class="container">

            <div class="row" id="resultado-busca"></div>
            <div class="row" id="tela-padrao">
                <div>
                    <h3 class="linha-texto mb-3 fs-5">Descubra novos mares</h3>
                </div>

                <div class="row">
                    <?php for ($i = 0; $i < count($idFilme); $i++) { ?>
                        
                        <div class="col-md-2 mb-3">
                            <div class="card">
                                <img class="img-fluid" alt="" src="./imagensEnviadas/<?= $nomeImg[$i] ?>">
                                <div class="card-body">
                                    <span class="span-ano"><?= $anoFilme[$i] ?></span>
                                    <h2 class="card-title"><?= $nomeFilme[$i] ?></h2>
                                    <span class="span-categoria">
                                        <?php for ($c = 0; $c < count($idCategoria); $c++) { ?>
                                            <?php if ($idCategoria[$c] == $categoriaFilme[$i]) { ?>
                                                <?= $categoria[$c] ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </span>
                                    
                                    <form action="" method="post">
                                        
                                        <input name="idDoFilme" id="idDoFilme<?=$idFilme[$i]?>" type="hidden" value="<?=$idFilme[$i]?>">
                                        
                                            
                                        <?php 
                                        // Verifica se o filme está na lista do usuário
                                        if (in_array($idFilme[$i], $filmesNaLista)) { ?>
                                            <div class="divAddLista">
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-title="Remover da lista">
                                                    <button class="botaoAddLista" type="button" disabled>
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        <?php } else { ?>
                                            <div class="divAddLista">
                                                <button class="botaoAddLista" type="submit" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="Adicionar a lista">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        <?php } ?>
  
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./src/js/pesquisaFilme.js"></script>
    <script src="./src/js/addMyList.js"></script>
    <!-- Script que mostra a msg de adicionar a lista ao usar o hover do botao de add lista -->
    <script>
        $(document).ready(function(){
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
    
    <script>
        console.log('%c Perdeu algo Curioso ?', 'color: red; line-height:50px;font-size: 30px;');
    </script>

</body>

</html>