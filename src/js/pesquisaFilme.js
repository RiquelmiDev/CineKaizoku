$(document).ready(function() {
    $('#termo-busca').on('input', function() {
        // Obtém o termo de busca do campo input
        var termo = $(this).val();

        if (termo.trim() == '') {
            $('#resultado-busca').hide();
            // Exibir todos os registros novamente
            $('#tela-padrao').show();

        } else {
            // Envia o termo de busca via AJAX para o arquivo PHP
            $.ajax({
                type: 'POST',
                url: '../CineKaizoku/Controller/buscar_filmes.php',
                data: {
                    search: termo
                },
                success: function(response) {
                    $('#tela-padrao').hide(); // Esconde o div com todos os registros
                    $('#resultado-busca').show(); // Mostra o div com os resultados da busca
                    $('#resultado-busca').html(response); // Insere os resultados no div

                }
            });
        }
    });
});