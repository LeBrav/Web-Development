<?php
function getCategories($connexio)
{

    //$connexio = connectaBD();
    $resultat = [];
    try{

        $consulta = $connexio->prepare("SELECT id, nom, imatge FROM Categoria");
        $consulta->execute();
        $resultat = $consulta->fetchAll(PDO::FETCH_ASSOC); //retorna un array associatiu


    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    $connexio = null;
    return $resultat;
}
