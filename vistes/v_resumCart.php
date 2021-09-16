<div class="cart-resume">

    <?php

    if(isset($_SESSION['cart']))
    {
        if(count($_SESSION['cart']) > 0){  ?>
            CART
            <br>
            Number of products:
        <?php
        $cartcount = 0;
        foreach($_SESSION['cart'] as $i){
            $cartcount += $i[1];
        }?>
        <?php echo $cartcount; ?>
        <br>
        Price:
        <?php echo $_SESSION['preu']; ?>
        <?php }
    } ?>
</div>

