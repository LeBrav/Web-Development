<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="../css/profile.css" />
    <link rel="stylesheet" href="../css/header.css" />
</head>
<body>
<div id = "layout_profile">
    <h2>Modifica el teu perfil</h2>
    <div class = "profile">
        <p>Canvia el que vulguis i fes submit</p>

        <p>El teu perfil ara és:</p>

        <?php
        echo '<p> Nom: '. $_SESSION['nom'] . '</p>';
        echo '<p> Email: '. $_SESSION['email'] . '</p>';
        echo '<p> Adreça: '. $_SESSION['adreca'] . '</p>';
        echo '<p> Codi Postal: '. $_SESSION['codi_postal'] . '</p>';
        echo '<p> Poblacio: '. $_SESSION['poblacio'] . '</p>';

        ?>

        <p>Modifica el que vulguis:</p>
        <form action="index.php?action=actualitza_profile" enctype="multipart/form-data" method="post">
            <label for="nom"><b>Usuari</b></label>
            <input type="text" placeholder="Introdueix Usuari" name="nom" value =  '<?php echo $_SESSION['nom']?>'>

            <label for="adrss"><b>Adreça</b></label>
            <input type="text" placeholder="Introdueix Adreça" name="adrss" value =  '<?php echo $_SESSION['adreca']?>'>

            <label for="poblacio"><b>Població</b></label>
            <input type="text" placeholder="Introdueix Població" name="poblacio" value =  '<?php echo $_SESSION['poblacio']?>'>

            <label for="postal"><b>Codi Postal</b></label>
            <input type="text" placeholder="Introdueix Codi Postal" name="postal" pattern="[0-9]{5}" value =  '<?php echo $_SESSION['codi_postal']?>'/>

            <label for="profile_img"><b>Imatge de Perfil</b></label>
            <input type="file" name="profile_img" id="profile_img" />

            <button type="submit" >Modifica (SUBMIT)</button>
            <button type="button" onclick="location.href='index.php?action=profile';" target= "_self" >
                Tornar al Perfil
            </button>
        </form>
    </div>

</div>
</body>
</html>