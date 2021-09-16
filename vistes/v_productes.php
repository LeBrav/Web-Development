


<section class="products">
    <?php foreach($productes as $fila){ ?>
        <div class='product-card' id="<?php echo $fila['id'] ?>" onclick="descripcioProductes(<?php echo $fila['id'] ?>)">

            <div id = "product-name">
                <?php echo $fila['nom'] . '</br>' ?>
                <?php echo $fila['preu'] . '€ </br>' ?>
            </div>

            <div class = "product-image">

                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $fila['imatge'] ).'" , width = 300px />';?>

            </div>
        </div>
    <?php }?>

</section>

