<?php
function connectaBD(){
    $servidor = "127.0.0.1";
    $usuari = "tdiw-l12";
    $clau = "wYBhsW7n";

    try{
        $connexio = new PDO("mysql:host=$servidor;dbname=tdiwl12;charset=UTF8", $usuari, $clau);
        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //obliga a llançar excepcions


    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return($connexio);
}
?>