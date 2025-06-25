$('.quarto').click(function(){
$('.menu ul .quarto') .toggleClass('mostra');
});

$('.sala').click(function(){
    $('.menu ul .sala') .toggleClass('mostra');
    });

    $('.escritorio').click(function(){
        $('.menu ul .escritorio') .toggleClass('mostra');
        });

        $('.cozinha').click(function(){
            $('.menu ul .cozinha') .toggleClass('mostra');
            });

$('.btnAbre').click(function(){
    $('.menu') .toggleClass('mostra');
});

$('.btnFecha').click(function(){
    $('.menu') .toggleClass('mostra');
});

$('.quarto').mouseover(function(){
    $('.menu ul .seta1') .toggleClass('girar');
});
$('.quarto').mouseout(function(){
    $('.menu ul .seta1') .toggleClass('girar');
});

$('.sala').mouseover(function(){
    $('.menu ul .seta2') .toggleClass('girar');
});
$('.sala').mouseout(function(){
    $('.menu ul .seta2') .toggleClass('girar');
});

$('.cozinha').mouseover(function(){
    $('.menu ul .seta3') .toggleClass('girar');
});
$('.cozinha').mouseout(function(){
    $('.menu ul .seta3') .toggleClass('girar');
});

$('.escritorio').mouseover(function(){
    $('.menu ul .seta4') .toggleClass('girar');
});
$('.escritorio').mouseout(function(){
    $('.menu ul .seta4') .toggleClass('girar');
});

const $menu =$('.menu');
$(document).mouseup(e=>{
if(!$menu.is(e.target)
    && $menu.has(e.target).length === 0)
{
    $menu.removeClass ('mostra');
}
});