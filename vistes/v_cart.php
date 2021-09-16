<section class="cart-description">
    <?php foreach($prod as $i){?>
            <br>
        <div class= "cartclass"  target= "_self" >

            <div id = "cart-head">
                <?php echo 'Nom: ' . $i[0]['nom'] . '</br>' ?>
                <?php echo 'Preu: ' . $i[0]['preu'] . '€ </br>' ?>
                <?php echo 'Quantitat: ' . $i[1] . '</br>' ?>
            </div>

            <div id = "cart-image">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $i[0]['imatge'] ).'" , width = 300px />';?>

            </div>
            <button onclick="addUnit(<?php echo $i[0]['id'] ?>,<?php echo $i[0]['preu'] ?>, <?php echo $i[1]; ?>)">
                ADD UNIT
            </button>
            <button onclick="removeUnit(<?php echo  $i[0]['id'] ?>,<?php echo  $i[0]['preu'] ?>, <?php  echo $i[1]; ?>)">
                REMOVE UNIT
            </button>
            <button onclick="removeProduct(<?php echo  $i[0]['id'] ?>,<?php echo  $i[0]['preu'] ?>, <?php  echo $i[1]; ?>)">
                REMOVE PRODUCT
            </button>
        </div>
        <br>
        ____________________________________________
        <br>
    <?php }?>


<br>
<?php if(isset($_SESSION['cart'])){ ?>
<button onclick="emptyCart()">
    EMPTY CART
</button>

<button type="button" onclick="location.href='index.php?action=realitzar_compra';emptyCart();" target= "_self" >
COMPRAR GRATIS!
</button>
<br>

<?php } ?>
</section>