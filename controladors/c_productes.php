<?php

require_once __DIR__.'/../models/m_connexioBD.php';
require_once __DIR__ .'/../models/m_productes.php';

$connexio = connectaBD();
$idcategoria = $_POST['categoria'] ?? null;

$productes = getProductes($idcategoria, $connexio);

require_once __DIR__.'/../vistes/v_productes.php';

