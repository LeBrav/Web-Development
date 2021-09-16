<?php
function insertData($connexio)
{
    if($_POST['psw'] == $_POST['psw-repeat']) {

        $psww = $_POST['psw'];
        $psww = password_hash($psww,PASSWORD_DEFAULT);

        try {

            $sql = "
                INSERT INTO Usuari (nom,password, email, adreca, poblacio, codi_postal) 
                VALUES (:nom,:psw,:email,:adrss,:poblacio,:postal)
            ";

            $consulta = $connexio->prepare($sql);
            $consulta->bindParam(":nom", $_POST['nom'], PDO::PARAM_STR);
            $consulta->bindParam(":psw", $psww, PDO::PARAM_STR);
            $consulta->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
            $consulta->bindParam(":adrss", $_POST['adrss'], PDO::PARAM_STR);
            $consulta->bindParam(":poblacio", $_POST['poblacio'], PDO::PARAM_STR);
            $consulta->bindParam(":postal", $_POST['postal'], PDO::PARAM_INT);
            $consulta->execute();

            header("location:../index.php");
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $connexio = null;
    }else{

        #header("location:../index.php?action=login");
        echo '<script type="text/javascript"> alert("Les contrasenyes no coincideixen!"); window.location.href="../index.php?action=login";</script>';
    }
}




function modifyData($connexio)
{
    #$filesAbsolutePath = '../fitxers/';
    $filesAbsolutePath = '/home/TDIW/tdiw-l12/public_html/fitxers/';
    $nom = $_POST['nom'];
    $adreca = $_POST['adrss'];
    $poblacio = $_POST['poblacio'];
    $codi_postal = $_POST['postal'];
    $id = $_SESSION['user_id'];
    try {

        $sql = "
            UPDATE Usuari SET nom = '$nom', adreca = '$adreca', poblacio = '$poblacio', codi_postal = '$codi_postal' WHERE id = '$id'

        ";

        $consulta = $connexio->prepare($sql);
        $consulta->bindParam(":nom", $_POST['nom'], PDO::PARAM_STR);
        $consulta->bindParam(":adrss", $_POST['adrss'], PDO::PARAM_STR);
        $consulta->bindParam(":poblacio", $_POST['poblacio'], PDO::PARAM_STR);
        $consulta->bindParam(":postal", $_POST['postal'], PDO::PARAM_INT);
        $consulta->execute();

        $_SESSION['nom'] = $nom;
        $_SESSION['adreca'] = $adreca;
        $_SESSION['codi_postal'] = $codi_postal;
        $_SESSION['poblacio'] = $poblacio;

        if (isset($_FILES['profile_img']) && !empty($_FILES['profile_img'])) {
            $destinationPath = $filesAbsolutePath.$_SESSION['user_id'];
            move_uploaded_file( $_FILES['profile_img']['tmp_name'], $destinationPath);
        }
        header("location:../index.php?action=profile");

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $connexio = null;

}



function insertDataCompra($connexio)
{

    if(count($_SESSION['cart']) != 0) {
        try {
            #GENEREM LA COMANDA DEL CARRITO ACTUAL
            $date = date('Y-m-d H:i:s', time());
            $preu = $_SESSION['preu'];
            $sql = "
                INSERT INTO Comanda (id,data_creacio, num_elements, import_total, id_usuari) 
                VALUES (DEFAULT,:data_creacio,:num_elements,$preu,:id_usuari)
            ";

            $consulta = $connexio->prepare($sql);
            $consulta->bindParam(":data_creacio", $date, PDO::PARAM_STR);
            $consulta->bindParam(":num_elements", count($_SESSION['cart']), PDO::PARAM_INT);
            $consulta->bindParam(":id_usuari", $_SESSION['user_id'], PDO::PARAM_INT);
            $consulta->execute();

            #OBTENIM EL ID DE LA COMANDA
            $identificador_user = $_SESSION['user_id'];
            $sql = "
                SELECT id FROM Comanda WHERE data_creacio = '$date' AND id_usuari = $identificador_user
            ";

            $consulta = $connexio->prepare($sql);
            $consulta->execute();
            $resultat = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);
            $id_comanda = $resultat[0];


            #GENEREM UNA LINIA DE COMANDA PER CADA PRODUCTE
            foreach ($_SESSION['cart'] as $fila) {

                #OBTENIM EL nom del producte
                $identificador_user = $_SESSION['user_id'];
                $sql = "
                SELECT nom, preu FROM Productes WHERE id = $fila[0]
                ";

                $consulta = $connexio->prepare($sql);
                $consulta->execute();
                $resultat = $consulta->fetchAll();
                $nom_producte = $resultat[0]['nom'];
                $import_total_p = $resultat[0]['preu'] * $fila[1];

                $sql = "
                    INSERT INTO Linia_comanda (id,nom_producte, quantitat, import_total, id_producte, id_comanda)
                    VALUES (DEFAULT,:nom_producte,:quantitat,:import_total,:id_producte, :id_comanda)
                ";

                $consulta = $connexio->prepare($sql);
                $consulta->bindParam(":nom_producte", $nom_producte, PDO::PARAM_STR);
                $consulta->bindParam(":quantitat", $fila[1], PDO::PARAM_INT);
                $consulta->bindParam(":import_total", $import_total_p, PDO::PARAM_STR);
                $consulta->bindParam(":id_producte", $fila[0], PDO::PARAM_INT);
                $consulta->bindParam(":id_comanda", $id_comanda, PDO::PARAM_INT);
                $consulta->execute();
            }
            header("location:../index.php?action=confirmacio_compra");

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $connexio = null;
    }else{

        #header("location:../index.php?action=login");
        echo '<script type="text/javascript"> alert("NO HI HA RES A COMPRAR!"); window.location.href="../index.php?action=shop";</script>';
    }
}


function GetComandes($identificador_user, $connexio )
{

    $resultat = [];
    try{
        $consulta = $connexio->prepare("SELECT * FROM Comanda WHERE id_usuari = :identificador_user ");
        $consulta->bindParam(":identificador_user", $identificador_user, PDO::PARAM_INT);
        $consulta->execute();
        $resultat = $consulta->fetchAll(PDO::FETCH_ASSOC); //retorna un array associatiu


    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return $resultat;
}

function GetProductesComandes($id_comanda, $connexio )
{

    $resultat = [];
    try{
        $consulta = $connexio->prepare("SELECT * FROM Linia_comanda WHERE id_comanda = :id_comanda ");
        $consulta->bindParam(":id_comanda", $id_comanda, PDO::PARAM_INT);
        $consulta->execute();
        $resultat = $consulta->fetchAll(PDO::FETCH_ASSOC); //retorna un array associatiu


    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return $resultat;
}
