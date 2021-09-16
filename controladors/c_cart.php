<?php

require_once __DIR__.'/../models/m_connexioBD.php';
require_once __DIR__ .'/../models/m_productes.php';

$connexio = connectaBD();
$prod = array();
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $i) {
        $aux = array();
        $aux = getDescripcioProducte($i[0], $connexio);
        $aux[] = $i[1];
        $prod[] = $aux;
    }


    require_once __DIR__ . '/../vistes/v_cart.php';
}else{

    print_r('login bro');

}