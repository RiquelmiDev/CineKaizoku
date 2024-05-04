<?php
require_once '../Classes/Selecao.php';

$busca = new Selecao();

$resultado = $busca->selecionarCategorias();
foreach ($resultado as $listar) {
    $idCategoria[] = $listar['idcategoria'];
    $categoria[] = $listar['categoria'];
    $dataCadastro[] = $listar['datahoraregistro'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de filmes</title>
    <!--     LINKS   -->
    <link rel="shortcut icon" href="src/img/chapeuIcon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />

</head>

<body>

    <section class="intro">
        <div class="mask d-flex align-items-center h-100 gradient-custom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2">Formulario De Cadastro De Filmes</h3>

                                <form action="../Controller/insereFilme.php" method="post" enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                        <label for="nomeFilme" class="col-form-label">Nome Do Filme</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="nomeFilme" name="nomeFilme" placeholder="Digite o nome do filme" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="anoFilme" class="col-form-label">Ano De Lançamento</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="anoFilme" name="anoFilme" placeholder="Digite o ano do Filme" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="categoria" class="col-form-label">Categoria</label>
                                        <div class="col-sm-5">
                                            <select class="form-select" aria-label="Default select example" id="categoria" name="categoria" required>
                                                <option selected>Selecione</option>
                                                <?php for ($i = 0; $i < count($idCategoria); $i++) { ?>
                                                    <option value="<?= $idCategoria[$i]; ?>"><?= $categoria[$i]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sinopse" class="form-label">Sinopse</label>
                                        <textarea name="sinopse" id="sinopse" cols="30" rows="5" class="form-control" required></textarea>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="capaFilme" class="col-form-label">Capa do Filme</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="capaFilme" name="capaFilme" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-4">
                                                <input class="btn btn-warning btn-lg" type="submit" value="Cadastrar" />
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
    <script src="./src/js/pesquisaFilme.js"></script>
    <script>
        console.log('%c Perdeu algo Curioso ?', 'color: red; line-height:50px;font-size: 30px;');
    </script>
</body>

</html>