<?php
function getProductes($idcategoria, $connexio )
{

    $resultat = [];
    try{

        $consulta = $connexio->prepare("SELECT id, nom, preu, imatge FROM Productes WHERE id_categoria =$idcategoria ");
        $consulta->bindParam(":idcategory", $idcategoria, PDO::PARAM_INT);
        $consulta->execute();
        $resultat = $consulta->fetchAll(PDO::FETCH_ASSOC); //retorna un array associatiu


    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    $connexio = null;
    return $resultat;
}
function getDescripcioProducte($idProducte, $connexio )
{

    $resultat = [];
    try{

        $consulta = $connexio->prepare("SELECT * FROM Productes WHERE id = $idProducte ");
        $consulta->bindParam(":idProducte", $idProducte, PDO::PARAM_INT);
        $consulta->execute();
        $resultat = $consulta->fetchAll(PDO::FETCH_ASSOC); //retorna un array associatiu


    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $connexio = null;
    return $resultat;
}