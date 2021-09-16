

    <section class="category">
        <?php foreach($resultat as $fila){ ?>
             <?php $fila['nom'] = htmlentities($fila['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8');?>
             <div class= "category-id" id="<?php echo $fila['id'] ?>" target= "_self" >
                <img src="/../img/<?php echo $fila['imatge']?>.png">
                <?php echo $fila['nom'] ?>
            </div>

        <?php }?>

    </section>


