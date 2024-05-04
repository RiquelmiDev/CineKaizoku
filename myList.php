<?php
require_once 'Classes/Selecao.php';

$busca = new Selecao();
$resultado = $busca->selecionarFilmes();
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
foreach ($resultado as $listar) {
    $idListaFilmes[] = $listar['idlistafilmes'];
    $filmesIdFilmes[] = $listar['filmes_idfilme'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyList</title>
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
                <img src="src/img/CineKaizokuLogo.png" height="50" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
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
                        <input class="input-search" id="termo-busca" type="search" placeholder="Buscar...">

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

                <?php if (empty($idListaFilmes)) { ?>
                    <div style='background-color: #292930; text-align: center; border-radius: 10px; '>
                        <p class='mt-3'>Nenhum tesouro foi encontrado.</p>
                        <p>Desbrave os oceanos e retorne quando achar algum ouro.</p>
                    </div>
                    <div style='display: flex; align-items: center; justify-content: center; margin-top: 20px;'>
                        <img style='width: 30%;' src='./src/img/luffy.png' alt='luffy'>
                    </div>
                    <?php exit; ?>
<?php } ?>
                

                <div>
                    <h3 class="linha-texto mb-3 fs-5">Seus tesouros enterrados</h3>
                </div>



                <div class="row">
                    <?php for ($f = 0; $f < count($filmesIdFilmes); $f++) { ?>
                        <?php for ($i = 0; $i < count($idFilme); $i++) { ?>

                            <?php if ($filmesIdFilmes[$f] == $idFilme[$i]) { ?>
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
                                            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->

                                        </div>

                                    </div>

                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

</body>

</html>