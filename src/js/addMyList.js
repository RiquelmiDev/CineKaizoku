$(document).ready(function() {
    $(".botaoAddLista").click(function(event) {
        event.preventDefault(); // Previne o comportamento padrão do botão

        // Coleta informações do filme dentro do formulário pai do botão clicado
        var filmeId = $(this).closest('form').find('input[name="idDoFilme"]').val();

        // Verifica se o filmeId está definido
        if (filmeId !== undefined) {
            console.log('filmeId:', filmeId); // Verifica o valor de filmeId no console

            // Salva uma referência ao botão clicado para uso posterior
            var botao = $(this);

            // Prepara a requisição AJAX
            $.ajax({
                type: 'POST',
                url: '../CineKaizoku/Controller/insereLista.php', // Verifique se o caminho está correto
                data: {
                    filmeId: filmeId
                },
                success: function(response) {
                    // Lida com a resposta do servidor
                    console.log(response); // Exibe a mensagem no console

                    // Verifica se a resposta indica sucesso
                    if (response.trim() === 'Filme adicionado à lista com sucesso!') {
                        // Altera o ícone do botão clicado para o ícone "checked"
                        botao.html('<i class="fa-solid fa-check"></i>').prop('disabled', true);
                    }
                },
                error: function(xhr, status, error) {
                    // Lida com erros
                    console.error('Ocorreu um erro ao adicionar o filme à lista:', error);
                    alert('Ocorreu um erro ao adicionar o filme à lista. Por favor, tente novamente mais tarde.');
                }
            });
        } else {
            console.error('Erro: filmeId não definido.');
            alert('Erro ao adicionar o filme à lista. Por favor, tente novamente.');
        }
    });
});