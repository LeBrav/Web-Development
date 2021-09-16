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
    <h2>El teu perfil</h2>
    <div class = "profile">
        <?php
        echo '<p> Nom: '. $_SESSION['nom'] . '</p>';
        echo '<p> Email: '. $_SESSION['email'] . '</p>';
        echo '<p> Adreça: '. $_SESSION['adreca'] . '</p>';
        echo '<p> Codi Postal: '. $_SESSION['codi_postal'] . '</p>';
        echo '<p> Poblacio: '. $_SESSION['poblacio'] . '</p>';
        $filesAbsolutePath = '../fitxers/';
        $destinationPath = $filesAbsolutePath.$_SESSION['user_id'];
        ?>
        <img src="<?php echo $destinationPath ?>" width="200px" />
        </br>
        <button type="button" onclick="location.href='index.php?action=modifica_profile';" target= "_self" >
            Modifica Perfil
        </button>
    </div>

</div>
</body>
</html>