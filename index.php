<?php

$action = $_GET['action'] ?? null;

session_start();

switch($action){
    case 'shop':
        require __DIR__.'/shop.php';
        break;
    case 'aboutus':
        require __DIR__.'/aboutus.php';
        break;
    case 'login':
        require __DIR__.'/login.php';
        break;
    case 'logout':
        require __DIR__.'/logout.php';
        break;
    case 'profile':
        require __DIR__.'/profile.php';
        break;
    case 'modifica_profile':
        require __DIR__.'/modifica_profile.php';
        break;
    case 'actualitza_profile':
        require __DIR__.'/actualitza_profile.php';
        break;
    case 'realitzar_compra':
        require __DIR__.'/realitzar_compra.php';
        break;
    case 'confirmacio_compra':
        require __DIR__.'/confirmacio_compra.php';
        break;
    case 'llistat_comandes':
        require __DIR__.'/llistat_comandes.php';
        break;
    case 'cart':
        require __DIR__ . '/cart.php';
        break;
    case 'myaccount':
        require __DIR__.'/myaccount.php';
        break;
    case 'validation':
        require __DIR__.'/validate.php';
        break;
    case 'cartfunction':
        require __DIR__. '/cart_functions.php';
        break;
    case 'productes':
        require __DIR__. '/productes.php';
        break;
    case 'descripcioProductes':
        require __DIR__. '/descripcioProductes.php';
        break;
    default:
        require __DIR__.'/home.php';
        break;

}
