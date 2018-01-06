/* comentários */

// função de carregamento dinâmico (carregar página dinamicamente)
$(document).ready(function(){
    // seleciona classe 'menu' ao clicar.
    $(".menu").on("click", function () {
        // seta variável para renderizar arquivo html
        var item = $(this);
        // usa ajax para chamar o arquivo dentro da classe 'content'
        $.ajax(item.data('url')).done(function(data){
            // atribui o arquivo html dentro da classe 'content'
            $(".content").html(data);
       });
    })
});

// função de pesquisa por parâmetros (jquery)
$(document).ready(function () {
    $('.search').on('keyup', function () {
        var filter = $(this).val().toLowerCase();
        $('.datagrid').find('tr').each(function () {
            var content = $(this).find('td').text();
            var datagrid = content.toLowerCase().indexOf(filter) >= 0;
            $(this).css('display', datagrid ? '' : 'none');
        });
    });
});