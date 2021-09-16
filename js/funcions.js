
$(document).ready(function(){
    $('.dropdownlink').click(function(){

        if($('.account-options').css('display')=='none'){
            $('.lineasep').css('top','167px');
            $('.account-options').addClass('account-displayed').removeClass('account-options');
            $('.cartmenu li:first-child button').css('border-radius','30px 0 0 0px')
        }else {
            $('.lineasep').css('top','98px');
            $('.account-displayed').addClass('account-options').removeClass('account-displayed');
            $('.cartmenu li:first-child button').css('border-radius','30px 0 0 30px')
        }
    });
    $(".category-id").click(function(){
        $.ajax({
            type:'POST',
            url: "../index.php?action=productes",
            data:{categoria:$(this).attr("id")},
            success:
            function(result){
                $('#product-zone').html(result);
            }
        });
    });

});

function descripcioProductes(id){
    $.ajax({
        type:'POST',
        url: "../index.php?action=descripcioProductes",
        data:{producte:id},

        success:
            function(result){

                $('#product-zone').html(result);

            }
    });
}
function addCart(fila, preu, quant){

    $.ajax({
        type: 'POST',
        url: '../index.php?action=cartfunction',
        data:{funcio:'addCart', items:fila, preus:preu, qua: quant},
        success:
            function(result){

                $('.cart-resume').html(result);
            }
    });

}
function emptyCart(){
    $.ajax({
        type: 'POST',
        url: '../index.php?action=cartfunction',
        data:{funcio:'emptyCart'},
        success:
            function( result){
            console.log(result);
                $('.cart-description').remove();  

                $('.cart-resume').html(result);
            }
    });

}
function addUnit(id, preu, quant){

    $.ajax({
        type: 'POST',
        url: '../index.php?action=cartfunction',
        data:{funcio:'addUnit', items:id, preus:preu, qua: quant},
        success:
            function(result){
            window.location.reload();

            }
    });

}
function removeUnit(id, preu, quant){

    $.ajax({
        type: 'POST',
        url: '../index.php?action=cartfunction',
        data:{funcio:'removeUnit', items:id, preus:preu, qua: quant},
        success:
            function(result){

                window.location.reload();
            }

    });

}
function removeProduct(id, preu, quant){

    $.ajax({
        type: 'POST',
        url: '../index.php?action=cartfunction',
        data:{funcio:'removeProduct', items:id, preus:preu, qua: quant},
        success:
            function(result){

                window.location.reload();
            }
    });

}