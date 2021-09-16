<?php

if($_POST['funcio'] == 'addCart') {
    $a = array();
    $a[] =  $_POST['items'];
    $a[] =  $_POST['qua'];
    $_SESSION['cart'][] = $a;
    $_SESSION['preu'] += $_POST['preus'] * $_POST['qua'];


}
if($_POST['funcio'] == 'emptyCart') {

    $_SESSION['cart'] = array();
    $_SESSION['preu'] = 0;


}
if($_POST['funcio'] == 'addUnit') {
    $a = array();
    $a[] =  $_POST['items'];
    $a[] =  $_POST['qua'];
    $clau = array_search($a,$_SESSION['cart']);
    $_SESSION['cart'][$clau][1] += 1;
    $_SESSION['preu'] += $_POST['preus'];

}

if($_POST['funcio'] == 'removeUnit') {
    $a = array();
    $a[] = $_POST['items'];
    $a[] = $_POST['qua'];
    $clau = array_search($a, $_SESSION['cart']);
    if ($_POST['qua'] > 1) {
        $_SESSION['cart'][$clau][1] -= 1;
        $_SESSION['preu'] -= $_POST['preus'];
    }
}

if($_POST['funcio'] == 'removeProduct') {

    if(count($_SESSION['cart'])==1){
        $_SESSION['cart'] = array();
        $_SESSION['preu'] = 0;
    }else{
        foreach ($_SESSION['cart'] as $key => $val) {
            if ($val[0] === $_POST['items'] ) {
                $_SESSION['preu'] = $_SESSION['preu']  - ($_POST['preus']*($_POST['qua']));
                unset($_SESSION['cart'][$key]);

            }
        }
    }
}
