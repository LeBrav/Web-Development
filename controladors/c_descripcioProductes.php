<?php

require_once __DIR__.'/../models/m_connexioBD.php';
require_once __DIR__ .'/../models/m_productes.php';

$connexio = connectaBD();
$idproducte = $_POST['producte'] ?? null;
$resultat = getDescripcioProducte($idproducte, $connexio );

require_once __DIR__.'/../vistes/v_descripcioProducte.php';



