<br>
<div id = "comandas-container">
    <h>Has fet les següents comandes:</h>


    <?php foreach($resultat as $fila){ ?>
    <p>---------------------------------------------------------------------------------------</p>
        <div>
            <p>El dia: <?php echo $fila['data_creacio'] ?>, vas comprar <?php echo $fila['num_elements']?> elements,
                amb un import total de <?php echo $fila['import_total']?> €</p>
            <p>Els productes que has comprat són els següents:</p>

            <?php $resultat_productes =GetProductesComandes($fila['id'], $connexio ) ?>
            <?php foreach($resultat_productes as $fila_productes){ ?>
                <p>Vas comprar <?php echo $fila_productes['quantitat']?> quantitats del producte: <?php echo $fila_productes['nom_producte'] ?>,
                    amb un import total de <?php echo $fila_productes['import_total']?> €</p>
                <?php $resultat_img = getDescripcioProducte($fila_productes['id_producte'], $connexio );?>
                <?php if(isset($resultat_img[0]['imatge'])){echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultat_img[0]['imatge'] ).'" , width = 100px />';}?>
            <?php }?>
        </div>


    <p>---------------------------------------------------------------------------------------</p></br>
    <?php }?>

    <?php $connexio = null; ?>
</div>