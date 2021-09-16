
<div class="descriptionclass">
    <section class="product-description">
        <?php foreach($resultat as $fila){ ?>
        <div id = "product-head">
            <?php echo 'Nom: ' . $fila['nom'] . '</br>' ?>
            <?php echo 'Preu: ' . $fila['preu'] . '€ </br>' ?>
            <?php echo 'Unitats Restants: ' . $fila['quantitat'] . '</br>' ?>
        </div>

        <div id = "product-body">
            <?php echo  $fila['descripcio'] . '</br>' ?>

        </div>

        <div id = "product-image">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $fila['imatge'] ).'" , width = 300px />';?>

        </div>

        <input type="number" id="quantitat" min="0" max="10"  value="1" >
        <button id="addtoCart"  onclick="addCart(<?php echo $fila['id']?>, <?php echo $fila['preu']; ?> , $('#quantitat').val() )" >
            Add to Cart
        </button>
        <?php } ?>
    </section>
</div>